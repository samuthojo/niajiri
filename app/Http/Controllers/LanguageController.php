<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class LanguageController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Language::filter($request->all())->orderBy('fluency', 'desc');

		//paginate query result
		$languages = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Languages',
			'route_description' => 'Language List',
			'languages' => $languages,
			'q' => $request->input('q'),
		];

		return view('languages.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('languages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		//ensure valid language
		$this->validate($request, [
			'name' => 'required|string',
			'fluency' => 'required|string',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all language form inputs
		$body = $request->all();

		//create language
		$language = Language::create($body);

		//flash message
		flash(trans('languages.actions.save.flash.success'))
			->success()->important();

		//TODO redirect to applicant profile
		//redirect to show language
		return redirect()->route('languages.show', [$language]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		//load language with permissions
		$language = Language::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Language',
			'route_description' => 'Show Language',
			'language' => $language,
			'instance' => $language
		];

		return view('languages.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$language = Language::findOrFail($id);

		$data = [
			'route_title' => 'Edit Language',
			'route_description' => 'Edit Language',
			'language' => $language,
			'instance' => $language,
		];

		return view('languages.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
		//ensure valid language
		$this->validate($request, [
			'name' => 'required|string',
			'fluency' => 'required|string',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all language form inputs
		$body = $request->all();

		//find existing language
		$language = Language::findOrFail($id);

		//update language
		$language->update($body);

		//flash message
		flash(trans('languages.actions.update.flash.success'))
			->success()->important();

		//TODO redirect to applicant profile
		//redirect to show language
		return redirect()->route('languages.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		Language::destroy($id);

		//flash message
		flash(trans('languages.actions.delete.flash.success'))
			->success()->important();

		//TODO redirect to specific applicant profile
		return redirect('languages');
	}
}
