<?php

namespace App\Http\Livewire\Components;

use App\Models\Comment as ModelsComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $comment = '';
    public $idPost;
    public $commentlevel = '';
    public $limit = 2;
    public $checkComment = [];
    public $checkNewComment = false;

    public function mount($idPost) {
        $this->idPost = $idPost;

        $comments = $this->getComments($this->idPost);

        foreach($comments as $item){
            $check = [
                'id' => $item->id,
                'displayFull' => false
            ];
            array_push($this->checkComment, $check);
        }

        
    }

    protected function getComments() {
        return ModelsComment::where([['post_id' ,'=', $this->idPost], ['level' ,'=', 0]])
            ->orderBy('created_at', 'desc')->paginate(10);
    }

    public function insertComment() {
        if($this->comment == '') return;
        $comment = ModelsComment::create([
            'content' => $this->comment,
            'user_id' => Auth::user()->id,
            'level' => 0,
            'post_id' => $this->idPost,
            'parent_id'=>0,
        ]);

        $this->comment = '';
        $check = [
            'id' => $comment->id,
            'displayFull' => false
        ];
        array_push($this->checkComment, $check);

        // $this->render();
        $this->checkNewComment = true;
    }

    public function insertCommentLevel($id) {
        if($this->commentlevel == '') return;
        ModelsComment::create([
            'content' => $this->commentlevel,
            'user_id' => Auth::user()->id,
            'level' => 1,
            'post_id' => $this->idPost,
            'parent_id'=>$id,
        ]);
        $this->commentlevel = '';
        // dd($id);
    }

    public function getallComment($id) {
        $this->checkComment[$id]['displayFull'] = true;
    }

    public function render()
    {
        // echo "<script>alert('heelo')</script>";
        $comments = $this->getComments();

        // dd($comments[0]->children);

        return view('livewire.components.comment', [
            'comments'=>$comments
        ]);
    }
}
