<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class ListCategory extends Component
{
    use WithPagination;
    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.category.list-category', [
            'categories' => Category::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ])->layout('layouts.app');
    }
}
