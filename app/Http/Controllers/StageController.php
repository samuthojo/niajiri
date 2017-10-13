<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Repositories\StageRepository;
use App\Repositories\TestRepository;
use App\Http\Controllers\SecureController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StageController extends SecureController
{
    /** @var  StageRepository */
    private $stageRepository;

    public function __construct(StageRepository $stageRepo, TestRepository $testRepo)
    {
        parent::__construct();
        $this->stageRepository = $stageRepo;
        $this->testRepository = $testRepo;
    }

    /**
     * Display a listing of the Stage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stageRepository->pushCriteria(new RequestCriteria($request));
        $stages = $this->stageRepository->all();

        return view('pages.stages.index',[
            'route_title' => 'Stages',
            'route_description' => 'Stages',
            'sectors' => $stages
        ]);
    }

    /**
     * Show the form for creating a new Stage.
     *
     * @return Response
     */
    public function create()
    {
      return view('pages.stages.create',[
          'route_title' => 'Stages',
          'route_description' => 'Stages',
      ]);
    }

    /**
     * Store a newly created Stage in storage.
     *
     * @param CreateStageRequest $request
     *
     * @return Response
     */
    public function store(CreateStageRequest $request)
    {
        $input = $request->all();

        $stage = $this->stageRepository->create($input);

        Flash::success('Stage saved successfully.');

        return redirect(route('stages.index'));

    }

    /**
     * Display the specified Stage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('stages.index'));
        }

        return view('pages.stages.show',[
            'route_title' => 'Stages',
            'route_description' => 'Stages',
            'stage' => $stage,
            'instance' => $stage
        ]);
    }

    /**
     * Show the form for editing the specified Stage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('stages.index'));
        }

        return view('pages.stages.edit',[
            'route_title' => 'Stages',
            'route_description' => 'Stages',
            'stage' => $stage,
            'instance' => $stage
        ]);
    }

    /**
     * Update the specified Stage in storage.
     *
     * @param  int              $id
     * @param UpdateStageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStageRequest $request)
    {
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('stages.index'));
        }

        $stage = $this->stageRepository->update($request->all(), $id);

        Flash::success('Stage updated successfully.');

        return redirect(route('stages.show', ['id' => $id]));
    }

    /**
     * Remove the specified Stage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stage = $this->stageRepository->findWithoutFail($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('stages.index'));
        }

        $this->stageRepository->delete($id);

        Flash::success('Stage deleted successfully.');

        return redirect(route('positions.show',['id' => $stage->position_id]));
    }


    /**
     * Show the form for creating a new Test.
     *
     * @return Response
     */
    public function TestCreate($stage_id)
    {
      $stage = $this->stageRepository->findWithoutFail($stage_id);

      return view('pages.stages.tests.create',[
          'route_title' => 'Test Create',
          'route_description' => 'Stages',
          'stage'  => $stage,
      ]);
    }



    /**
     * Store a newly created Test  and attach to Stage in storage.
     *
     * @param CreateTestRequest $request
     *
     * @return Response
     */
    public function TestStore($id, Request $request)
    {
        $input = $request->all();
        $input['stage_id'] = $id;

        $test = $this->testRepository->create($input);

        Flash::success('Stage Test saved successfully.');

        return redirect(route('stages.show',['id' => $test->stage_id]));

    }

}
