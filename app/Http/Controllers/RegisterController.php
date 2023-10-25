<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("register.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "email" => 'required|unique:users,email,',
            "username" => 'required|string',
            "password" => 'required',
            'name'=> 'required',
            'image' => 'file'
        ]);

        $file = $request->file('image');
        if($file == null){
            $path = 'profiles/hds6ge2gs4d6ge2sd1v6es16g.jpg';
        }else{
            $path = $file->store('profiles', 'public');
        }

        $user = User::create([
            'email'=> $data['email'],
            'username'=> $data['username'],
            'password'=> $data['password'],
            'name'=> $data['name'],
            'image_path' => $path
        ]);

        auth()->login($user);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
