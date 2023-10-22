<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(){
        return view('like.index', [
            'likedPosts' => auth()->user()->postLiked,
        ]);
    }
}
