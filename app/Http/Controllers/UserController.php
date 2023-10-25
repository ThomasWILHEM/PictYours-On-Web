<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware("auth")
            ->only(["edit", "update"]);
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("users.show", ["user"=> $user->load('posts')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(auth()->user()->id != $user->id){
            abort(403);
        }

        return view('users.edit', ['user'=> auth()->user()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if(auth()->user()->id != $user->id){
            abort(403);
        }

        $data = $request->validate([
            'name' => 'string',
            'username' => 'string',
            'image' => 'sometimes|file'
        ]);

        $user->name = $data['name'];
        $user->username = $data['username'];

        $file = $request->file('image');
        if($file != null){
            $path = $file->store('profiles', 'public');
            $user->image_path = $path;
        }

        $user->save();

        return redirect()->route('users.show', auth()->user())
            ->with('success', 'Your profile has been modified successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
