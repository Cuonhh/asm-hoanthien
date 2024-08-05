<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Detail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $idPost;
    public $post;
    public $comment = '';
    public $postLQ;

    public function mount($slug) {
        $this->post = Post::where('slug', $slug)->first();

        $this->idPost = $this->post->id;
        $views = $this->post->views++;
        $this->postLQ = Post::where('category_id', $this->post->category_id)->limit(5)->get();


        $this->post->update(['views', $views]); 

    }

    protected function getComments($post_id) {
        return Comment::where('post_id' ,$post_id)->orderBy('created_at', 'desc')->paginate(10);
    }

    public function insertComment() {
        if($this->comment == '') return;
        Comment::create([
            'content' => $this->comment,
            'user_id' => Auth::user()->id,
            'level' => 0,
            'post_id' => $this->idPost,
            'parent_id'=>0,
        ]);
    }


    public function render()
    {
        $postNew = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $postView = Post::orderBy('views', 'desc')->limit(5)->get();

        $comments = $this->getComments($this->idPost);
        return view('livewire.pages.detail',[
            'post' => $this->post,
            'postNew'=>$postNew,
            'postView'=>$postView,
            'comments'=>$comments
        ])->layout('layouts/home-layout', ['title' => $this->post->title]);
    }
}
