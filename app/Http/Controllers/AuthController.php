<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
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
        return view("auth.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email"=> "required|email",
            "password"=> "required"
        ]);

        $credentials = $request->only("email","password");
        $remember = $request->filled("remember");

        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('/');
        }else{
            return redirect()->back()->withErrors(['error'=> 'Invalid credentials']);
        }
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('posts.index');
    }
}
