<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\File;
use Illuminate\Http\Request;

/**
 * Class FileController.
 */
class FileController extends Controller
{
    /**
     * Display a listing of the File.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $files = File::paginate(15);

        return view('admin.files.index')
            ->with('files', $files);
    }

    /**
     * Show the form for creating a new File.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created File in storage.
     *
     * @param \App\Http\Requests\StoreFileRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreFileRequest $request)
    {
        File::create($request->validated());

        flash('File saved successfully.', 'success');

        return redirect()->route('admin.files.index');
    }

    /**
     * Display the specified File.
     *
     * @param \App\Models\File $file
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(File $file)
    {
        return view('admin.files.show')
            ->with('file', $file);
    }

    /**
     * Show the form for editing the specified File.
     *
     * @param \App\Models\File $file
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(File $file)
    {
        return view('admin.files.edit')
            ->with('file', $file);
    }

    /**
     * Update the specified File in storage.
     *
     * @param \App\Models\File $file
     * @param \App\Http\Requests\UpdateFileRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(File $file, UpdateFileRequest $request)
    {
        $file->update($request->validated());

        flash('File updated successfully.', 'success');

        return redirect()->route('admin.files.index');
    }

    /**
     * Remove the specified File from storage.
     *
     * @param \App\Models\File $file
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(File $file)
    {
        $file->delete();

        flash('File deleted successfully.', 'success');

        return redirect()->route('admin.files.index');
    }
}
