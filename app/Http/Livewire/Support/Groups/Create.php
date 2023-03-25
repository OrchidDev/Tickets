<?php

namespace App\Http\Livewire\Support\Groups;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $logo;
    public Group $group;
    public function render()
    {
        return view('livewire.support.groups.create')
            ->extends('layouts.app')
            ->section('content');
    }

    public function mount()
    {
        $this->group = new Group();
    }

    protected $rules = [
        'group.name' => 'nullable',
        'group.type' => 'nullable',
        'group.logo' => 'nullable',
    ];
    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function storeGroup()
    {
        $this->validate();
        $group = Group::create([
            'name' => $this->group->name,
            'type' => $this->group->type,
        ]);


        if ($this->logo) {
            $group->update([
                'logo' => $this->uploadImage()
            ]);
        }

        $this->dispatchBrowserEvent('toastr:success', ['message' => 'گروه با موفقیت ایجاد شد']);
        return redirect()->route('groups.index');
    }

    public function uploadImage()
    {
        $year = now()->year; $month = now()->month; $directory = "groups/$year/$month";
        $name= $this->logo->getClientOriginalName(); $this->logo->storeAs($directory,$name);
        return "$directory/$name";
    }

}
