<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class ListNews extends Component
{
    use WithPagination;
    public $post;
    public $search = '';
    public $pageNumber = 5;
    public $type;
    public $action = 0;
    public $listDelete = [];

    public function mount() {
        $this->post = new Post();
    }

    public function setType($name) {
        $this->type = $name;
        // $this->updated();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function submitAction() {
        if ($this->action === 0)  return false;
        switch($this->action) {
            case 'delete':
                if(count($this->listDelete) === 0) return false;
                for($i = 0; $i < count($this->listDelete); $i++){
                    Post::where('id', $this->listDelete[$i])->delete();
                }
                $this->resetPage();
            break;
            case 'hot_post': 
                $this->type = 'hot_post';
                // dd($this->post->where('hot_post', 0)->paginate($this->pageNumber));
                break;
        }
    }

    public function getPost($typePost = null) {
        if($typePost && $this->search == '' && $typePost != 'hot_post' ) {
            return $this->post->orderBy($typePost, 'desc')->paginate($this->pageNumber);
        }else if($typePost == 'hot_post'){
            return $this->post->where('hot_post', '=' , 0)->paginate($this->pageNumber);
        }
        else{
            return $this->post->where('title', 'like','%'.$this->search.'%')->orderBy('created_at', 'desc')->paginate($this->pageNumber);
        }
    }

    

    public function render()
    {
        return view('livewire.news.list-news', [
            'posts' => $this->getPost($this->type)
        ]);
    }
}
