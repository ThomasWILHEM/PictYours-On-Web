<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikeButton extends Component
{

    public $post;
    public $postId;
    public $fill = "none";

    public function mount(){
        $this->post = Post::find($this->postId);
        if($this->post->likes->where("user_id", auth()->user()->id)->count() > 0){
            $this->fill = "black";
        }else{
            $this->fill = "none";
        }
    }

    public function render()
    {
        return view('livewire.like-button');
    }

    public function setLike(){
        if (auth()->check()) {
            if($this->post->user_id == auth()->user()->id){
                abort(403);
            }

            $this->post->likes()->create([
                'user_id'=> auth()->user()->id,
            ]);

            $this->fill = 'black';

            $this->dispatch('renderLikeCounter');
        } else {
            return redirect()->route('auth.create'); 
        }
    }
}
