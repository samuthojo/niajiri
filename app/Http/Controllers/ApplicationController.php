<?php

namespace App\Http\Controllers;

use App\Mail\Applied;
use App\Models\Application;
use App\Models\ApplicationStage;
use App\Models\Position;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ApplicationController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Application::filter($request->all())->orderBy('created_at', 'asc');

		//paginate query result
		$applications = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Applications',
			'route_description' => 'Application List',
			'applications' => $applications,
			'q' => $request->input('q'),
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applications.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {

		//TODO check CV validity

		//obtain position to apply
		$position = Position::findOrFail($request->input('position_id'));

		//present application form
		$data = [
			'route_title' => 'Applying',
			'route_description' => 'Applying',
			'position' => $position,
			'instance' => $position,
			'organization_id' => $request->input('organization_id'),
		];

		return view('applications.create', $data);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//TODO refactor
		//TODO dry & KISS

		//ensure applicant required details
		$applicant = \Auth::user();

		//ensure not applied
		$application = Application::where([
			'applicant_id' => $applicant->id,
			'position_id' => $request->input('position_id'),
		])->first();

		if ($application) {
			flash(trans('cvs.messages.applied'))->warning()->important();
			return back();
		} else if (!$applicant->hasBasicDetails()) {
			flash(trans('cvs.messages.basic'))->warning()->important();
			return redirect()->route('users.cv', ['id' => $applicant->id]);
		}

		//ensure education details
		else if ($applicant->educations->count() === 0) {
			flash(trans('cvs.messages.educations'))->warning()->important();
			return redirect()->route('users.cv', ['id' => $applicant->id]);
		}

		//ensure experience details
		else if ($applicant->experiences->count() === 0) {
			flash(trans('cvs.messages.experiences'))->warning()->important();
			return redirect()->route('users.cv', ['id' => $applicant->id]);
		}

		//ensure language details
		else if ($applicant->languages->count() === 0) {
			flash(trans('cvs.messages.languages'))->warning()->important();
			return redirect()->route('users.cv', ['id' => $applicant->id]);
		}

		//ensure referee details
		else if ($applicant->referees->count() === 0) {
			flash(trans('cvs.messages.referees'))->warning()->important();
			return redirect()->route('users.cv', ['id' => $applicant->id]);
		}

		//merge applicant details
		else {
			$request->merge([
				'applicant_id' => $applicant->id,
			]);

			//ensure valid application
			$this->validate($request, [
				'applicant_id' => 'string|required|exists:users,id|unique_with:applications,position_id',
				'organization_id' => 'string|required|exists:users,id',
				'position_id' => 'string|required|exists:positions,id',
				'cover_letter' => 'required|file|mimes:pdf|max:10240',
			]);

			//ensure cover letter provided
			if (!$request->hasFile('cover_letter')) {
				flash(trans('cvs.messages.cover_letter'))->warning()->important();
				return back();
			}

			//continue with application
			else {
				//obtain all application form inputs
				$body = $request->all();

				//create application
				$application = Application::create($body);

				//upload & store application cover letter
				if ($application && $request->hasFile('cover_letter')) {
					//clear existing cover_letter
					$application->clearMediaCollection('cover_letters');
					//attach new cover_letter
					$application->addMediaFromRequest('cover_letter')
						->toMediaCollection('cover_letters');
				}

				//queue new application email
				Mail::to($applicant)
					->queue(new Applied($applicant, $application));

				//advance application to next stage
				$applicationStage = $application->advance();

				//flash message
				flash(trans('applications.actions.save.flash.success'))
					->success()->important();

				//redirect to applicant applied list
				if ($application->isApplicant(\Auth::user())) {
					return redirect()->route('applications.application', [
						'id' => $application->id,
						'applicant_id' => $applicant->id,
					]);
				}

				//redirect to show applications
				else {
					return redirect()->route('applications.index', [
						'applicant_id' => $applicant->id,
					]);
				}
			}
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {
		//TODO check CV validity

		//load application
		$application = Application::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Application',
			'route_description' => 'Show Application',
			'application' => $application,
			'instance' => $application,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applications.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		//TODO check CV validity

		$application = Application::findOrFail($id);

		$data = [
			'route_title' => 'Edit Application',
			'route_description' => 'Edit Application',
			'application' => $application,
			'instance' => $application,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applications.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		//ensure valid application
		$this->validate($request, [
			'applicant_id' => 'string|required|exists:users,id|unique_with:applications,position_id,ignore:' . $id,
			'organization_id' => 'string|required|exists:users,id',
			'position_id' => 'string|required|exists:positions,id',
		]);

		//obtain all application form inputs
		$body = $request->all();

		//find existing application
		$application = Application::findOrFail($id);

		//update application
		$application->update($body);

		//upload & store application cover letter
		if ($application && $request->hasFile('cover_letter')) {
			//clear existing cover_letter
			$application->clearMediaCollection('cover_letters');
			//attach new cover_letter
			$application->addMediaFromRequest('cover_letter')
				->toMediaCollection('cover_letters');
		}

		//flash message
		flash(trans('applications.actions.update.flash.success'))
			->success()->important();

		//redirect to applicant applied list
		if ($application->isApplicant(\Auth::user())) {
			return redirect()->route('applications.applied', [
				'applicant_id' => $request->input('applicant_id'),
			]);
		}

		//redirect to show applications
		else {
			return redirect()->route('applications.index', [
				'applicant_id' => $request->input('applicant_id'),
			]);
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {

		//force delete application
		$application = Application::findOrFail($id);
		$isApplicant = $application->isApplicant(\Auth::user());
		$application->forceDelete();

		//flash message
		flash(trans('applications.actions.delete.flash.success'))
			->success()->important();

		//redirect to applicant applied list
		if ($isApplicant) {
			return redirect()->route('applications.applied', [
				'applicant_id' => $request->input('applicant_id'),
			]);
		}

		//redirect to show applications
		else {
			return redirect()->route('applications.index', [
				'applicant_id' => $request->input('applicant_id'),
			]);
		}
	}

	/**
	 * Display a listing of application applications
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function applied(Request $request) {

		//TODO ensure current user as applicant_id

		//initialize query
		$query = Application::filter($request->all())->orderBy('created_at', 'asc');

		//paginate query result
		$applications = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'My Applications',
			'route_description' => 'My Applications',
			'applications' => $applications,
			'q' => $request->input('q'),
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applications.my.index', $data);
	}

	/**
	 * Display application the specified id.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function application(Request $request, $id) {
		//TODO flash missing details
		//TODO flash missing cover letter

		//load application
		$application = Application::query()->findOrFail($id);

		$data = [
			'route_title' => 'Application',
			'route_description' => 'Application',
			'application' => $application,
			'instance' => $application,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applications.my.application', $data);
	}

	/**
	 * Advance application(s) to next stage
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function advance(Request $request) {

		//obtain application to advance
		$ids = collect($request->input('applications'));
		$action = $request->input('action');

		//ensure there are applicants selected
		if ($ids->count() == 0 && strcmp($action, 'notify') !== 0) {
			//flash message
			flash(trans('applicationstages.actions.advance.flash.warning'))
				->warning()->important();
		}

		//try to advance applications
		else {

			//notify applicants
			if (strcmp($action, 'notify') === 0) {

				//ensure ids
				if ($ids->count() == 0) {

					//load applications stages and obtain application ids
					$ids = ApplicationStage::query()
						->where($request->only(['position_id', 'stage_id']))
						->get()->map(function ($applicationStage) {
						return $applicationStage->application_id;
					});

				}
				
				//obtain notification message
				$message = $request->input('message');

				//advance applications to next stage
				Application::notifies($ids, $message);

				flash(trans('applicationstages.actions.notify.flash.success'))
					->success()->important();

			}

			//reject applications
			else if (strcmp($action, 'reject') === 0) {

				//advance applications to next stage
				Application::advances($ids, true);

				flash(trans('applicationstages.actions.reject.flash.success'))
					->success()->important();
			}

			//advance applications
			else {

				//advance applications to next stage
				Application::advances($ids);

				flash(trans('applicationstages.actions.advance.flash.success'))
					->success()->important();
			}
		}

		//redirect to application stage listing
		if (is_set($request->input('position_id'))) {
			return redirect()->route('applicationstages.index', [
				'position_id' => $request->input('position_id'),
				'stage_id' => $request->input('stage_id'),
			]);
		}

		//redirect to current application view
		else {
			return redirect()->route('applications.application', [
				'id' => $ids->first(),
				'applicant_id' => $request->input('applicant_id'),
			]);
		}
	}

	/**
	 * Display application the specified id.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function test(Request $request, $id) {

		//load application
		$application = Application::query()->findOrFail($id);

		//load current application stage questions
		$test = Test::query()
			->where(['stage_id' => $application->stage_id])
			->first();
		$questions = $test->questions;

		$data = [
			'route_title' => 'Application',
			'route_description' => 'Application',
			'application' => $application,
			'instance' => $application,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applications.my.application', $data);
	}

	/**
	 * Verify needed applicant details
	 */
	private function applyOrRedirect($applicant) {

		if (!$applicant->hasBasicDetails()) {
			flash(trans('cvs.messages.basic'))->warning()->important();
			return redirect()->route('users.basic');
		}

		//ensure education details
		if ($applicant->educations->count() === 0) {
			flash(trans('cvs.messages.educations'))->warning()->important();
			return redirect()->route('educations.index', [
				'applicant_id' => $applicant->id,
				'project_id' => Session::get('project_id'),
			]);
		}

		//ensure experience details
		if ($applicant->experiences->count() === 0) {
			flash(trans('cvs.messages.experiences'))->warning()->important();
			return redirect()->route('experiences.index', [
				'applicant_id' => $applicant->id,
				'project_id' => Session::get('project_id'),
			]);
		}

		//ensure language details
		if ($applicant->languages->count() === 0) {
			flash(trans('cvs.messages.languages'))->warning()->important();
			return redirect()->route('languages.index', [
				'applicant_id' => $applicant->id,
				'project_id' => Session::get('project_id'),
			]);
		}

		//ensure referee details
		if ($applicant->referees->count() === 0) {
			flash(trans('cvs.messages.referees'))->warning()->important();
			return redirect()->route('referees.index', [
				'applicant_id' => $applicant->id,
				'project_id' => Session::get('project_id'),
			]);
		}

		return $applicant;

	}
}
