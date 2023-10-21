<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{

    public $search = '';

    public function render()
    {
        $users = User::where('username','LIKE','%'. $this->search .'%')
            ->orWhere('name','LIKE','%'. $this->search .'%')
            ->get();
        return view('livewire.user-list', ['users'=> $users]);
    }
}
