<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware("auth")
            ->only(["create", "store", "destroy"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        
        return view("posts.index", [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'string|required',
            'image' => 'file|required'
        ]);

        $file = $request->file('image');
        $path = $file->store('images', 'public');

        Post::create([
            'description' => $data['description'],
            'user_id' => auth()->user()->id,
            'image_path' => $path
        ]);

        return redirect()->route('users.show', auth()->user())
            ->with('success', 'Post published with success !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(auth()->user()->id == $post->user_id){
            $post->delete();

            return redirect()->route('users.show', auth()->user())->with('success','Post deleted successfuly !');
        }else{
            abort(403);
        }
    }
}
