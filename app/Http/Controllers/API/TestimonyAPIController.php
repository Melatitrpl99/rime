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

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->has('product_id')) {
            $testimonies = $query->where('product_id', $request->get('product_id'))->get();

            return response()->json(TestimonyResource::collection($testimonies), 200);
        }

        $testimonies = $query->where('user_id', auth()->id())->get();

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
        return $testimony->user_id == auth()->id()
            ? response()->json(new TestimonyResource($testimony), 200)
            : response()->json(['message' => 'Not allowed'], 403);
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
        if ($testimony->user_id != auth()->id())
            return response()->json(['message' => 'Not allowed'], 403);

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
        if ($testimony->user_id != auth()->id())
            return response()->json(['message' => 'Not allowed'], 403);

        $testimony->delete();

        return response()->json(null, 204);
    }
}
