<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Repositories\ProjectRepository;
use App\Repositories\OrganizationRepository;
use App\Http\Controllers\SecureController;
use Illuminate\Http\Request;
use Flash;
use Input;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon;

class ProjectController extends SecureController
{
    /** @var  ProjectRepository */
    private $projectRepository;
    private $organizationRepository;

    public function __construct(ProjectRepository $projectRepo, OrganizationRepository $organizationRepo)
    {
        $this->projectRepository = $projectRepo;
        $this->organizationRepository = $organizationRepo;
    }

    /**
     * Display a listing of the Project.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->projectRepository->pushCriteria(new RequestCriteria($request));
        $projects = $this->projectRepository->all();

        return view('pages.projects.index',[
            'route_title' => 'Project',
            'route_description' => 'Project',
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
      $organization = $this->organizationRepository->findWhere(['type'=>User::TYPE_ORGANIZATION])->pluck('name', 'id');

      return view('pages.projects.create',[
          'route_title' => 'Project',
          'route_description' => 'Project',
          'organizations' => $organization->toArray(),
      ]);
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();
        $project = $this->projectRepository->create([
          'name' => Input::get('name'),
          'organization_id' => Input::get('organization_id'),
          'startedAt' => Input::get('endedAt'),
          'endedAt' => Input::get('endedAt')
        ]);

        Flash::success('Project saved successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);
        $organization = $this->organizationRepository->findWhere(['type'=>User::TYPE_ORGANIZATION])->pluck('name', 'id');

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('pages.projects.show',[
            'route_title' => 'Project',
            'route_description' => 'Project',
            'project' => $project,
            'organizations' => $organization->toArray(),
        ]);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);
        $organization = $this->organizationRepository->findWhere(['type'=>User::TYPE_ORGANIZATION])->pluck('name', 'id');

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('pages.projects.edit',[
            'route_title' => 'Project',
            'route_description' => 'Project',
            'project' => $project,
            'organizations' => $organization->toArray(),
        ]);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int              $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }
}
