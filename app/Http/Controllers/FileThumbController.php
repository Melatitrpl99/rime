<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileThumbRequest;
use App\Http\Requests\UpdateFileThumbRequest;
use App\Http\Controllers\Controller;
use App\Models\FileThumb;
use Illuminate\Http\Request;
use Flash;
use Response;

class FileThumbController extends Controller
{
    /**
     * Display a listing of the FileThumb.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var FileThumb $fileThumbs */
        $fileThumbs = FileThumb::paginate();

        return view('admin.file_thumbs.index')
            ->with('fileThumbs', $fileThumbs);
    }

    /**
     * Show the form for creating a new FileThumb.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.file_thumbs.create');
    }

    /**
     * Store a newly created FileThumb in storage.
     *
     * @param CreateFileThumbRequest $request
     *
     * @return Response
     */
    public function store(CreateFileThumbRequest $request)
    {
        $input = $request->all();

        /** @var FileThumb $fileThumb */
        $fileThumb = FileThumb::create($input);

        Flash::success('File Thumb saved successfully.');

        return redirect(route('admin.file_thumbs.index'));
    }

    /**
     * Display the specified FileThumb.
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
            Flash::error('File Thumb not found');

            return redirect(route('admin.file_thumbs.index'));
        }

        return view('admin.file_thumbs.show')->with('fileThumb', $fileThumb);
    }

    /**
     * Show the form for editing the specified FileThumb.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var FileThumb $fileThumb */
        $fileThumb = FileThumb::find($id);

        if (empty($fileThumb)) {
            Flash::error('File Thumb not found');

            return redirect(route('admin.file_thumbs.index'));
        }

        return view('admin.file_thumbs.edit')->with('fileThumb', $fileThumb);
    }

    /**
     * Update the specified FileThumb in storage.
     *
     * @param int $id
     * @param UpdateFileThumbRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFileThumbRequest $request)
    {
        /** @var FileThumb $fileThumb */
        $fileThumb = FileThumb::find($id);

        if (empty($fileThumb)) {
            Flash::error('File Thumb not found');

            return redirect(route('admin.file_thumbs.index'));
        }

        $fileThumb->fill($request->all());
        $fileThumb->save();

        Flash::success('File Thumb updated successfully.');

        return redirect(route('admin.file_thumbs.index'));
    }

    /**
     * Remove the specified FileThumb from storage.
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
            Flash::error('File Thumb not found');

            return redirect(route('admin.file_thumbs.index'));
        }

        $fileThumb->delete();

        Flash::success('File Thumb deleted successfully.');

        return redirect(route('admin.file_thumbs.index'));
    }
}
