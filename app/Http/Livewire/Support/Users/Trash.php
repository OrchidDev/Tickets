<?php

namespace App\Http\Livewire\Support\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = false;

    public function loadUser()
    {
        $this->readyToLoad = true;
    }


    public function deleteUser($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $pic_path = public_path("upload/$user->pic1");
        if (is_file($pic_path)) {
            unlink($pic_path);
        }

        $si_path = public_path("upload/$user->pic2");
        if (is_file($si_path)) {
            unlink($si_path);
        }
        $user->forceDelete();
        $this->dispatchBrowserEvent('toastr:success', ['message' => 'به صورت کامل با موفقیت حذف شد']);
    }

    public function recoveryUser($id)
    {
        $user = User::withTrashed()->where('id',$id)->first();
        $user->restore();
        $this->dispatchBrowserEvent('toastr:success', ['message' => 'کاربر با موفقیت بازیابی شد']);
    }

    public function render()
    {
        $users = $this->readyToLoad ? DB::table('users')->whereNotNull('deleted_at')->latest()->paginate(15) : [];
        return view('livewire.support.users.trash', compact('users'))
            ->extends('layouts.app')
            ->section('content');
    }
}
