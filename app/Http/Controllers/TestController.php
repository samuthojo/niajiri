<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Stage;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query;

		//obtain position and sgtage id
		$position_id = $request->input('position_id');
		$stage_id = $request->input('stage_id');

		//load specific position & stage questions
		if (is_set($position_id)) {
			$query = Test::filter($request->all())
				->orderBy('created_at', 'asc')
				->orderBy('category', 'desc');
		}

		//load all tests that are not of specific position
		else {
			$query = Test::filter($request->except(['position_id', 'stage_id']))
				->whereNull('position_id')
				->orderBy('created_at', 'asc')
				->orderBy('category', 'desc');
		}

		//load position
		$position = Position::find($position_id);

		//load stage
		$stage = Stage::find($stage_id);

		//query result
		$tests = $query->get();

		//redirect to first test if exists
		if ($tests->count() >= 1) {

			$test = $tests->first();

			return redirect()->route('tests.show', [
				'id' => $test->id,
				'position_id' => $test->position_id,
				'stage_id' => $test->stage_id,
			]);

		}

		//continue listing
		else {

			$data = [
				'route_title' => 'Tests',
				'route_description' => 'Test List',
				'tests' => $tests,
				'position' => $position,
				'stage' => $stage,
				'instance' => $stage ? $stage : new Stage(),
			];

			return view('tests.index', $data);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {
		return redirect()->route('tests.index', $request->all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//ensure valid test
		$this->validate($request, [
			'category' => 'string|required',
			'duration' => 'numeric|required',
		]);

		//obtain all test form inputs
		$body = $request->all();

		//update or create
		$test = Test::updateOrCreate([
			'position_id' => $request->input('position_id'),
			'stage_id' => $request->input('stage_id'),
			'category' => $request->input('category'),
		], $body);

		//flash message
		flash(trans('tests.actions.save.flash.success'))
			->success()->important();

		//redirect to show test
		return redirect()->route('tests.show', [
			'id' => $test->id,
		]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {

		//get test instance
		$test = Test::query()->findOrFail($id);

		//load related tests
		$tests = Test::query()
			->where([
				'position_id' => $test->position_id,
				'stage_id' => $test->stage_id,
			])
			->orderBy('created_at', 'asc')
			->orderBy('category', 'desc')
			->get();

		//position
		$position = $test->position;

		//stage
		$stage = $test->stage;

		$data = [
			'route_title' => $test->category . ' Test',
			'route_description' => $test->category . ' Test',
			'tests' => $tests,
			'test' => $test,
			'instance' => $test,
			'position' => $position,
			'stage' => $stage,
		];

		return view('tests.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {
		return redirect()->route('tests.index', $request->all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		return redirect()->route('tests.index', $request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {
		return redirect()->route('tests.index', $request->all());
	}
}
