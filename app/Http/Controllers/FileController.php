<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

/**
 * Class FileController
 * @package App\Http\Controllers
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
     * @param \App\Http\Requests\CreateFileRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateFileRequest $request)
    {
        $file = File::create($request->validated());

        flash('File saved successfully.', 'success');

        return redirect()->route('admin.files.index');
    }

    /**
     * Display the specified File.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $file = File::find($id);

        if (empty($file)) {
            flash('File not found', 'error');

            return redirect()->route('admin.files.index');
        }

        return view('admin.files.show')
            ->with('file', $file);
    }

    /**
     * Show the form for editing the specified File.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $file = File::find($id);
        if (empty($file)) {
            flash('File not found', 'error');

            return redirect()->route('admin.files.index');
        }

        return view('admin.files.edit')
            ->with('file', $file);
    }

    /**
     * Update the specified File in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateFileRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateFileRequest $request)
    {
        $file = File::find($id);

        if (empty($file)) {
            flash('File not found', 'error');

            return redirect()->route('admin.files.index');
        }

        $file->update($request->validated());

        flash('File updated successfully.', 'success');

        return redirect()->route('admin.files.index');
    }

    /**
     * Remove the specified File from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);

        if (empty($file)) {
            flash('File not found', 'error');

            return redirect()->route('admin.files.index');
        }

        $file->delete();

        flash('File deleted successfully.', 'success');

        return redirect()->route('admin.files.index');
    }
}