<?php

namespace App\Http\Livewire\Support\Permission;

use App\Models\Permission;
use Livewire\Component;

class Create extends Component
{
    public Permission $permission;
    public $title, $value;
    public function render()
    {
        return view('livewire.support.permission.create')->extends('layouts.app')->section('content');
    }

    public function mount()
    {
        $this->permission = new Permission;
    }

    protected $rules = [
        'permission.title' => 'nullable',
        'permission.value' => 'nullable',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function permissionForm()
    {
        $this->validate();

        $permission = Permission::create([
            'title' => $this->permission->title,
            'value' => $this->permission->value,
        ]);

        $this->dispatchBrowserEvent('toastr:success', ['message' => 'دسترسی با موفقیت ایجاد شد']);
        return redirect()->route('permissions.index');
    }
}
