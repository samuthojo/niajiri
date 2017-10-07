<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class PublicationController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Publication::filter($request->all())->orderBy('published_at', 'desc');

		//paginate query result
		$publications = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Publications',
			'route_description' => 'Publication List',
			'publications' => $publications,
			'q' => $request->input('q'),
		];

		return view('publications.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('publications.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//ensure valid publication
		$this->validate($request, [
			'title' => 'required|string',
			'publisher' => 'required|string',
			'summary' => 'nullable|string',
			'published_at' => 'required|date_format:d-m-Y',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all publication form inputs
		$body = $request->all();

		//create publication
		$publication = Publication::create($body);

		//flash message
		flash(trans('publications.actions.save.flash.success'))
			->success()->important();

		//TODO redirect to applicant profile
		//redirect to show publication
		return redirect()->route('publications.show', [$publication]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		//load publication with permissions
		$publication = Publication::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Publication',
			'route_description' => 'Show Publication',
			'publication' => $publication,
			'instance' => $publication
		];

		return view('publications.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$publication = Publication::findOrFail($id);

		$data = [
			'route_title' => 'Edit Publication',
			'route_description' => 'Edit Publication',
			'publication' => $publication,
			'instance' => $publication,
		];

		return view('publications.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
		//ensure valid publication
		$this->validate($request, [
			'title' => 'required|string',
			'publisher' => 'required|string',
			'summary' => 'nullable|string',
			'published_at' => 'required|date_format:d-m-Y',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all publication form inputs
		$body = $request->all();

		//find existing publication
		$publication = Publication::findOrFail($id);

		//update publication
		$publication->update($body);

		//flash message
		flash(trans('publications.actions.update.flash.success'))
			->success()->important();

		//TODO redirect to applicant profile
		//redirect to show publication
		return redirect()->route('publications.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		Publication::destroy($id);

		//flash message
		flash(trans('publications.actions.delete.flash.success'))
			->success()->important();

		//TODO redirect to specific applicant profile
		return redirect('publications');
	}
}
