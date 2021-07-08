<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventAPIRequest;
use App\Http\Requests\API\UpdateEventAPIRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use Response;

/**
 * Class EventController
 * @package App\Http\Controllers\API
 */

class EventAPIController extends Controller
{
    /**
     * Display a listing of the Event.
     * GET|HEAD /events
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $events = $query->get();

        return response()->json(EventResource::collection($events));
    }

    /**
     * Store a newly created Event in storage.
     * POST /events
     *
     * @param CreateEventAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventAPIRequest $request)
    {
        $input = $request->all();

        /** @var Event $event */
        $event = Event::create($input);

        return response()->json(new EventResource($event));
    }

    /**
     * Display the specified Event.
     * GET|HEAD /events/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            return $this->sendError('Event not found');
        }

        return response()->json($event);
    }

    /**
     * Update the specified Event in storage.
     * PUT/PATCH /events/{id}
     *
     * @param int $id
     * @param UpdateEventAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventAPIRequest $request)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            return $this->sendError('Event not found');
        }

        $event->fill($request->all());
        $event->save();

        return response()->json(new EventResource($event));
    }

    /**
     * Remove the specified Event from storage.
     * DELETE /events/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            return $this->sendError('Event not found');
        }

        $event->delete();

        return response()->json('Event deleted successfully');
    }
}
