<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'max:100'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:20'],
            'role'     => ['required', 'numeric', 'min:0', 'max:2'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

//        User::create($request->only(['name', 'email', 'password', 'role']));

        return redirect()
                ->route('admin.users.index')
                ->with('success', 'User has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => ['required', 'max:100'],
            'email'    => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'min:6', 'max:20'],
            'role'     => ['required', 'numeric', 'min:0', 'max:2'],
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password))
            $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

//        $user->update($request->only(['name', 'email', 'password', 'role']));

        return redirect()
                ->route('admin.users.index')
                ->with('success', 'User information has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if($user->id == auth()->user()->id)
            return redirect()
                    ->back()
                ->with('error', 'You cannot delete yourself!');

        if($user->role != 0)
            return redirect()
                ->back()
                ->with('error', 'You cannot delete Admin or Seller! Please change their role to User before deleting!');

        $user->delete();

        return redirect()
                ->route('admin.users.index')
                ->with('success', 'User has been deleted successfully!');
    }
}
