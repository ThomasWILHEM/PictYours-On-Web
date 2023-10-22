<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikeButton extends Component
{

    public $post;
    public $postId;
    public $fill = "none";

    // Permit to say if the next click on the button is to like or "unlike" the post
    public $nextClickIsLike = true;

    public function mount(){
        $this->post = Post::find($this->postId);
        if($this->post->likes->where("user_id", auth()->user()->id)->count() > 0){
            $this->fill = "black";
            $this->nextClickIsLike = false;
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

            if($this->nextClickIsLike){
                $this->post->likes()->create([
                    'user_id'=> auth()->user()->id,
                ]);

                $this->fill = 'black';
            }else{
                $this->post->likes()->where('user_id', auth()->user()->id)->delete();
                $this->fill = 'none';
            }
            $this->nextClickIsLike = !$this->nextClickIsLike;

            $this->dispatch('renderLikeCounter');
        } else {
            return redirect()->route('auth.create'); 
        }
    }
}
