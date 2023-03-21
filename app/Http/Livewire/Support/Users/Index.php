<?php

namespace App\Http\Livewire\Support\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = false;

    public function loadUser()
    {
        $this->readyToLoad = true;
    }


    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->dispatchBrowserEvent('toastr:success', ['message' => 'کاربر مورد نظر با موفقیت حذف شد']);
    }
    public function render()
    {
        $users = $this->readyToLoad ? User::where('name','LIKE',"%{$this->search}%")->
            orWhere('lname','LIKE',"%{$this->search}%")->
            orWhere('username','LIKE',"%{$this->search}%")->
            orWhere('email','LIKE',"%{$this->search}%")->
            orWhere('mobile','LIKE',"%{$this->search}%")->
            orWhere('position','LIKE',"%{$this->search}%")->
            orWhere('id',$this->search)->latest()->paginate(15) : [];
        return view('livewire.support.users.index', compact('users'));
    }


}
