
<div class="container">
    <div class="card" wire:init="loadUser">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">افزودن کاربر جدید</a>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="search"></label>
                        <input type="text" class="form-control" id="search" wire:model.debounce.1000="search" placeholder="جستجوی کاربران ...">
                    </div>
                </div>
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



