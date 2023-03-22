<?php

namespace App\Http\Livewire\Support\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public User $users;
    public $pic1;
    public $pic2;

    public function render()
    {
        $user = $this->users;
        return view('livewire.support.users.edit', compact('user'))
            ->extends('layouts.app')
            ->section('content');
    }

    protected $rules =[
        'users.name' => 'nullable',
        'users.username' => 'nullable',
        'users.email' => 'nullable',
        'users.is_admin' => 'nullable',
        'users.sms' => 'nullable',
        'users.email_conn' => 'nullable',
        'users.mobile_conn' => 'nullable',
        'users.group_id' => 'nullable',
        'users.mobile' => 'nullable',
        'users.pic2' => 'required',
        'users.gender' => 'nullable',
        'users.role_id' => 'nullable',
        'users.position' => 'nullable',
        'users.pic1' => 'required',
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

    public function mount(User $user) {
        $this->users = $user;
    }

    public function updateUser()
    {
        $this->validate();

        if ($this->users->active_sms == true) {
            $this->users->update([
                'active_sms'=>1
            ]);
        }

        if ($this->pic1) {
            $this->users->update([
                'pic1' => $this->uploadImage()
            ]);
        }
        if ($this->pic2) {
            $this->users->update([
                'pic2' =>$this->uploadImage2()
            ]);
        }

        $this->users->update($this->validate());
        $this->dispatchBrowserEvent('toastr:success', ['message' => 'کاربر مورد نظر با موفقیت به روز شد']);
        return redirect()->route('users.index');
    }

    public function uploadImage()
    {
        $year = now()->year; $month = now()->month; $directory = "users/$year/$month";
        $name= $this->pic1->getClientOriginalName(); $this->pic1->storeAs($directory,$name);
        return "$directory/$name";
    }
    public function uploadImage2()
    {
        $year = now()->year; $month = now()->month; $directory = "sign/$year/$month";
        $name= $this->pic2->getClientOriginalName(); $this->pic2->storeAs($directory,$name);
        return "$directory/$name";
    }
}
