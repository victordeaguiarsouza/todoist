<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Lists;
use App\Models\User;

class ShowLists extends Component
{
    public function render()
    {
        $user = User::find(Auth::user()->id);

        return view('livewire.show-lists', [
            'lists' => $user->lists
        ]);
    }
}
