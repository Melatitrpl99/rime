<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilepondController extends Controller
{
    public function store(Request $request)
    {
        \Debugbar::disable();
        if ($request->has('path')) {
            $file = $request->file('path');

            while (is_array($file)) {
                $file = isset($file[0]) ? $file[0] : null;
            }

            $fn = $file->store('temp');

            return response($fn, 200, ['Content-Type' => 'text/plain']);
        }
        return null;
    }

    public function destroy()
    {

    }
}
