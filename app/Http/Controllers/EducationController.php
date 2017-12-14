<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class EducationController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Education::filter($request->all())->orderBy('finished_at', 'desc');

		//paginate query result
		$educations = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Education Levels',
			'route_description' => 'Education Levels',
			'educations' => $educations,
			'q' => $request->input('q'),
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('educations.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {
		$data = [
			'education' => new Education(),
			'applicant_id' => $request->input('applicant_id'),
		];
		return view('educations.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//obtain user
		$user = \Auth::user();

		//ensure valid education
		$this->validate($request, [
			'level' => 'required|string',
			'institution' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required',
			'finished_at' => 'nullable',
			'remark' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all education form inputs
		$body = $request->all();
		$body['project_id'] = $request->session()->get('project_id');

		//create education
		$education = Education::create($body);

		//upload & store education attachment
		if ($education && $request->hasFile('attachment')) {
			//clear existing attachment
			$education->clearMediaCollection('attachments');
			//attach new attachment
			$education->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		//flash message
		flash(trans('educations.actions.save.flash.success'))
			->success()->important();

		//redirect to show education
		return redirect()->route('users.cv', ['id' => $user->id]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {

		//load education
		$education = Education::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Education Level',
			'route_description' => 'Show Education Level',
			'education' => $education,
			'instance' => $education,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('educations.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		$education = Education::findOrFail($id);

		$data = [
			'route_title' => 'Edit Education Level',
			'route_description' => 'Edit Education Level',
			'education' => $education,
			'instance' => $education,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('educations.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		//obtain user
		$user = \Auth::user();

		//ensure valid education
		$this->validate($request, [
			'level' => 'required|string',
			'institution' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required',
			'finished_at' => 'nullable',
			'remark' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all education form inputs
		$body = $request->all();

		//find existing education
		$education = Education::findOrFail($id);

		//update education
		$education->update($body);

		//upload & store education attachment
		if ($education && $request->hasFile('attachment')) {
			//clear existing attachment
			$education->clearMediaCollection('attachments');
			//attach new attachment
			$education->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		//flash message
		flash(trans('educations.actions.update.flash.success'))
			->success()->important();

		//redirect to show education
		return redirect()->route('users.cv', ['id' => $user->id]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {

		//obtain user
		$user = \Auth::user();

		Education::destroy($id);

		//flash message
		flash(trans('educations.actions.delete.flash.success'))
			->success()->important();
			
		return redirect()->route('users.cv', ['id' => $user->id]);
	}
}
