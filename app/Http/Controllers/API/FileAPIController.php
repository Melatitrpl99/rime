<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFileAPIRequest;
use App\Http\Requests\API\UpdateFileAPIRequest;
use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileResource;
use Response;

/**
 * Class FileController
 * @package App\Http\Controllers\API
 */

class FileAPIController extends Controller
{
    /**
     * Display a listing of the File.
     * GET|HEAD /files
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = File::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $files = $query->get();

        return response()->json(FileResource::collection($files));
    }

    /**
     * Store a newly created File in storage.
     * POST /files
     *
     * @param CreateFileAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFileAPIRequest $request)
    {
        $input = $request->all();

        /** @var File $file */
        $file = File::create($input);

        return response()->json(new FileResource($file));
    }

    /**
     * Display the specified File.
     * GET|HEAD /files/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var File $file */
        $file = File::find($id);

        if (empty($file)) {
            return $this->sendError('File not found');
        }

        return response()->json(new FileResource($file));
    }

    /**
     * Update the specified File in storage.
     * PUT/PATCH /files/{id}
     *
     * @param int $id
     * @param UpdateFileAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFileAPIRequest $request)
    {
        /** @var File $file */
        $file = File::find($id);

        if (empty($file)) {
            return $this->sendError('File not found');
        }

        $file->fill($request->all());
        $file->save();

        return response()->json(new FileResource($file));
    }

    /**
     * Remove the specified File from storage.
     * DELETE /files/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var File $file */
        $file = File::find($id);

        if (empty($file)) {
            return $this->sendError('File not found');
        }

        $file->delete();

        return response()->json('File deleted successfully');
    }
}
