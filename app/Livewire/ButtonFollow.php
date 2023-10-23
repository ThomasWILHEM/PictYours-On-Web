<?php

namespace App\Livewire;

use App\Models\Follow;
use App\Models\User;
use Livewire\Component;

class ButtonFollow extends Component
{

    public $text = "Follow";

    public $userId;

    public $nextClickIsFollow = true;

    public function mount(){
        if(Follow::where("following_user_id", auth()->user()->id)
                    ->where("followed_user_id", $this->userId)
                    ->count() > 0){
            $this->text = "Unfollow";
            $this->nextClickIsFollow = false;
        }
    }

    public function render()
    {
        return view('livewire.button-follow');
    }

    public function setFollow(){
        if(auth()->check()){
            if($this->nextClickIsFollow){
                auth()->user()->followings()->attach($this->userId);
                $this->text = "Unfollow";
            }else{
                auth()->user()->followings()->detach($this->userId);
                $this->text = "Follow";
            }

            $this->nextClickIsFollow = !$this->nextClickIsFollow;
            $this->dispatch('renderFollowers');
        }else{
            return redirect()->route('login');
        }
    }
}
