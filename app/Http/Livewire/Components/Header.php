<?php

namespace App\Http\Livewire\Components;

use App\Models\Additional_info;
use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class Header extends Component
{
    public $search = '';
    public $logo;

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function mount() {
        $this->logo = Additional_info::where('title', 'logo')->value('content');
    }



    public function render()
    {
        $data = [];

        if($this->search != '') {
            $data = Post::where('title', 'like', '%'.$this->search.'%')->limit(5)->get();
        }

        $categories = Category::orderBy('id', 'asc')->limit(7)->get();

        return view('livewire.components.header',[
            'searchdata' => $data,
            'categories' => $categories
        ]);
    }
}
