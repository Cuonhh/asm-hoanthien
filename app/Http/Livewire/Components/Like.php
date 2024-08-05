<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Like as LikeModel;
use App\Models\Like_action;
use Illuminate\Support\Facades\DB;

class Like extends Component
{
    public $idPost;
    public $listLike;
    public $checkLike;
    public $likeActionList = [];
    public $likeActionCount;

    public function mount($idPost) {
        $this->idPost = $idPost;
        $this->listLike = LikeModel::all();
        $this->checkLike = $this->getCheckLike();
        $this->likeActionList = $this->getLikeActionList();
        $this->likeActionCount = $this->getLikeActionCount();
    }

    private function getLikeActionList() {
        return DB::select("SELECT l.name, l.icon, COUNT(l.id) as countLike FROM likes l LEFT JOIN like_actions la ON la.like_id = l.id WHERE la.post_id = {$this->idPost} GROUP BY l.id");
    }

    private function getLikeActionCount() {
        return Like_action::where('post_id', $this->idPost)->count();
    }

    public function add_like($id) {
        if(!$this->checkLike) {
            Like_action::create([
                'like_id' => $id,
                'post_id' => $this->idPost,
                'user_id' => auth()->user()->id
            ]);
            $this->checkLike = $this->getCheckLike();
            $this->likeActionCount = $this->getLikeActionCount();
            $this->likeActionList = $this->getLikeActionList();
        }elseif($this->checkLike && $id != $this->checkLike->like_id) {
            $likeAction = $this->getCheckLike();

            $likeAction->update([
                'like_id' => $id,
            ]);
            $this->checkLike = $this->getCheckLike();  
            $this->likeActionCount = $this->getLikeActionCount();
            $this->likeActionList = $this->getLikeActionList();
        }else{
            $this->likeActionList = $this->getLikeActionList();
        }
    }

    private function getCheckLike(){
        return Like_action::where([
            ['post_id', '=', $this->idPost],
            ['user_id', '=', auth()->user()->id]
        ])->first();
    }

    public function render()
    {


        return view('livewire.components.like');
    }
}
