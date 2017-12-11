<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Stage;
use App\Models\Test;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class TestController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Test::filter($request->all())
			->orderBy('created_at', 'asc')
			->orderBy('category', 'desc');

		//load position
		$position = Position::findOrFail($request->input('position_id'));

		//load stage
		$stage = Stage::findOrFail($request->input('stage_id'));

		//paginate query result
		$tests = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Tests',
			'route_description' => 'Test List',
			'tests' => $tests,
			'instance' => $stage,
			'position' => $position,
			'stage' => $stage,
		];

		return view('tests.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {

		//load position
		$position = Position::find($request->input('position_id'));

		//load stage
		$stage = Stage::find($request->input('stage_id'));

		$data = [
			'instance' => $stage,
			'position' => $position,
			'stage' => $stage,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('tests.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//TODO check CV validity

		//ensure valid test
		$this->validate($request, [
			'application_id' => 'string|required|exists:applications,id',
			'stage_id' => 'string|required|exists:stages,id',
			'applicant_id' => 'string|required|exists:users,id',
			'organization_id' => 'string|required|exists:users,id',
			'position_id' => 'string|required|exists:positions,id',
		]);

		//obtain all test form inputs
		$body = $request->all();

		//create test
		$test = Test::create($body);

		//flash message
		flash(trans('tests.actions.save.flash.success'))
			->success()->important();

		//redirect to show application stage listing
		return redirect()->route('tests.index', [
			'position_id' => $test->position_id,
			'stage_id' => $test->stage_id,
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

		//load test with permissions
		$test = Test::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Test',
			'route_description' => 'Show Test',
			'position' => $test->position,
			'application' => $test->application,
			'instance' => $test,
			'test' => $test,
			'stage' => $test->stage,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('tests.application', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		//TODO check CV validity

		$test = Test::query()->findOrFail($id);

		$data = [
			'route_title' => 'Edit Test',
			'route_description' => 'Edit Test',
			'position' => $test->position,
			'application' => $test->application,
			'instance' => $test,
			'test' => $test,
			'stage' => $test->stage,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('tests.application', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		//obtain all test form inputs
		$body = $request->all();

		//find existing test
		$test = Test::findOrFail($id);

		//update test
		$test->update($body);

		//flash message
		flash(trans('tests.actions.update.flash.success'))
			->success()->important();

		//redirect to application stage listing
		return redirect()->route('tests.index', [
			'position_id' => $test->position_id,
			'stage_id' => $test->stage_id,
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
		$test = Test::findOrFail($id);
		$test->forceDelete();

		//flash message
		flash(trans('tests.actions.delete.flash.success'))
			->success()->important();

		//redirect to application stage listing
		return redirect()->route('tests.index', [
			'position_id' => $test->position_id,
			'stage_id' => $test->stage_id,
		]);
	}
}
