<?php

namespace App\Http\Livewire\Support\Role;

use App\Models\Role;
use Livewire\Component;

class Index extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = false;
    public function render()
    {
        $roles = $this->readyToLoad ? Role::where('title','LIKE',"%{$this->search}%")->
        orWhere('value','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(15) : [];
        return view('livewire.support.role.index', compact('roles'))->extends('layouts.app')->section('content');
    }

    public function loadRole()
    {
        $this->readyToLoad = true;
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        $this->dispatchBrowserEvent('toastr:success', ['message' => 'مقام با موفقیت حذف شد']);
    }
}
