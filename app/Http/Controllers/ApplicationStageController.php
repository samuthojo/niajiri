<?php

namespace App\Http\Controllers;

use App\Models\ApplicationStage;
use App\Models\Position;
use App\Models\Stage;
use Excel;
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
		$query = ApplicationStage::filter($request->all())
			->orderBy('created_at', 'asc')
			->orderBy('score', 'desc');

		//load position
		$position = Position::find($request->input('position_id'));

		//load stage
		$stage = Stage::find($request->input('stage_id'));

		//paginate query result
		$applicationstages = $query->paginate(config('app.defaults.pageSize'));

		//load summary
		$summary = [
			'applied' => ApplicationStage::totalApplied($position, $stage),
			'passed' => ApplicationStage::totalPassed($position, $stage),
			'failed' => ApplicationStage::totalFailed($position, $stage),
			'unreviewed' => ApplicationStage::totalUnreviewed($position, $stage),
		];

		$data = [
			'route_title' => 'Application Stages',
			'route_description' => 'Application Stage List',
			'applicationstages' => $applicationstages,
			'instance' => $stage,
			'position' => $position,
			'stage' => $stage,
			'summary' => $summary,
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
			'position_id' => 'string|required|exists:positions,id',
		]);

		//obtain all applicationstage form inputs
		$body = $request->all();

		//create applicationstage
		$applicationstage = ApplicationStage::create($body);

		//flash message
		flash(trans('applicationstages.actions.save.flash.success'))
			->success()->important();

		//redirect to show application stage listing
		return redirect()->route('applicationstages.index', [
			'position_id' => $applicationstage->position_id,
			'stage_id' => $applicationstage->stage_id,
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
			'route_title' => 'Show Application Stage',
			'route_description' => 'Show Application Stage',
			'position' => $applicationstage->position,
			'application' => $applicationstage->application,
			'instance' => $applicationstage,
			'applicationstage' => $applicationstage,
			'stage' => $applicationstage->stage,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applicationstages.application', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		//TODO check CV validity

		$applicationstage = ApplicationStage::query()->findOrFail($id);

		$data = [
			'route_title' => 'Edit Application Stage',
			'route_description' => 'Edit Application Stage',
			'position' => $applicationstage->position,
			'application' => $applicationstage->application,
			'instance' => $applicationstage,
			'applicationstage' => $applicationstage,
			'stage' => $applicationstage->stage,
			'applicant_id' => $request->input('applicant_id'),
		];

		return view('applicationstages.application', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		//obtain all applicationstage form inputs
		$body = $request->all();

		//find existing applicationstage
		$applicationstage = ApplicationStage::findOrFail($id);

		//update applicationstage
		$applicationstage->update($body);

		//flash message
		flash(trans('applicationstages.actions.update.flash.success'))
			->success()->important();

		//redirect to application stage listing
		return redirect()->route('applicationstages.index', [
			'position_id' => $applicationstage->position_id,
			'stage_id' => $applicationstage->stage_id,
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
		$applicationstage = ApplicationStage::findOrFail($id);
		$applicationstage->forceDelete();

		//flash message
		flash(trans('applicationstages.actions.delete.flash.success'))
			->success()->important();

		//redirect to application stage listing
		return redirect()->route('applicationstages.index', [
			'position_id' => $applicationstage->position_id,
			'stage_id' => $applicationstage->stage_id,
		]);
	}

	/**
	 * Export application stage(applicant, stage and score)
	 *
	 * @return void
	 */
	public function export(Request $request) {

		//initialize query
		$query = ApplicationStage::filter($request->all())
			->orderBy('created_at', 'asc')
			->orderBy('score', 'desc');

		//load position
		$position = Position::query()->findOrFail($request->input('position_id'));

		//load stage
		$stage = Stage::findOrFail($request->input('stage_id'));

		//obtain application stages(applicant plus stage)
		$applicationstages = $query->get();

		//prepare workbook name
		$workbook = snake_case($position->organization->name) . '_' . snake_case($position->project->name);

		//prepare sheet name
		$sheet = snake_case($position->title) . '_' . snake_case($stage->name);

		//build workbook
		Excel::create($workbook, function ($excel) use ($applicationstages, $sheet) {

			//build sheet
			$excel->sheet($sheet, function ($sheet) use ($applicationstages) {

				//set headers
				$sheet->row(1, [
					trans('cvs.inputs.name.header'),
					trans('cvs.inputs.age.header'),
					trans('cvs.inputs.gender.header'),
					trans('cvs.inputs.mobile.header'),
					trans('cvs.inputs.email.header'),
					trans('applicationstages.inputs.score.header'),
					trans('applicationstages.inputs.status.header'),
				]);

				$rowCount = 2;

				//set data to export
				foreach ($applicationstages as $item) {

					$sheet->row($rowCount, [
						display_or_na($item->applicant->fullName()),
						display_int($item->applicant->age()),
						display_or_na($item->applicant->gender),
						display_or_na($item->applicant->mobile),
						display_or_na($item->applicant->email),
						display_decimal($item->score),
						$item->score === null ? trans('applicationstages.scores.na') : display_boolean($item->hasPass(), trans('applicationstages.scores.pass'), trans('applicationstages.scores.failed')),
					]);

					$rowCount++;
				}

			});

		})->export('xls');
	}
}
