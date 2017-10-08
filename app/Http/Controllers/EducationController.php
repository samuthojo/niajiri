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
			'route_title' => 'Educations',
			'route_description' => 'Education List',
			'educations' => $educations,
			'q' => $request->input('q'),
		];

		return view('educations.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('educations.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//ensure valid education
		$this->validate($request, [
			'title' => 'required|string',
			'institution' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required|date_format:d-m-Y',
			'finished_at' => 'nullable|date_format:d-m-Y',
			'remark' => 'required|string',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all education form inputs
		$body = $request->all();

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

		//TODO redirect to applicant profile
		//redirect to show education
		return redirect()->route('educations.show', [$education]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		//load education with permissions
		$education = Education::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Education',
			'route_description' => 'Show Education',
			'education' => $education,
			'instance' => $education
		];

		return view('educations.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$education = Education::findOrFail($id);

		$data = [
			'route_title' => 'Edit Education',
			'route_description' => 'Edit Education',
			'education' => $education,
			'instance' => $education,
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
		
		//ensure valid education
		$this->validate($request, [
			'title' => 'required|string',
			'institution' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required|date_format:d-m-Y',
			'finished_at' => 'nullable|date_format:d-m-Y',
			'remark' => 'required|string',
            'applicant_id' => 'string|required|exists:users,id'
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

		//TODO redirect to applicant profile
		//redirect to show education
		return redirect()->route('educations.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		Education::destroy($id);

		//flash message
		flash(trans('educations.actions.delete.flash.success'))
			->success()->important();

		//TODO redirect to specific applicant profile
		return redirect('educations');
	}
}
