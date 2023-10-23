<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowingsPostController extends Controller
{
    public function index(Request $request){
        $usersYouFollow = auth()->user()->followings;
        $postsOfFollowing = [];


        foreach ($usersYouFollow as $user) {
            foreach($user->posts as $post) {
                $postsOfFollowing[] = $post;
            }
        }

        $postsOfFollowing = collect($postsOfFollowing)->sortBy("created_at", descending:true)->all();


        return view("followingsPost.index", [
            'postsOfFollowing' => $postsOfFollowing
        ]);
    }
}
