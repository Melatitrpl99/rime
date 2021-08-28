<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $users = User::with('roles:id,name')->paginate(15);

        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param \App\Http\Requests\StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        flash('User saved successfully', 'success');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified User.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Facades\View
     */
    public function show(User $user)
    {
        return view('admin.users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Facades\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param \App\Models\User $user
     * @param \App\Http\Requests\UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $input = $request->validated();
        $input['password'] = (!empty($input['password']))
            ? bcrypt($input['password'])
            : null;

        $user->update($input);

        flash('User updated successfully', 'success');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash('User deleted successfully', 'success');

        return redirect()->route('admin.users.index');
    }
}
