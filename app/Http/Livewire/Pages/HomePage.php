<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount() {

    }

    public function render()
    {
        $postNew = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $postView = Post::orderBy('views', 'desc')->limit(5)->get();
        $postDB = Post::where("hot_post" , 0)->get();

        return view('livewire.pages.home-page',
        [
            'postNew'=>$postNew,
            'postView'=>$postView,
            'hostPosts'=>$postDB,
            'title' => 'Trang chủ',
            'posts' => Post::orderBy('created_at', 'desc')->paginate(10)
        ])->layout('layouts/home-layout');
    }
}
