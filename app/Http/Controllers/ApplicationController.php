<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Test;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

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
		$data = [
			'applicant_id' => $request->input('applicant_id'),
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
		//TODO check CV validity
		//TODO notify applicant on application
		//TODO notify applicant on stage
		//TODO refactor
		//TODO make use of transaction

		//ensure valid application
		$this->validate($request, [
			'applicant_id' => 'string|required|exists:users,id|unique_with:applications,position_id',
			'organization_id' => 'string|required|exists:users,id',
			'position_id' => 'string|required|exists:positions,id',
		]);

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

		//advance application to next stage
		$applicationStage = $application->advance();

		//flash message
		flash(trans('applications.actions.save.flash.success'))
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

		//ensure $ids
		if ($ids->count() == 0) {
			//flash message
			flash(trans('applicationstages.actions.advance.flash.warning'))
				->warning()->important();
		}

		//try to advance applications
		else {
			//advance applications to next stage
			Application::advances($ids);

			//flash message
			flash(trans('applicationstages.actions.advance.flash.success'))
				->success()->important();
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
}
