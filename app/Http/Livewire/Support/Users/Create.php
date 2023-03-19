<?php

namespace App\Http\Livewire\Support\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $pic;
    public $sign;
    public $user;
    public function render()
    {
        return view('livewire.support.users.create');
    }

    public function mount()
    {
        $this->user = new User();
    }

    protected $rules =[
        'user.name' => 'nullable',
        'user.username' => 'nullable',
        'user.email' => 'nullable',
        'user.password2' => 'nullable',
        'user.is_admin' => 'nullable',
        'user.sms' => 'nullable',
        'user.email_conn' => 'nullable',
        'user.mobile_conn' => 'nullable',
        'user.group_id' => 'nullable',
        'user.mobile' => 'nullable',
        'user.sing' => 'nullable',
        'user.gender' => 'nullable',
        'user.role_id' => 'nullable',
        'user.position' => 'nullable',
        'user.pic' => 'nullable',
        'user.task_start' => 'nullable',
        'user.task_review' => 'nullable',
        'user.task_comp' => 'nullable',
        'user.manage_start' => 'nullable',
        'user.manage_review' => 'nullable',
        'user.manage_comp' => 'nullable',
        'user.manage_end' => 'nullable',
        'user.manage_cancel' => 'nullable',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function userForm()
    {
        $this->validate();
        ddd($this->validate());
    }
}
