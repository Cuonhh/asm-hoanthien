<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;

class CatePage extends Component
{
    public $slug;
    public $posts = [];

    public function mount($slug) {
        $this->slug = $slug;     
    }

    public function render()
    {
        $category_id = Category::where('slug', $this->slug)->value('id');
        $this->posts = Post::where('category_id', $category_id)->get();

        $postNew = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $postView = Post::orderBy('views', 'desc')->limit(5)->get();

        $cateHotPost = Post::where('category_id', $category_id)->inRandomOrder()->first();
        $cateHotPosts = Post::where('category_id', $category_id)->inRandomOrder()->limit(4)->get();
        // dd($postss);
        return view('livewire.pages.cate-page',[
            'postNew'=>$postNew,
            'postView'=>$postView,
            'postdb'=> $cateHotPost,
            'posts' => $this->posts,
            'postdbs' => $cateHotPosts
        ])->layout('layouts/home-layout', ['title' => 'Danh mục tin tức']);
    }
}
