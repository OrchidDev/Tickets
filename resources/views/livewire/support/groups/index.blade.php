
<div class="container">
    <div class="card" wire:init="loadGroup">
        <div class="card-body">
            <a href="{{ route('groups.create') }}" class="btn btn-primary">افزودن گروه جدید</a>
            <div class="mb-3 col-4 float-end" style="margin-top: -25px;">
                <label for="search"></label>
                <input type="text" class="form-control" wire:model.debounce.1000="search" id="search" placeholder="جستجوی گروه ها ...">
            </div>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px;">شناسه </th>
                    <th>نام گروه</th>
                    <th>سر گروه</th>
                    <th>عملیات</th>
                </tr>
                @if($readyToLoad)
                    @foreach($groups as $group)
                        <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->name}}</td>
                            <td>
                                {{$group->group->name ?? '--'}}
                            </td>
                            <td class="text-center" style="width: 200px;">
                                <button class="btn btn-danger btn-sm" wire:click="deleteGroup({{$group->id}})">حذف</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
</div>
