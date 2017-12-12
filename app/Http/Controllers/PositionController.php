<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\CreateStageRequest;
use App\Http\Requests\CreatePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Repositories\PositionRepository;
use App\Repositories\OrganizationRepository;
use App\Repositories\SectorRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\StageRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Input;

class PositionController extends SecureController
{
    /** @var  PositionRepository */
    private $positionRepository;
    private $organizationRepository;
    private $sectorRepository;
    private $projectRepository;
    private $stageRepository;

    public function __construct(PositionRepository $positionRepo,
                                OrganizationRepository $organizationRepo,
                                SectorRepository $sectorRepo,
                                ProjectRepository $projectRepo, StageRepository $stageRepo)
    {
        parent::__construct();
        $this->positionRepository = $positionRepo;
        $this->organizationRepository = $organizationRepo;
        $this->sectorRepository = $sectorRepo;
        $this->projectRepository = $projectRepo;
        $this->stageRepository = $stageRepo;
    }

    /**
     * Display a listing of the Position.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->positionRepository->pushCriteria(new RequestCriteria($request));
        $positions = $this->positionRepository->paginate(config('app.defaults.pageSize'));

        return view('pages.positions.index',[
            'route_title' => 'Positions',
            'route_description' => 'Positions',
            'positions' => $positions
        ]);
    }

    /**
     * Show the form for creating a new Position.
     *
     * @return Response
     */
    public function create()
    {
        $sectors = $this->sectorRepository->pluck('name', 'id')->toArray();

        //only show active projects
        $projects = $this->projectRepository->findWhere([['endedAt', '>=', date('Y-m-d').' 00:00:00']])->pluck('name', 'id')->toArray();

        return view('pages.positions.create',[
            'route_title' => 'Positions',
            'route_description' => 'Positions',
            'sectors'        => $sectors,
            'projects'       => $projects,
        ]);
    }

    /**
     * Store a newly created Position in storage.
     *
     * @param CreatePositionRequest $request
     *
     * @return Response
     */
    public function store(CreatePositionRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->findWithoutFail($request['project_id']);

        $input['organization_id'] = $project->organization_id;
        $input['dueAt'] = $project->endedAt;
        $input['publishedAt']  = $project->startedAt;

        $position = $this->positionRepository->create($input);

        Flash::success('Position saved successfully.');

        return redirect(route('positions.index'));
    }

    /**
     * Display the specified Position.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $position = $this->positionRepository->findWithoutFail($id);

        if (empty($position)) {
            Flash::error('Position not found');

            return redirect(route('positions.index'));
        }

        return view('pages.positions.show',[
            'route_title' => 'Position',
            'route_description' => 'Position',
            'position' => $position,
            'instance' => $position
        ]);
    }

    /**
     * Show the form for editing the specified Position.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $position = $this->positionRepository->findWithoutFail($id);

        $sectors = $this->sectorRepository->pluck('name', 'id')->toArray();

        //only show active projects
        $projects = $this->projectRepository->findWhere([['endedAt', '>=', date('Y-m-d').' 00:00:00']])->pluck('name', 'id')->toArray();
        if (empty($position)) {
            Flash::error('Position not found');

            return redirect(route('positions.index'));
        }
        return view('pages.positions.edit',[
            'route_title' => 'Positions',
            'route_description' => 'Positions',
            'position'   => $position,
            'instance'   => $position,
            'sectors'     => $sectors,
            'projects'    => $projects
        ]);
    }

    /**
     * Update the specified Position in storage.
     *
     * @param  int              $id
     * @param UpdatePositionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePositionRequest $request)
    {
        $position = $this->positionRepository->findWithoutFail($id);

        if (empty($position)) {
            Flash::error('Position not found');

            return redirect(route('positions.index'));
        }

        $project = $this->projectRepository->findWithoutFail($request['project_id']);
        $request['organization_id'] = $project->organization_id;
        $position = $this->positionRepository->update($request->all(), $id);

        Flash::success('Positon was updated successfully');

        return redirect(route('positions.index'));
    }

    /**
     * Remove the specified Position from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $position = $this->positionRepository->findWithoutFail($id);

        if (empty($position)) {
            Flash::error('Position not found');

            return redirect(route('positions.index'));
        }

        $this->positionRepository->delete($id);

        Flash::success('Position deleted successfully.');

        return redirect(route('positions.index'));
    }


    /**
     * Show the open positions for application
     *
     * @return \Illuminate\Http\Response
     */

    public function open(Request $request) {

        //TODO support additional filters & searches

        //initialize query
        $query = Position::query()->which()->are()->open();

        if(is_set($request->input('project_id'))){
          $query = $query->where('project_id', $request->input('project_id'));
        }

        //paginate query result
        $positions = $query->paginate(config('app.defaults.pageSize'));

        $data = [
            'route_title' => 'Open Positions',
            'route_description' => 'Available Job Positions',
            'positions' => $positions,
            'q' => $request->input('q'),
        ];

        return view('positions.open.index', $data);
    }

    /**
     * Preview the specified position for application
     *
     * @param  int $id
     *
     * @return Response
     */
    public function preview(Request $request, $id)
    {
        //load position
        $position = Position::findOrFail($id);

        $data = [
            'route_title' => 'Open Position',
            'route_description' => 'Open Position',
            'position' => $position,
            'instance' => $position
        ];

        return view('positions.open.preview', $data);
    }


    /**
     * Show the form for creating a new Position Stage.
     *
     * @return Response
     */

    public function StageCreate($id)
    {
      $position = Position::findOrFail($id);

      return view('pages.stages.create',[
          'route_title' => 'Stages',
          'route_description' => 'Stages',
          'position' => $position,
          'instance' => $position,
      ]);
    }



    /**
     * Store a newly created Stage in storage.
     *
     * @param CreateStageRequest $request
     *
     * @return Response
     */
    public function Stagestore($id, CreateStageRequest $request)
    {
        $input = $request->all();

        $input['position_id'] = $id;

        $stage = $this->stageRepository->create($input);

        Flash::success('Position Stage saved successfully.');

        return redirect(route('positions.show',['id' => $stage->position_id]));

    }

}
