<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepartnerRequest;
use App\Http\Requests\UpdatepartnerRequest;
use App\Repositories\partnerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class partnerController extends AppBaseController
{
    /** @var  partnerRepository */
    private $partnerRepository;

    public function __construct(partnerRepository $partnerRepo)
    {
        $this->partnerRepository = $partnerRepo;
    }

    /**
     * Display a listing of the partner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $partners = $this->partnerRepository->all();

        return view('partners.index')
            ->with('partners', $partners);
    }

    /**
     * Show the form for creating a new partner.
     *
     * @return Response
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created partner in storage.
     *
     * @param CreatepartnerRequest $request
     *
     * @return Response
     */
    public function store(CreatepartnerRequest $request)
    {
        $input = $request->all();

        $partner = $this->partnerRepository->create($input);

        Flash::success('Partner saved successfully.');

        return redirect(route('partners.index'));
    }

    /**
     * Display the specified partner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        return view('partners.show')->with('partner', $partner);
    }

    /**
     * Show the form for editing the specified partner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        return view('partners.edit')->with('partner', $partner);
    }

    /**
     * Update the specified partner in storage.
     *
     * @param int $id
     * @param UpdatepartnerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepartnerRequest $request)
    {
        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        $partner = $this->partnerRepository->update($request->all(), $id);

        Flash::success('Partner updated successfully.');

        return redirect(route('partners.index'));
    }

    /**
     * Remove the specified partner from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        $this->partnerRepository->delete($id);

        Flash::success('Partner deleted successfully.');

        return redirect(route('partners.index'));
    }
}
