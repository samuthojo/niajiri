<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

//TODO refactor to use repository as Makonda

class CertificateController extends SecureController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		//initialize query
		$query = Certificate::filter($request->all())->orderBy('finished_at', 'desc');

		//paginate query result
		$certificates = $query->paginate(config('app.defaults.pageSize'));

		$data = [
			'route_title' => 'Certificates',
			'route_description' => 'Certificate List',
			'certificates' => $certificates,
			'q' => $request->input('q'),
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('certificates.index', $data);
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
		return view('certificates.create', $data);
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

		//ensure valid certificate
		$this->validate($request, [
			'title' => 'required|string',
			'institution' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required',
			'finished_at' => 'nullable',
			'expired_at' => 'nullable',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all certificate form inputs
		$body = $request->all();

		//create certificate
		$certificate = Certificate::create($body);

		//upload & store certificate attachment
		if ($certificate && $request->hasFile('attachment')) {
			//clear existing attachment
			$certificate->clearMediaCollection('attachments');
			//attach new attachment
			$certificate->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		//flash message
		flash(trans('certificates.actions.save.flash.success'))
			->success()->important();

		//redirect to show certificate
		return redirect()->route('users.cv', ['id' => $user->id]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {

		//load certificate
		$certificate = Certificate::query()->findOrFail($id);

		$data = [
			'route_title' => 'Show Certificate',
			'route_description' => 'Show Certificate',
			'certificate' => $certificate,
			'instance' => $certificate,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('certificates.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		$certificate = Certificate::findOrFail($id);

		$data = [
			'route_title' => 'Edit Certificate',
			'route_description' => 'Edit Certificate',
			'certificate' => $certificate,
			'instance' => $certificate,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('certificates.edit', $data);
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
		
		//ensure valid certificate
		$this->validate($request, [
			'title' => 'required|string',
			'institution' => 'required|string',
			'summary' => 'nullable|string',
			'started_at' => 'required',
			'finished_at' => 'nullable',
			'expired_at' => 'nullable',
            'applicant_id' => 'string|required|exists:users,id'
		]);

		//obtain all certificate form inputs
		$body = $request->all();

		//find existing certificate
		$certificate = Certificate::findOrFail($id);

		//update certificate
		$certificate->update($body);

		//upload & store certificate attachment
		if ($certificate && $request->hasFile('attachment')) {
			//clear existing attachment
			$certificate->clearMediaCollection('attachments');
			//attach new attachment
			$certificate->addMediaFromRequest('attachment')
				->toMediaCollection('attachments');
		}

		//flash message
		flash(trans('certificates.actions.update.flash.success'))
			->success()->important();

		//redirect to show certificate
		return redirect()->route('users.cv', ['id' => $user->id]);

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

		Certificate::destroy($id);

		//flash message
		flash(trans('certificates.actions.delete.flash.success'))
			->success()->important();

		return redirect()->route('users.cv', ['id' => $user->id]);
	}
}
