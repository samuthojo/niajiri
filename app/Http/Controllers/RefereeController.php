<?php

namespace App\Http\Controllers;

use App\Models\Referee;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class RefereeController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Referee::filter($request->all())->orderBy('name', 'desc');

		//paginate query result
		$referees = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Referees',
			'route_description' => 'Referee List',
			'referees' => $referees,
			'q' => $request->input('q'),
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('referees.index', $data);
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
		return view('referees.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//ensure valid referee
		$this->validate($request, [
			'name' => 'required|string',
			'title' => 'required|string',
			'organization' => 'required|string',
			'email' => 'required|email',
			'mobile' => 'required|string',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all referee form inputs
		$body = $request->all();

		//create referee
		$referee = Referee::create($body);

		//flash message
		flash(trans('referees.actions.save.flash.success'))
			->success()->important();

		//TODO redirect to applicant profile
		//redirect to show referee
		return redirect()->route('referees.index', [
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

		//load referee with permissions
		$referee = Referee::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Referee',
			'route_description' => 'Show Referee',
			'referee' => $referee,
			'instance' => $referee,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('referees.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		$referee = Referee::findOrFail($id);

		$data = [
			'route_title' => 'Edit Referee',
			'route_description' => 'Edit Referee',
			'referee' => $referee,
			'instance' => $referee,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('referees.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
		//ensure valid referee
		$this->validate($request, [
			'name' => 'required|string',
			'title' => 'required|string',
			'organization' => 'required|string',
			'email' => 'required|email',
			'mobile' => 'required|string',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all referee form inputs
		$body = $request->all();

		//find existing referee
		$referee = Referee::findOrFail($id);

		//update referee
		$referee->update($body);

		//flash message
		flash(trans('referees.actions.update.flash.success'))
			->success()->important();

		//TODO redirect to applicant profile
		//redirect to show referee
		return redirect()->route('referees.index',[
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

		Referee::destroy($id);

		//flash message
		flash(trans('referees.actions.delete.flash.success'))
			->success()->important();

		//TODO redirect to specific applicant profile
		return redirect()->route('referees.index',[
				'applicant_id' => $request->input('applicant_id')
			]);
	}
}
