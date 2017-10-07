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
		];

		return view('experiences.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('experiences.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//ensure valid experience
		$this->validate($request, [
			'position' => 'required|string',
			'organization' => 'required|string',
			'sector' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required|date_format:d-m-Y',
			'ended_at' => 'required|date_format:d-m-Y',
			'location' => 'required|string',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all experience form inputs
		$body = $request->all();

		//create experience
		$experience = Experience::create($body);

		//flash message
		flash(trans('experiences.actions.save.flash.success'))
			->success()->important();

		//TODO redirect to applicant profile
		//redirect to show experience
		return redirect()->route('experiences.show', [$experience]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		//load experience with permissions
		$experience = Experience::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Experience',
			'route_description' => 'Show Experience',
			'experience' => $experience,
			'instance' => $experience
		];

		return view('experiences.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$experience = Experience::findOrFail($id);

		$data = [
			'route_title' => 'Edit Experience',
			'route_description' => 'Edit Experience',
			'experience' => $experience,
			'instance' => $experience,
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
		
		//ensure valid experience
		$this->validate($request, [
			'position' => 'required|string',
			'organization' => 'required|string',
			'sector' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required|date_format:d-m-Y',
			'ended_at' => 'required|date_format:d-m-Y',
			'location' => 'required|string',
            'applicant_id' => 'string|required|exists:users,id'
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

		//TODO redirect to applicant profile
		//redirect to show experience
		return redirect()->route('experiences.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		Experience::destroy($id);

		//flash message
		flash(trans('experiences.actions.delete.flash.success'))
			->success()->important();

		//TODO redirect to specific applicant profile
		return redirect('experiences');
	}
}
