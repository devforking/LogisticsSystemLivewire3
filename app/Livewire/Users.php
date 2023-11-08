<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;
    public function render()
    {
        $users = User::all();

        return view('livewire.users', compact('users'));
    }
}
