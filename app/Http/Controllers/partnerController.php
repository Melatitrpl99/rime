<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Repositories\PartnerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PartnerController extends AppBaseController
{
    /** @var  PartnerRepository */
    private $partnerRepository;

    public function __construct(PartnerRepository $partnerRepo)
    {
        $this->partnerRepository = $partnerRepo;
    }

    /**
     * Display a listing of the Partner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $partners = $this->partnerRepository->all();

        return view('admin.partners.index')
            ->with('partners', $partners);
    }

    /**
     * Show the form for creating a new Partner.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created Partner in storage.
     *
     * @param CreatePartnerRequest $request
     *
     * @return Response
     */
    public function store(CreatePartnerRequest $request)
    {
        $input = $request->all();

        $partner = $this->partnerRepository->create($input);

        Flash::success('Partner saved successfully.');

        return redirect(route('admin.partners.index'));
    }

    /**
     * Display the specified Partner.
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

            return redirect(route('admin.partners.index'));
        }

        return view('admin.partners.show')->with('partner', $partner);
    }

    /**
     * Show the form for editing the specified Partner.
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

            return redirect(route('admin.partners.index'));
        }

        return view('admin.partners.edit')->with('partner', $partner);
    }

    /**
     * Update the specified Partner in storage.
     *
     * @param int $id
     * @param UpdatePartnerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartnerRequest $request)
    {
        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            Flash::error('Partner not found');

            return redirect(route('admin.partners.index'));
        }

        $partner = $this->partnerRepository->update($request->all(), $id);

        Flash::success('Partner updated successfully.');

        return redirect(route('admin.partners.index'));
    }

    /**
     * Remove the specified Partner from storage.
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

            return redirect(route('admin.partners.index'));
        }

        $this->partnerRepository->delete($id);

        Flash::success('Partner deleted successfully.');

        return redirect(route('admin.partners.index'));
    }
}
