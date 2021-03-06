<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\CreateOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Repositories\OrganizationRepository;
use App\Repositories\SectorRepository;
use App\Http\Controllers\SecureController;
use Illuminate\Http\Request;
use App\Models\Media;
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
        parent::__construct();
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
        //ensure organization user type
        $search = $request->get(config('repository.criteria.params.search', 'search'), '');
        $search = is_set($search) ? $search.';type:'.User::TYPE_ORGANIZATION : 'type:'.User::TYPE_ORGANIZATION;
         $request->merge(['search'=>$search]);

        $this->organizationRepository->pushCriteria(new RequestCriteria($request));
        $organizations = $this->organizationRepository->paginate(config('app.defaults.pageSize'));

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
            'organization' => new User(),
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
        //ensure default values
        $request->merge([
            'verified' => true,
            'type' => User::TYPE_ORGANIZATION,
            'password' => $request->input('password', config('auth.defaults.password')),
            'password_confirmation' => $request->input('password_confirmation', config('auth.defaults.password')),
        ]);

        $input = $request->all();

        //encrypt password before save
        if (array_has($input, 'password')) {
            $input['password'] = bcrypt($input['password']);
        }

        $organization = $this->organizationRepository->create($input);

        //upload & store organization avatar(logo)
        if ($organization && $request->hasFile('avatar')) {
            //clear existing avatar
            $organization->clearMediaCollection('avatars');
            //attach new avatar
            $organization->addMediaFromRequest('avatar')
                ->toMediaCollection('avatars');
        }

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

        return view('pages.organizations.show', [
            'route_title' => 'Organization',
            'route_description' => 'Organization',
            'organization' => $organization,
            'instance' => $organization
        ]);
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
            'sectors' => $sectors->toArray(),
            'instance' => $organization
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

        //enforce user type
        $request->merge([
            'type' => User::TYPE_ORGANIZATION
        ]);

        $organization = $this->organizationRepository->update($request->all(), $id);

        //upload & store organization avatar(logo)
        if ($organization && $request->hasFile('avatar')) {
            //clear existing avatar
            $organization->clearMediaCollection('avatars');
            //attach new avatar
            $organization->addMediaFromRequest('avatar')
                ->toMediaCollection('avatars');
        }

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
