
<div class="container">
    <div class="card" wire:init="loadUser">
        <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-primary">افزودن کاربر جدید</a>
            <a href="{{ route('users.trash') }}" class="btn btn-danger"> سطل زباله <span class="badge text-bg-light">{{\App\Models\User::onlyTrashed()->count()}}</span></a>
            <div class="mb-3 col-4 float-end" style="margin-top: -25px;">
                <label for="search"></label>
                <input type="text" class="form-control" id="search" wire:model.debounce.1000="search" placeholder="جستجوی کاربران ...">
            </div>
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
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary btn-sm">ویرایش</a>
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



