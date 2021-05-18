<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Flash;
use Response;

class FileController extends Controller
{
    /**
     * Display a listing of the File.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var File $files */
        $files = File::all();

        return view('admin.files.index')
            ->with('files', $files);
    }

    /**
     * Show the form for creating a new File.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created File in storage.
     *
     * @param CreateFileRequest $request
     *
     * @return Response
     */
    public function store(CreateFileRequest $request)
    {
        $input = $request->all();

        /** @var File $file */
        $file = File::create($input);

        Flash::success('File saved successfully.');

        return redirect(route('admin.files.index'));
    }

    /**
     * Display the specified File.
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
            Flash::error('File not found');

            return redirect(route('admin.files.index'));
        }

        return view('admin.files.show')->with('file', $file);
    }

    /**
     * Show the form for editing the specified File.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var File $file */
        $file = File::find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('admin.files.index'));
        }

        return view('admin.files.edit')->with('file', $file);
    }

    /**
     * Update the specified File in storage.
     *
     * @param int $id
     * @param UpdateFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFileRequest $request)
    {
        /** @var File $file */
        $file = File::find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('admin.files.index'));
        }

        $file->fill($request->all());
        $file->save();

        Flash::success('File updated successfully.');

        return redirect(route('admin.files.index'));
    }

    /**
     * Remove the specified File from storage.
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
            Flash::error('File not found');

            return redirect(route('admin.files.index'));
        }

        $file->delete();

        Flash::success('File deleted successfully.');

        return redirect(route('admin.files.index'));
    }
}
