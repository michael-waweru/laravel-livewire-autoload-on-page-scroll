<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class LoadMoreUsers extends Component
{
    public $usersPerPage = 5;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function loadMore()
    {
       $this->usersPerPage = $this->usersPerPage + 5;
    }

    public function render()
    {
        $users = User::latest()->paginate($this->usersPerPage);
        $this->emit('userStore');

        return view('livewire.load-more-users',['users' => $users]);
    }
}
