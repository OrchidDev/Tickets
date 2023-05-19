<?php

namespace App\Http\Livewire\Support\Permission;

use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $role_id;
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
    public function deletePermissionRole($id)
    {
        DB::table('permission_role')->where('id',$id)->delete();
        $this->dispatchBrowserEvent('toastr:success', ['message' => ' با موفقیت حذف شد']);
    }

    public function addRoleForm($data)
    {
        $permission = $data[0];
        $role = $data[1];

        if (DB::table('permission_role')
            ->where('role_id','=',$role)
            ->where('permission_id','=',$permission)->first()){
            $this->dispatchBrowserEvent('toastr:error', ['message' => 'مشکلی در ایجاد کردن بوجود آمد!']);
        }else{
            DB::table('permission_role')->
            insert([
                'permission_id' =>$permission,
                'role_id' =>$role
            ]);
            $this->dispatchBrowserEvent('toastr:success', ['message' => 'با موفقیت ایجاد شد']);
        }
    }

    public function render()
    {
        $permissions = $this->readyToLoad ? Permission::where('title','LIKE',"%{$this->search}%")->
        orWhere('value','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(15) : [];
        return view('livewire.support.permission.index', compact('permissions'))->extends('layouts.app')->section('content');
    }
}
