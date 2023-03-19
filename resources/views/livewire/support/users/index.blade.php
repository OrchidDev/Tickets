@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">شناسه </th>
                        <th>نام و نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>نام کاربری</th>
                        <th>گروه کاربری</th>
                        <th>عملیات</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>رایموند</td>
                        <td>test@gmail.com</td>
                        <td>Raymond</td>
                        <td>برنامه نویس</td>
                        <td class="text-center">
                            <button class="btn btn-secondary btn-sm">ویرایش</button>
                            <button class="btn btn-danger btn-sm">حذف</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
