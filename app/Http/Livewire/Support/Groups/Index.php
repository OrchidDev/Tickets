<?php

namespace App\Http\Livewire\Support\Groups;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = false;

    public function render()
    {
        $groups = $this->readyToLoad ? Group::where('name','LIKE',"%{$this->search}%")->
        orWhere('type','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(15) : [];
        return view('livewire.support.groups.index', compact('groups'))
            ->extends('layouts.app')
            ->section('content');
    }

    public function loadGroup()
    {
        $this->readyToLoad = true;
    }

    public function deleteGroup($id)
    {
        $groups = Group::find($id);
        $groups->delete();
        $this->dispatchBrowserEvent('toastr:success', ['message' => 'گروه با موفقیت حذف شد']);
    }
}
