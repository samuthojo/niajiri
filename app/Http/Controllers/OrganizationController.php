<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Repositories\OrganizationRepository;
use App\Repositories\SectorRepository;
use App\Http\Controllers\SecureController;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Organization;
use Flash;
use Log;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrganizationController extends SecureController
{
    /** @var  OrganizationRepository */
    private $organizationRepository;

    /** @var  SectorRepository */
    private $sectorRepository;

    public function __construct(OrganizationRepository $organizationRepo, SectorRepository $sectorRepo)
    {
        $this->organizationRepository = $organizationRepo;
        $this->sectorRepository = $sectorRepo;
    }

    /**
     * Display a listing of the Organization.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->organizationRepository->pushCriteria(new RequestCriteria($request));
        $organizations = $this->organizationRepository->all();

        return view('pages.organizations.index',[
            'route_title' => 'Organization',
            'route_description' => 'Organization',
            'organizations' => $organizations
        ]);
    }

    /**
     * Show the form for creating a new Organization.
     *
     * @return Response
     */
    public function create()
    {
        $sectors = $this->sectorRepository->pluck('name', 'id');
        return view('pages.organizations.create', [
            'route_title' => 'Organization',
            'route_description' => 'Organization',
            'sectors' => $sectors->toArray(),
            'organization' => new Organization(),
        ]);
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param CreateOrganizationRequest $request
     *
     * @return Response
     */
    public function store(CreateOrganizationRequest $request)
    {
        $input = $request->all();

        // $logo = Media::create($input['logo']);
        // $logo_id = $logo->id;
        //
        // $input->logo = $logo_id;

        $organization = $this->organizationRepository->create($input);

        Flash::success('Organization saved successfully.');

        return redirect(route('organizations.index'));
    }

    /**
     * Display the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        return view('pages.dashboard.organizations.show')->with('organization', $organization);
    }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $sectors = $this->sectorRepository->pluck('name', 'id');
        return view('pages.organizations.edit', [
            'route_title' => 'Organization',
            'route_description' => 'Organization',
            'organization' => $organization,
            'sectors' => $sectors->toArray()
        ]);
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param  int              $id
     * @param UpdateOrganizationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrganizationRequest $request)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $organization = $this->organizationRepository->update($request->all(), $id);

        Flash::success('Organization updated successfully.');

        return redirect(route('organizations.index'));
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $this->organizationRepository->delete($id);

        Flash::success('Organization deleted successfully.');

        return redirect(route('organizations.index'));
    }
}
