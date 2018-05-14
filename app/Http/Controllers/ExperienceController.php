<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class ExperienceController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Experience::filter($request->all())->orderBy('ended_at', 'desc');

		//paginate query result
		$experiences = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Experiences',
			'route_description' => 'Experience List',
			'experiences' => $experiences,
			'q' => $request->input('q'),
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('experiences.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {
		$data = [
			'applicant_id' => $request->input('applicant_id'),
		];
		return view('experiences.create', $data);
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

		//ensure valid experience
		$this->validate($request, [
			'position' => 'required|string',
			'organization' => 'required|string',
			'sector' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required',
			'ended_at' => 'required',
			'location' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all experience form inputs
		$body = $request->all();
		$body['project_id'] = $request->session()->get('project_id');

		//create experience
		$experience = Experience::create($body);

		//flash message
		flash(trans('experiences.actions.save.flash.success'))
			->success()->important();

		//redirect to show experience
		return redirect()->route('users.cv', ['id' => $user->id]);

	}

	public function storeExperience(Request $request) {

		//obtain user
		$user = \Auth::user();

		//ensure valid experience
		$this->validate($request, [
			'position' => 'required|string',
			'organization' => 'required|string',
			'sector' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required|string',
			'ended_at' => 'required|string',
			'location' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all experience form inputs
		$body = $request->all();
		$body['project_id'] = $request->session()->get('project_id');

		//create experience
		$experience = Experience::create($body);

		return [
			'experiences' => $user->experiences,
			'message' => 'Experience saved successfully',
		];
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {

		//load experience
		$experience = Experience::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Experience',
			'route_description' => 'Show Experience',
			'experience' => $experience,
			'instance' => $experience,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('experiences.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		$experience = Experience::findOrFail($id);

		$data = [
			'route_title' => 'Edit Experience',
			'route_description' => 'Edit Experience',
			'experience' => $experience,
			'instance' => $experience,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('experiences.edit', $data);
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

		//ensure valid experience
		$this->validate($request, [
			'position' => 'required|string',
			'organization' => 'required|string',
			'sector' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required',
			'ended_at' => 'required',
			'location' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all experience form inputs
		$body = $request->all();

		//find existing experience
		$experience = Experience::findOrFail($id);

		//update experience
		$experience->update($body);

		//flash message
		flash(trans('experiences.actions.update.flash.success'))
			->success()->important();

		//redirect to show experience
		return redirect()->route('users.cv', ['id' => $user->id]);

	}

	public function updateExperience(Request $request, $id) {

		//obtain user
		$user = \Auth::user();

		//ensure valid experience
		$this->validate($request, [
			'position' => 'required|string',
			'organization' => 'required|string',
			'sector' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required|string',
			'ended_at' => 'required|string',
			'location' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all experience form inputs
		$body = $request->all();

		//find existing experience
		$experience = Experience::findOrFail($id);

		//update experience
		$experience = $experience->updateOrCreate(compact('id'), $body);

		return [
			'experience' => $experience,
			'message' => 'The Experience has been Updated'
		];

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

		Experience::destroy($id);

		//flash message
		flash(trans('experiences.actions.delete.flash.success'))
			->success()->important();

		return redirect()->route('users.cv', ['id' => $user->id]);
	}
}
