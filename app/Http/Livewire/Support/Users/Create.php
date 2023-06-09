<?php

namespace App\Http\Livewire\Support\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public User $users;
    public $pic1;
    public $pic2;
    public function render()
    {
        return view('livewire.support.users.create')
            ->extends('layouts.app')
            ->section('content');
    }
    public function mount(){
        $this->users= new User();
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

    public function storeUser()
    {
        $this->validate();
        $users = User::create([
            'name' => $this->users->name,
            'username' => $this->users->username,
            'email' => $this->users->email,
            'group_id' => $this->users->group_id,
            'mobile' => $this->users->mobile,
            'gender' => $this->users->gender,
            'role_id' => $this->users->role_id,
            'position' => $this->users->position,
            'is_admin' => 0,
            'task_start' => $this->users->task_start,
            'task_review' => $this->users->task_review,
            'task_comp' => $this->users->task_comp,
            'manage_start' => $this->users->manage_start,
            'manage_review' => $this->users->manage_review,
            'manage_comp' => $this->users->manage_comp,
            'manage_end' => $this->users->manage_end,
            'manage_cancel' => $this->users->manage_cancel,
            'email_conn' => $this->users->email_connection,
            'mobile_conn' => $this->users->mobile_connection,
            'password' => Hash::make($this->users->password2),
        ]);

        if ($this->users->active_sms == true) {
            $users->update([
                'active_sms'=>1
            ]);
        }
        if ($this->pic1) {
            $users->update([
                'pic1' => $this->uploadImage()
            ]);
        }
        if ($this->pic2) {
            $users->update([
                'pic2' =>$this->uploadImage2()
            ]);
        }

        $this->dispatchBrowserEvent('toastr:success', ['message' => 'کاربر مورد نظر با موفقیت ایجاد شد']);
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
        $year = now()->year; $month = now()->month; $directory = "sing/$year/$month";
        $name= $this->pic2->getClientOriginalName(); $this->pic2->storeAs($directory,$name);
        return "$directory/$name";
    }
}
