<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Account extends Component
{


    public function render()
    {
        return view('livewire.pages.account',[

        ])->layout('layouts/home-layout', ['title' => 'Quản trị tài khoản']);
    }
}
