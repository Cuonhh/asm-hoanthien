<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Faker\Core\Number;

class ListUser extends Component
{
    use WithPagination;
    public $user;
    public $search = '';
    public $pageNumber = 5;
    public $type = 'page';
    public $role = [];


    public function mount() {
        $this->user = new User();

        $users = $this->user->get();

        foreach($users as $user){
            $this->role[$user->id] = $user->role;
        }
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected function getUser($typeUser = 'page') {
        switch ($typeUser) {
            case 'page':

                return $this->user->where('name', 'like','%'.$this->search.'%')->orderBy('created_at', 'desc')->paginate($this->pageNumber);
            break;
            
            default:
                return $this->user->where('name', 'like','%'.$this->search.'%')->orderBy('created_at', 'desc')->paginate($this->pageNumber);
            break;
        }
    }
    public function handleOnChangeRole($id) {
        $user = User::find($id);

        $user->role = $this->role[$id];
        $user->save();
        $users = $this->user->get();

        foreach($users as $user){
            $this->role[$user->id] = $user->role;
        }
        // dd($this->role[$id]);
    }

    public function render()
    {
        return view('livewire.user.list-user',[
            'users' => $this->getUser($this->type)
        ]);
    }
}
