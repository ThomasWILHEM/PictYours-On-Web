<?php

namespace App\Livewire;

use App\Models\Like;
use Livewire\Component;

class LikeCounter extends Component
{

    public $counter;
    public $postId;

    protected $listeners = ['renderLikeCounter' => 'render'];

    public function render()
    {
        $this->counter = Like::where('post_id', $this->postId)->count();
        return view('livewire.like-counter');
    }
}
