<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //return view('user.settings', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(!Auth::check()){
            abort(403);
        }
        Gate::authorize('view', $user);
        return view('user.settings', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('view', $user);
        if($request->user()->cannot('update', $user)){
            abort(403);
        }
        Storage::delete('public/img/avatars/'.$user->avatar);

        $imageName =$request->input('name'). '-' . $request->input('nickname') . '-' . time() . '.' .$request-> file_input -> extension();
        $request-> file_input -> move(public_path('storage/img/avatars/'), $imageName);



        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = csrf_token();

        $user->avatar = $imageName;
        $user->updated_at = now();



        $user->save();

        return redirect()->route('user.settings', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
