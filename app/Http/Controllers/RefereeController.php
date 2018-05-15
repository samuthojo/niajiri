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

		//obtain user
		$user = \Auth::user();

		//ensure valid referee
		$this->validate($request, [
			'name' => 'required|string',
			'title' => 'required|string',
			'organization' => 'required|string',
			'email' => 'required|email',
			'mobile' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all referee form inputs
		$body = $request->all();

		//TODO ensure project id etc?
		$body['project_id'] = $request->session()->get('project_id');

		//create referee
		$referee = Referee::create($body);

		//flash message
		flash(trans('referees.actions.save.flash.success'))
			->success()->important();

		return redirect()->route('users.cv', ['id' => $user->id]);

	}

	public function storeReferee(Request $request) {

		//obtain user
		$user = \Auth::user();

		//ensure valid referee
		$this->validate($request, [
			'name' => 'required|string',
			'title' => 'required|string',
			'organization' => 'required|string',
			'email' => 'required|email',
			'mobile' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all referee form inputs
		$body = $request->all();

		//TODO ensure project id etc?
		$body['project_id'] = $request->session()->get('project_id');

		//create referee
		$referee = Referee::create($body);

		return [
			'message' => 'Saved successfully',
			'referees' => $user->referees,
		];

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {

		//load referee
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

		//obtain user
		$user = \Auth::user();

		//ensure valid referee
		$this->validate($request, [
			'name' => 'required|string',
			'title' => 'required|string',
			'organization' => 'required|string',
			'email' => 'required|email',
			'mobile' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
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

		return redirect()->route('users.cv', ['id' => $user->id]);

	}

	public function updateReferee(Request $request, $id) {

		//obtain user
		$user = \Auth::user();

		//ensure valid referee
		$this->validate($request, [
			'name' => 'required|string',
			'title' => 'required|string',
			'organization' => 'required|string',
			'email' => 'required|email',
			'mobile' => 'required|string',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all referee form inputs
		$body = $request->all();

		//find existing referee
		$referee = Referee::findOrFail($id);

		//update referee
		$referee->update($body);

		return [
			'message' => 'Updated successfully',
			'referees' => $user->referees,
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

		Referee::destroy($id);

		//flash message
		flash(trans('referees.actions.delete.flash.success'))
			->success()->important();

		return redirect()->route('users.cv', ['id' => $user->id]);
	}

	public function destroyReferee(Request $request, $id) {

		//obtain user
		$user = \Auth::user();

		Referee::destroy($id);

		return [
			'message' => 'Deleted successfully',
			'referees' => $user->referees,
		];
	}
}
