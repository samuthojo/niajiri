<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Stage;
use App\Models\StageTest;
use App\Models\Test;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class StageTestController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = StageTest::filter($request->all())
			->orderBy('created_at', 'asc');

		//paginate query result
		$stagetests = $query->paginate(config('app.defaults.pageSize'));

		//prepare data
		$data = [
			'route_title' => 'Stage Tests',
			'route_description' => 'Stage Test List',
			'stagetests' => $stagetests,
		];

		//merge query params and data
		$data = collect($request->all())->merge($data)->all();

		return view('stagetests.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {

		//TODO find if there is an existing stage test
		//and find a way to merge changes or redirect to edit
		//so that applicant can continue to take test

		//obtain test and all its question
		$test = Test::query()
			->where('position_id', $request->input('position_id'))
			->where('stage_id', $request->input('stage_id'))
			->where('id', $request->input('test_id'))
			->firstOrFail();

		//prepare data
		$instance = new StageTest();
		$instance->position = $test->position;
		$instance->stage = $test->stage;

		$data = [
			'instance' => $instance,
			'position' => $test->position,
			'stage' => $test->stage,
			'questions' => $test->questions,
			'test' => $test,
			'route_title' => $test->category . ' ' . trans('stagetests.headers.test'),
			'route_description' => $test->category,
		];

		//merge query params and data
		$data = collect($request->all())->merge($data)->all();

		return view('stagetests.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//ensure valid stagetest
		$this->validate($request, [
			'applicant_id' => 'string|required|exists:users,id',
			'application_id' => 'string|required|exists:applications,id',
			'position_id' => 'string|required|exists:positions,id',
			'stage_id' => 'string|required|exists:stages,id',
			'test_id' => 'string|required|exists:tests,id',
			'attempts' => 'required',
		]);

		//find test
		$stagetest = Test::attempt($request->all());

		//flash message
		flash(trans('stagetests.actions.save.flash.success'))
			->success()->important();

		//redirect to test results
		//TODO fix breadcrumbs to return to application
		//TODO update cancel to return to application
		return redirect()->route('applications.application', [
			'id' => $request->input('application_id'),
			'applicant_id' => $request->input('applicant_id'),
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

		//load stagetest with permissions
		$stagetest = StageTest::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Stage Test',
			'route_description' => 'Show Stage Test',
			'position' => $stagetest->position,
			'application' => $stagetest->application,
			'instance' => $stagetest,
			'stagetest' => $stagetest,
			'stage' => $stagetest->stage,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('stagetests.application', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		//TODO check CV validity

		$stagetest = StageTest::query()->findOrFail($id);

		$data = [
			'route_title' => 'Edit Stage Test',
			'route_description' => 'Edit Stage Test',
			'position' => $stagetest->position,
			'application' => $stagetest->application,
			'instance' => $stagetest,
			'stagetest' => $stagetest,
			'stage' => $stagetest->stage,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('stagetests.application', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		//obtain all stagetest form inputs
		$body = $request->all();

		//find existing stagetest
		$stagetest = StageTest::findOrFail($id);

		//update stagetest
		$stagetest->update($body);

		//flash message
		flash(trans('stagetests.actions.update.flash.success'))
			->success()->important();

		//redirect to application stage listing
		return redirect()->route('stagetests.index', [
			'position_id' => $stagetest->position_id,
			'stage_id' => $stagetest->stage_id,
		]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {

		//force delete application stage
		$stagetest = StageTest::findOrFail($id);
		$stagetest->forceDelete();

		//flash message
		flash(trans('stagetests.actions.delete.flash.success'))
			->success()->important();

		//redirect to application stage listing
		return redirect()->route('stagetests.index', [
			'position_id' => $stagetest->position_id,
			'stage_id' => $stagetest->stage_id,
		]);
	}
}
