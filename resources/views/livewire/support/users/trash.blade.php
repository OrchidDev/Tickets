
<div class="container">
    <div class="card" wire:init="loadUser">
        <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">افزودن کاربر جدید</a>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">شناسه </th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>نام کاربری</th>
                    <th>گروه کاربری</th>
                    <th>موبایل</th>
                    <th>عملیات</th>
                </tr>
                @if($readyToLoad)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->position}}</td>
                            <td>{{$user->mobile}}</td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" wire:click="recoveryUser({{$user->id}})">بازیابی کاربر</button>
                                <button class="btn btn-danger btn-sm" wire:click="deleteUser({{$user->id}})">حذف</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <div class="alert alert-warning" role="alert">
                        در حال خواندن اطلاعات از پایگاه داده ...
                    </div>
                @endif
            </table>
        </div>
    </div>
</div>
