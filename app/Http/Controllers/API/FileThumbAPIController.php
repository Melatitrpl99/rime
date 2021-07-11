<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFileThumbAPIRequest;
use App\Http\Requests\API\UpdateFileThumbAPIRequest;
use App\Models\FileThumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileThumbResource;
use Response;

/**
 * Class FileThumbController
 * @package App\Http\Controllers\API
 */

class FileThumbAPIController extends Controller
{
    /**
     * Display a listing of the FileThumb.
     * GET|HEAD /file_thumbs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = FileThumb::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $fileThumbs = $query->get();

        return response()->json(FileThumbResource::collection($fileThumbs));
    }

    /**
     * Store a newly created FileThumb in storage.
     * POST /file_thumbs
     *
     * @param CreateFileThumbAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFileThumbAPIRequest $request)
    {
        $input = $request->all();

        /** @var FileThumb $fileThumb */
        $fileThumb = FileThumb::create($input);

        return response()->json(new FileThumbResource($fileThumb));
    }

    /**
     * Display the specified FileThumb.
     * GET|HEAD /file_thumbs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FileThumb $fileThumb */
        $fileThumb = FileThumb::find($id);

        if (empty($fileThumb)) {
            return $this->sendError('File Thumb not found');
        }

        return response()->json(new FileThumbResource($fileThumb));
    }

    /**
     * Update the specified FileThumb in storage.
     * PUT/PATCH /file_thumbs/{id}
     *
     * @param int $id
     * @param UpdateFileThumbAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFileThumbAPIRequest $request)
    {
        /** @var FileThumb $fileThumb */
        $fileThumb = FileThumb::find($id);

        if (empty($fileThumb)) {
            return $this->sendError('File Thumb not found');
        }

        $fileThumb->fill($request->all());
        $fileThumb->save();

        return response()->json(new FileThumbResource($fileThumb));
    }

    /**
     * Remove the specified FileThumb from storage.
     * DELETE /file_thumbs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FileThumb $fileThumb */
        $fileThumb = FileThumb::find($id);

        if (empty($fileThumb)) {
            return $this->sendError('File Thumb not found');
        }

        $fileThumb->delete();

        return response()->json('File Thumb deleted successfully');
    }
}
