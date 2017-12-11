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
		return redirect()->route('tests.index', $request->all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//TODO ensure unique(stage,position,category) on test

		//ensure valid test
		$this->validate($request, [
			'category' => 'string|required',
			'duration' => 'is_numeric|required',
			'stage_id' => 'string|required|exists:stages,id',
			'position_id' => 'string|required|exists:positions,id',
		]);

		//obtain all test form inputs
		$body = $request->all();

		//create test
		$test = Test::create($body);

		//flash message
		flash(trans('tests.actions.save.flash.success'))
			->success()->important();

		//redirect to show stage test listing
		return redirect()->route('tests.index', [
			'position_id' => $test->position_id,
			'stage_id' => $test->stage_id,
			// 'test_id' => $test->id,
		]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {
		return redirect()->route('tests.index', $request->all());
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
