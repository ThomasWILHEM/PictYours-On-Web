<?php

namespace App\Livewire;

use App\Models\Follow;
use Livewire\Component;

class FollowerCounter extends Component
{

    protected $listeners = ["renderFollowers" => "render"];

    public $followerCount;
    public $userId;

    public function render()
    {
        $this->followerCount = Follow::where("followed_user_id", $this->userId)->count();
        return view('livewire.follower-counter');
    }
}
