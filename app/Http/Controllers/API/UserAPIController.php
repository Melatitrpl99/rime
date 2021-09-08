<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Http\Resources\UserResource;

class UserAPIController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response()->success(new UserResource(auth()->user()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\API\UpdateUserAPIRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserAPIRequest $request)
    {
        //
    }
}
