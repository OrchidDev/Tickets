<?php

namespace App\Http\Livewire\Support\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public User $users;
    public function render()
    {
        return view('livewire.support.users.create')
            ->extends('layouts.app')
            ->section('content');
    }
    public function mount(){
        $this->users=new User();
    }

    protected $rules =[
        'users.name' => 'nullable',
        'users.username' => 'nullable',
        'users.email' => 'nullable',
        'users.password2' => 'nullable',
        'users.is_admin' => 'nullable',
        'users.sms' => 'nullable',
        'users.email_conn' => 'nullable',
        'users.mobile_conn' => 'nullable',
        'users.group_id' => 'nullable',
        'users.mobile' => 'nullable',
        'users.sing' => 'nullable',
        'users.gender' => 'nullable',
        'users.role_id' => 'nullable',
        'users.position' => 'nullable',
        'users.pic' => 'nullable',
        'users.task_start' => 'nullable',
        'users.task_review' => 'nullable',
        'users.task_comp' => 'nullable',
        'users.manage_start' => 'nullable',
        'users.manage_review' => 'nullable',
        'users.manage_comp' => 'nullable',
        'users.manage_end' => 'nullable',
        'users.manage_cancel' => 'nullable',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function storeUser()
    {
        $this->validate();



//         $this->users->save();
//         $this->users=new User();

        dd($this->validate());
//        $this->users->save();
    }
}
