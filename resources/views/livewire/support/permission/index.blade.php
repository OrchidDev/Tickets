
<div class="container">
    <div class="row">
        @foreach(\App\Models\Role::all() as $role)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">{{$role->value}}</div>
                    <div class="card-body">
                        مجموع سمت های دسترسی : {{\Illuminate\Support\Facades\DB::table('permission_role')->where('role_id',$role->id)->count()}}
                        <div class="mt-3">
                            @php
                                $permissions_roles = \Illuminate\Support\Facades\DB::table('permission_role')->where('role_id',$role->id)->get();
                            @endphp
                            @foreach($permissions_roles as $permission_role)
                                @foreach(\App\Models\Permission::where('id',$permission_role->permission_id)->get() as $per)
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-md-9">{{$per->value}}</div>
                                            <div class="col-md-3">
                                                <button class="btn btn-danger btn-sm" wire:click="deletePermissionRole({{$permission_role->id}})">حذف</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card" wire:init="loadPermission">
        <div class="card-body">
            <div class="mb-3 col-4 float-end" style="margin-top: -25px;">
                <label for="search"></label>
                <input type="text" class="form-control" wire:model.debounce.1000="search" id="search" placeholder="جستجوی دسترسی ها ...">
            </div>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px;">شناسه </th>
                    <th>نام</th>
                    <th>اختصاص دادن</th>
                    <th>زمان ایجاد</th>
                    <th>عملیات</th>
                </tr>
                @if($readyToLoad)
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->title}}</td>
                            <td>
                                @foreach(\App\Models\Role::all() as $role)
                                    <span class="badge
                                    @if($role->id == 1)
                                    text-bg-primary
                                        @elseif($role->id == 2)
                                        text-bg-secondary
                                        @elseif($role->id == 3)
                                        text-bg-success
                                        @elseif($role->id == 4)
                                        text-bg-danger
                                        @elseif($role->id == 5)
                                        text-bg-warning
                                        @elseif($role->id == 6)
                                        text-bg-info
                                        @elseif($role->id == 7)
                                        text-bg-dark
                                    @endif
                                    ">{{$role->value}}</span>
                                @endforeach
                            </td>
                            <td>{{$permission->getCreateAtShamsi()}}</td>
                            <td class="text-center" style="width: 200px;">
                                <button class="btn btn-danger btn-sm" wire:click="deletePermission({{$permission->id}})">حذف</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
</div>
