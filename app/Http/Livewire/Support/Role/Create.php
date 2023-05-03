<?php

namespace App\Http\Livewire\Support\Role;

use App\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public Role $role;
    public $title, $value;
    public function render()
    {
        return view('livewire.support.role.create')->extends('layouts.app')->section('content');
    }

    public function mount()
    {
        $this->role = new Role();
    }

    protected $rules = [
        'role.title' => 'nullable',
        'role.value' => 'nullable',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function roleForm()
    {
        $this->validate();

        $role = Role::create([
            'title' => $this->role->title,
            'value' => $this->role->value,
        ]);

        $this->dispatchBrowserEvent('toastr:success', ['message' => 'مقام با موفقیت ایجاد شد']);
        return redirect()->route('role.index');
    }
}
