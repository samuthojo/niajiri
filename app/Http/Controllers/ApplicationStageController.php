<?php

namespace App\Http\Controllers;

use App\Models\ApplicationStage;
use App\Models\Position;
use App\Models\Stage;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class ApplicationStageController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = ApplicationStage::filter($request->all())->orderBy('created_at', 'asc');

		//load position
		$position = Position::find($request->input('position_id'));

		//load stage
		$stage = Stage::find($request->input('stage_id'));

		//paginate query result
		$applicationstages = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'ApplicationStages',
			'route_description' => 'ApplicationStage List',
			'applicationstages' => $applicationstages,
			'position' => $position,
			'stage' => $stage,
			'q' => $request->input('q'),
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applicationstages.index', $data);
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
		return view('applicationstages.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//TODO check CV validity

		//ensure valid applicationstage
		$this->validate($request, [
            'application_id' => 'string|required|exists:applications,id',
            'stage_id' => 'string|required|exists:stages,id',
            'applicant_id' => 'string|required|exists:users,id',
            'organization_id' => 'string|required|exists:users,id',
            'position_id' => 'string|required|exists:positions,id'
		]);

		//obtain all applicationstage form inputs
		$body = $request->all();

		//create applicationstage
		$applicationstage = ApplicationStage::create($body);

		//flash message
		flash(trans('applicationstages.actions.save.flash.success'))
			->success()->important();

		//TODO redirect to applicant profile
		//redirect to show applicationstage
		return redirect()->route('applicationstages.index', [
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
		//TODO check CV validity

		//load applicationstage with permissions
		$applicationstage = ApplicationStage::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show ApplicationStage',
			'route_description' => 'Show ApplicationStage',
			'applicationstage' => $applicationstage,
			'instance' => $applicationstage,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applicationstages.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		//TODO check CV validity

		$applicationstage = ApplicationStage::findOrFail($id);

		$data = [
			'route_title' => 'Edit ApplicationStage',
			'route_description' => 'Edit ApplicationStage',
			'applicationstage' => $applicationstage,
			'instance' => $applicationstage,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applicationstages.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
		//ensure valid applicationstage
		$this->validate($request, [
            'application_id' => 'string|required|exists:applications,id',
            'stage_id' => 'string|required|exists:stages,id',
            'applicant_id' => 'string|required|exists:users,id',
            'organization_id' => 'string|required|exists:users,id',
            'position_id' => 'string|required|exists:positions,id'
		]);

		//obtain all applicationstage form inputs
		$body = $request->all();

		//find existing applicationstage
		$applicationstage = ApplicationStage::findOrFail($id);

		//update applicationstage
		$applicationstage->update($body);

		//flash message
		flash(trans('applicationstages.actions.update.flash.success'))
			->success()->important();

		//TODO redirect to applicant profile
		//redirect to show applicationstage
		return redirect()->route('applicationstages.index',[
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

		ApplicationStage::destroy($id);

		//flash message
		flash(trans('applicationstages.actions.delete.flash.success'))
			->success()->important();

		//TODO redirect to specific applicant profile
		return redirect()->route('applicationstages.index',[
				'applicant_id' => $request->input('applicant_id')
			]);
	}
}
