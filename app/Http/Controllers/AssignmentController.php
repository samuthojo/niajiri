<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class AssignmentController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Assignment::filter($request->all())->orderBy('finished_at', 'desc');

		//paginate query result
		$assignments = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Assignments',
			'route_description' => 'Assignment List',
			'assignments' => $assignments,
			'q' => $request->input('q'),
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('assignments.index', $data);
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
		return view('assignments.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//ensure valid assignment
		$this->validate($request, [
			'title' => 'required|string',
			'client' => 'required|string',
			'location' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required',
			'finished_at' => 'required',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all assignment form inputs
		$body = $request->all();

		//create assignment
		$assignment = Assignment::create($body);

		//flash message
		flash(trans('assignments.actions.save.flash.success'))
			->success()->important();

		//redirect to show assignment
		return redirect()->route('assignments.index', [
				'applicant_id' => $request->input('applicant_id')
			]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {

		//load assignment
		$assignment = Assignment::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Assignment',
			'route_description' => 'Show Assignment',
			'assignment' => $assignment,
			'instance' => $assignment,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('assignments.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		$assignment = Assignment::findOrFail($id);

		$data = [
			'route_title' => 'Edit Assignment',
			'route_description' => 'Edit Assignment',
			'assignment' => $assignment,
			'instance' => $assignment,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('assignments.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
		//ensure valid assignment
		$this->validate($request, [
			'title' => 'required|string',
			'client' => 'required|string',
			'location' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required',
			'finished_at' => 'required',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all assignment form inputs
		$body = $request->all();

		//find existing assignment
		$assignment = Assignment::findOrFail($id);

		//update assignment
		$assignment->update($body);

		//flash message
		flash(trans('assignments.actions.update.flash.success'))
			->success()->important();

		//redirect to show assignment
		return redirect()->route('assignments.index',[
				'applicant_id' => $request->input('applicant_id')
			]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {

		Assignment::destroy($id);

		//flash message
		flash(trans('assignments.actions.delete.flash.success'))
			->success()->important();

		return redirect()->route('assignments.index',[
				'applicant_id' => $request->input('applicant_id')
			]);
	}
}
