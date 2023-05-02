<?php

use Illuminate\Support\Facades\Route;


// صفحه اصلی ادمین

Route::get('/', \App\Http\Livewire\Support\Admin\Index::class)->name('support.index');

// کاربران

Route::get('/users', \App\Http\Livewire\Support\Users\Index::class)->name('users.index');
Route::get('/users/create', \App\Http\Livewire\Support\Users\Create::class)->name('users.create');
Route::get('/users/{user}/edit', \App\Http\Livewire\Support\Users\Edit::class)->name('users.edit');
Route::get('/users/trash', \App\Http\Livewire\Support\Users\Trash::class)->name('users.trash');

// افراد مجموعه

Route::get('/groups', \App\Http\Livewire\Support\Groups\Index::class)->name('groups.index');
Route::get('/groups/create', \App\Http\Livewire\Support\Groups\Create::class)->name('groups.create');

// مقام ها

Route::get('/roles', \App\Http\Livewire\Support\Role\Index::class)->name('role.index');
