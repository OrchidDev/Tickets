<?php

namespace App\Http\Livewire\Support\Permission;

use App\Models\Permission;
use Livewire\Component;

class Index extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = false;

    public function loadPermission()
    {
        $this->readyToLoad = true;
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        $this->dispatchBrowserEvent('toastr:success', ['message' => 'مقام با موفقیت حذف شد']);
    }
    public function render()
    {
        $permissions = $this->readyToLoad ? Permission::where('title','LIKE',"%{$this->search}%")->
        orWhere('value','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(15) : [];
        return view('livewire.support.permission.index', compact('permissions'))->extends('layouts.app')->section('content');
    }
}
