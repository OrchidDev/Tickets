
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>ویرایش کاربر - {{$user->name}}</h1>
            <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateUser">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Input1" class="form-label">نام و نام خانوادگی</label>
                            <input type="text" class="form-control" id="Input1" wire:model.defer="users.name" value="{{old('users.name')}}">
                            @error('users.name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Input2" class="form-label">نام کاربری</label>
                            <input type="text" class="form-control" id="Input2" wire:model.defer="users.username">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Input3" class="form-label">ایمیل</label>
                            <input type="email" class="form-control" id="Input3" wire:model.defer="users.email">
                            @error('users.email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Input4" class="form-label">سمت کاربری</label>
                            <input type="text" class="form-control" id="Input4" wire:model.defer="users.position">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Input5" class="form-label">شماره موبایل</label>
                            <input type="text" class="form-control" id="Input5" wire:model.defer="users.mobile">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="select1">جنسیت</label>
                            <select class="form-control" id="select1" wire:model.defer="users.gender">
                                <option selected>انتخاب کنید ...</option>
                                <option value="1">آقا</option>
                                <option value="0">خانم</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="select2">گروه سازمانی</label>
                            <select class="form-control" id="select2" wire:model.defer="users.group_id">
                                <option selected>انتخاب کنید ...</option>
                                <option value="1">مدیران اصلی</option>
                                <option value="2">مدیران</option>
                                <option value="3">برنامه نویس</option>
                                <option value="4">بخش اداری</option>
                                <option value="5">بخش فروش</option>
                                <option value="6">بخش پشتیبانی</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="select3">نقش کاربری</label>
                            <select class="form-control" id="select3" wire:model.defer="users.role_id">
                                <option selected>انتخاب کنید ...</option>
                                <option value="1">مدیر سایت</option>
                                <option value="2">پشتیبان سایت</option>
                                <option value="3">کارشناس فروش</option>
                                <option value="4">کارشناس مالی</option>
                                <option value="5">کارشناس پشتیبانی</option>
                                <option value="6">مدیر بخش فروش</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="mb-3">ارتباط با</label>
                        <div class="row">
                            <div class="col">
                                <label for="checkbox1">ایمیل</label>
                                <input type="checkbox" id="checkbox1" wire:model.defer="users.email_conn">
                            </div>
                            <div class="col">
                                <label for="checkbox2">موبایل</label>
                                <input type="checkbox" id="checkbox2" wire:model.defer="users.email_conn">
                            </div>
                            <div class="col">
                                <div class="col">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" wire:model.defer="users.sms" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">دریافت پیامک</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="mb-3">اختیارات نامه ها</label>
                        <div class="row">
                            <div class="col">
                                <label for="checkbox1">شروع نامه</label>
                                <input type="checkbox" id="checkbox1" wire:model.defer="users.task_start">
                            </div>
                            <div class="col">
                                <label for="checkbox2">بررسی اولیه نامه</label>
                                <input type="checkbox" id="checkbox2" wire:model.defer="users.task_review">
                            </div>
                            <div class="col">
                                <div class="col">
                                    <label for="checkbox3">بایگانی نامه</label>
                                    <input type="checkbox" id="checkbox3" wire:model.defer="users.task_comp">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="mb-3">اختیارات وظایف</label>
                        <div class="row">
                            <div class="col">
                                <label for="checkbox1">شروع وظیفه</label>
                                <input type="checkbox" id="checkbox1" wire:model.defer="users.manage_start">
                            </div>
                            <div class="col">
                                <label for="checkbox2">بررسی اولیه وظیفه</label>
                                <input type="checkbox" id="checkbox2" wire:model.defer="users.manage_review">
                            </div>
                            <div class="col">
                                <div class="col">
                                    <label for="checkbox3">تکمیل وظیفه</label>
                                    <input type="checkbox" id="checkbox3" wire:model.defer="users.manage_comp">
                                </div>
                            </div>
                            <div class="col">
                                <div class="col">
                                    <label for="checkbox4">خاتمه وظیفه</label>
                                    <input type="checkbox" id="checkbox4" wire:model.defer="users.manage_end">
                                </div>
                            </div>
                            <div class="col">
                                <div class="col">
                                    <label for="checkbox5">رد شده</label>
                                    <input type="checkbox" id="checkbox5" wire:model.defer="users.manage_cancel">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="file1">عکس کاربر</label>
                        <div class="preview mb-3">
                            @if ($pic1)
                                <img src="{{ $pic1->temporaryUrl() }}" alt="">
                            @endif
                        </div>
                        <input class="form-control" type="file" id="file1" wire:model.lazy="users.pic1">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="file2">امضای کاربر</label>
                        <div class="preview mb-3">
                            @if ($pic2)
                                <img src="{{ $pic2->temporaryUrl() }}" alt="">
                            @endif
                        </div>
                        <input class="form-control" type="file" id="file2" wire:model.lazy="users.pic2">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">ثبت کاربر</button>
            </form>
        </div>
    </div>
</div>
