<?php

namespace App\Livewire;

use App\Models\Follow;
use Livewire\Component;

class FollowerCounter extends Component
{

    public $followerCount;

    public function mount(int $userId){
        $this->followerCount = Follow::where("followed_user_id", $userId)->count();
    }

    public function render()
    {
        return view('livewire.follower-counter');
    }
}
