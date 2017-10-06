<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use App\Repositories\SectorRepository;
use App\Http\Controllers\SecureController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SectorController extends SecureController
{
    /** @var  SectorRepository */
    private $sectorRepository;

    public function __construct(SectorRepository $sectorRepo)
    {
        $this->sectorRepository = $sectorRepo;
    }

    /**
     * Display a listing of the Sector.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sectorRepository->pushCriteria(new RequestCriteria($request));
        $sectors = $this->sectorRepository->all();

        return view('pages.sectors.index', [
            'route_title' => 'Sector',
            'route_description' => 'Sector',
            'sectors' => $sectors
        ]);
    }

    /**
     * Show the form for creating a new Sector.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.sectors.create',[
            'route_title' => 'Sector',
            'route_description' => 'Sector'
        ]);
    }

    /**
     * Store a newly created Sector in storage.
     *
     * @param CreateSectorRequest $request
     *
     * @return Response
     */
    public function store(CreateSectorRequest $request)
    {
        $input = $request->all();

        $sector = $this->sectorRepository->create($input);

        Flash::success('Sector saved successfully.');

        return redirect(route('sectors.index'));
    }

    /**
     * Display the specified Sector.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sector = $this->sectorRepository->findWithoutFail($id);

        if (empty($sector)) {
            Flash::error('Sector not found');

            return redirect(route('sectors.index'));
        }

        return view('pages.sectors.show')->with('sector', $sector);
    }

    /**
     * Show the form for editing the specified Sector.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sector = $this->sectorRepository->findWithoutFail($id);

        if (empty($sector)) {
            Flash::error('Sector not found');

            return redirect(route('sectors.index'));
        }

        return view('pages.sectors.edit',[
            'route_title' => 'Sector',
            'route_description' => 'Sector',
            'sector' => $sector
        ]);
    }

    /**
     * Update the specified Sector in storage.
     *
     * @param  int              $id
     * @param UpdateSectorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSectorRequest $request)
    {
        $sector = $this->sectorRepository->findWithoutFail($id);

        if (empty($sector)) {
            Flash::error('Sector not found');

            return redirect(route('sectors.index'));
        }

        $sector = $this->sectorRepository->update($request->all(), $id);

        Flash::success('Sector updated successfully.');

        return redirect(route('sectors.index'));
    }

    /**
     * Remove the specified Sector from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sector = $this->sectorRepository->findWithoutFail($id);

        if (empty($sector)) {
            Flash::error('Sector not found');

            return redirect(route('sectors.index'));
        }

        $this->sectorRepository->delete($id);

        Flash::success('Sector deleted successfully.');

        return redirect(route('sectors.index'));
    }
}
