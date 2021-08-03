<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTestimonyAPIRequest;
use App\Http\Requests\API\UpdateTestimonyAPIRequest;
use App\Http\Resources\TestimonyResource;
use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;

/**
 * Class TestimonyAPIController
 * @package App\Http\Controllers\API
 */
class TestimonyAPIController extends Controller
{
    /**
     * Display a listing of the Testimony.
     * GET|HEAD /testimonies
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Testimony::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $testimonies = $query->get();

        return response()->json(TestimonyResource::collection($testimonies), 200);
    }

    /**
     * Store a newly created Testimony in storage.
     * POST /testimonies
     *
     * @param \App\Http\Requests\CreateTestimonyRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateTestimonyAPIRequest $request)
    {
        $testimony = Testimony::create($request->validated());

        return response()->json(new TestimonyResource($testimony), 201);
    }

    /**
     * Display the specified Testimony.
     * GET|HEAD /testimonies/{testimony}
     *
     * @param \App\Models\Testimony $testimony
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Testimony $testimony)
    {
        return response()->json(new TestimonyResource($testimony), 200);
    }

    /**
     * Update the specified Testimony in storage.
     * PUT/PATCH /testimonies/{testimony}
     *
     * @param \App\Models\Testimony $testimony
     * @param \App\Http\Requests\UpdateTestimonyRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Testimony $testimony, UpdateTestimonyAPIRequest $request)
    {
        $testimony->update($request->validated());

        return response()->json(new TestimonyResource($testimony), 200);
    }

    /**
     * Remove the specified Testimony from storage.
     * DELETE /testimonies/{testimony}
     *
     * @param \App\Models\Testimony $testimony
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Testimony $testimony)
    {
        $testimony->delete();

        return response()->json(null, 204);
    }
}
