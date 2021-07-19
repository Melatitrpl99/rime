<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
        $users = User::paginate();

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
     * @param \App\Http\Requests\CreateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
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
     * @param int $id
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            flash('User not found', 'error');

            return redirect()->route('admin.users.index');
        }

        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            flash('User not found', 'error');

            return redirect()->route('admin.users.index');
        }

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param \App\Http\Requests\UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = User::find($id);

        if (empty($user)) {
            flash('User not found', 'error');

            return redirect()->route('admin.users.index');
        }

        $input = $request->validated();
        $input['password'] = (!empty($input['password'])
            ? bcrypt($input['password'])
            : unset($input['password']);

        $user->update($input);

        flash('User updated successfully', 'success');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            flash('User not found', 'error');

            return redirect()->route('admin.users.index');
        }

        $user->delete();

        flash('User deleted successfully', 'success');

        return redirect()->route('admin.users.index');
    }
}
