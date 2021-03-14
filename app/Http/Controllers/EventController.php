<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Repositories\EventRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EventController extends AppBaseController
{
    /** @var  EventRepository */
    private $eventRepository;

    public function __construct(EventRepository $eventRepo)
    {
        $this->eventRepository = $eventRepo;
    }

    /**
     * Display a listing of the Event.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $events = $this->eventRepository->all();

        return view('admin.events.index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new Event.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created Event in storage.
     *
     * @param CreateEventRequest $request
     *
     * @return Response
     */
    public function store(CreateEventRequest $request)
    {
        $input = $request->all();

        $event = $this->eventRepository->create($input);

        Flash::success('Event saved successfully.');

        return redirect(route('admin.events.index'));
    }

    /**
     * Display the specified Event.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('admin.events.index'));
        }

        return view('admin.events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified Event.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('admin.events.index'));
        }

        return view('admin.events.edit')->with('event', $event);
    }

    /**
     * Update the specified Event in storage.
     *
     * @param int $id
     * @param UpdateEventRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventRequest $request)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('admin.events.index'));
        }

        $event = $this->eventRepository->update($request->all(), $id);

        Flash::success('Event updated successfully.');

        return redirect(route('admin.events.index'));
    }

    /**
     * Remove the specified Event from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('admin.events.index'));
        }

        $this->eventRepository->delete($id);

        Flash::success('Event deleted successfully.');

        return redirect(route('admin.events.index'));
    }
}
