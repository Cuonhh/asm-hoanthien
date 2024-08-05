<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Livewire\WithFileUploads;

class CreateNews extends Component
{
    use WithFileUploads;

    public $category;
    public $post;
    public $a;
    public $title, $slug, $short_description, $content, $hot_post, $category_id, $file;
    protected $rules = [
        'title' => 'required|min:6|unique:posts',
        'slug' => 'required|min:6',
        'short_description' => 'required|min:10|max:255',
        'content' => 'required|min:10',
        'category_id' => 'required',
        'file' => 'image'
    ];


    public function mount() {
        $this->category = new Category();
        $this->post = new Post();
        $this->a = "1";
    }


    public function submitForm() {
        $this->validate();
        $this->a = "hello";
    }

    public function render()
    {
        return view('livewire.news.create-news',[
            'categories' => $this->category->all()
        ]);
    }
}
