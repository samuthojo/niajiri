<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class AchievementController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Achievement::filter($request->all())->orderBy('issued_at', 'desc');

		//paginate query result
		$achievements = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Honors/Awards',
			'route_description' => 'Honors/Awards',
			'achievements' => $achievements,
			'q' => $request->input('q'),
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('achievements.index', $data);
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
		return view('achievements.create', $data);
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

		//ensure valid achievement
		$this->validate($request, [
			'title' => 'required|string',
			'organization' => 'required|string',
			'summary' => 'nullable|string',
			'issued_at' => 'required',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all achievement form inputs
		$body = $request->all();

		//create achievement
		$achievement = Achievement::create($body);

		//upload & store achievement attachment
		if ($achievement && $request->hasFile('attachment')) {
			//clear existing attachment
			$achievement->clearMediaCollection('attachments');
			//attach new attachment
			$achievement->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		//flash message
		flash(trans('achievements.actions.save.flash.success'))
			->success()->important();

		//redirect to show achievement
		return redirect()->route('users.cv', ['id' => $user->id]);

	}

	public function storeHonors(Request $request) {

		//obtain user
		$user = \Auth::user();

		//ensure valid achievement
		$this->validate($request, [
			'title' => 'required|string',
			'organization' => 'required|string',
			'summary' => 'nullable|string',
			'issued_at' => 'required',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all achievement form inputs
		$body = $request->all();

		//create achievement
		$achievement = Achievement::create($body);

		//upload & store achievement attachment
		if ($achievement && $request->hasFile('attachment')) {
			//clear existing attachment
			$achievement->clearMediaCollection('attachments');
			//attach new attachment
			$achievement->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		return [
			'message' => 'Saved successfully',
			'honors' => $user->achievements,
		];

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {

		//load achievement
		$achievement = Achievement::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Honor/Award',
			'route_description' => 'Show Honor/Award',
			'achievement' => $achievement,
			'instance' => $achievement,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('achievements.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		$achievement = Achievement::findOrFail($id);

		$data = [
			'route_title' => 'Edit Honor/Award',
			'route_description' => 'Edit Honor/Award',
			'achievement' => $achievement,
			'instance' => $achievement,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('achievements.edit', $data);
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

		//ensure valid achievement
		$this->validate($request, [
			'title' => 'required|string',
			'organization' => 'required|string',
			'summary' => 'nullable|string',
			'issued_at' => 'required',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all achievement form inputs
		$body = $request->all();
		$body['project_id'] = $request->session()->get('project_id');

		//find existing achievement
		$achievement = Achievement::findOrFail($id);

		//update achievement
		$achievement->update($body);

		//upload & store achievement attachment
		if ($achievement && $request->hasFile('attachment')) {
			//clear existing attachment
			$achievement->clearMediaCollection('attachments');
			//attach new attachment
			$achievement->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		//flash message
		flash(trans('achievements.actions.update.flash.success'))
			->success()->important();

		//redirect to show achievement
		return redirect()->route('users.cv', ['id' => $user->id]);

	}

	public function updateHonors(Request $request, $id) {

		//obtain user
		$user = \Auth::user();

		//ensure valid achievement
		$this->validate($request, [
			'title' => 'required|string',
			'organization' => 'required|string',
			'summary' => 'nullable|string',
			'issued_at' => 'required',
			'applicant_id' => 'string|required|exists:users,id',
		]);

		//obtain all achievement form inputs
		$body = $request->all();
		$body['project_id'] = $request->session()->get('project_id');

		//find existing achievement
		$achievement = Achievement::findOrFail($id);

		//update achievement
		$achievement->update($body);

		//upload & store achievement attachment
		if ($achievement && $request->hasFile('attachment')) {
			//clear existing attachment
			$achievement->clearMediaCollection('attachments');
			//attach new attachment
			$achievement->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		return [
			'message' => 'Updated successfully',
			'honors' => $user->achievements,
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

		Achievement::destroy($id);

		//flash message
		flash(trans('achievements.actions.delete.flash.success'))
			->success()->important();

		return redirect()->route('users.cv', ['id' => $user->id]);
	}

	public function destroyHonors(Request $request, $id) {
		//obtain user
		$user = \Auth::user();

		Achievement::destroy($id);

		return [
			'message' => 'Deleted successfully',
			'honors' => $user->achievements,
		];
	}
}
