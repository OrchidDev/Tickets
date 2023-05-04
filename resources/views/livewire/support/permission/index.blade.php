
<div class="container">
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
                            <td>{{$permission->value}}</td>
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
