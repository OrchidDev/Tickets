@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form role="form" wire:submit.prevent="userForm()">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Input1" class="form-label">نام و نام خانوادگی</label>
                                <input type="text" class="form-control" id="Input1" wire:model.defer="user.name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Input2" class="form-label">نام کاربری</label>
                                <input type="text" class="form-control" id="Input2" wire:model.defer="user.username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Input3" class="form-label">ایمیل</label>
                                <input type="email" class="form-control" id="Input3" wire:model.defer="user.email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Input4" class="form-label">سمت کاربری</label>
                                <input type="text" class="form-control" id="Input4" wire:model.defer="user.position">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Input5" class="form-label">شماره موبایل</label>
                                <input type="text" class="form-control" id="Input5" wire:model.defer="user.mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Input6" class="form-label">رمز عبور</label>
                                <input type="password" class="form-control" id="Input6" wire:model.defer="user.password2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="select1">جنسیت</label>
                                <select class="form-control" id="select1" wire:model.defer="user.gender">
                                    <option selected>انتخاب کنید ...</option>
                                    <option value="1">آقا</option>
                                    <option value="0">خانم</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="select2">گروه سازمانی</label>
                                <select class="form-control" id="select2" wire:model.defer="user.group_id">
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
                                <select class="form-control" id="select3" wire:model.defer="user.role_id">
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
                                    <input type="checkbox" id="checkbox1" wire:model.defer="user.email_conn">
                                </div>
                                <div class="col">
                                    <label for="checkbox2">موبایل</label>
                                    <input type="checkbox" id="checkbox2" wire:model.defer="user.email_conn">
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <label for="checkbox3">دریافت پیامک</label>
                                        <input type="checkbox" id="checkbox3" wire:model.defer="user.sms">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="mb-3">اختیارات نامه ها</label>
                            <div class="row">
                                <div class="col">
                                    <label for="checkbox1">شروع نامه</label>
                                    <input type="checkbox" id="checkbox1">
                                </div>
                                <div class="col">
                                    <label for="checkbox2">بررسی اولیه نامه</label>
                                    <input type="checkbox" id="checkbox2">
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <label for="checkbox3">بایگانی نامه</label>
                                        <input type="checkbox" id="checkbox3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-3">اختیارات وظایف</label>
                            <div class="row">
                                <div class="col">
                                    <label for="checkbox1">شروع وظیفه</label>
                                    <input type="checkbox" id="checkbox1">
                                </div>
                                <div class="col">
                                    <label for="checkbox2">بررسی اولیه وظیفه</label>
                                    <input type="checkbox" id="checkbox2">
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <label for="checkbox3">تکمیل وظیفه</label>
                                        <input type="checkbox" id="checkbox3">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <label for="checkbox4">خاتمه وظیفه</label>
                                        <input type="checkbox" id="checkbox4">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <label for="checkbox5">رد شده</label>
                                        <input type="checkbox" id="checkbox5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="file1">عکس کاربر</label>
                            <input class="form-control" type="file" id="file1" wire:model.defer="user.pic">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="file2">امضای کاربر</label>
                            <input class="form-control" type="file" id="file2" wire:model.defer="user.sing">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت کاربر</button>
                </form>
            </div>
        </div>
    </div>
@endsection
