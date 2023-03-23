<?php

use Illuminate\Support\Facades\Route;


// صفحه اصلی ادمین

Route::get('/', \App\Http\Livewire\Support\Admin\Index::class)->name('support.index');

// کاربران

Route::get('/users', \App\Http\Livewire\Support\Users\Index::class)->name('users.index');
Route::get('/users/create', \App\Http\Livewire\Support\Users\Create::class)->name('users.create');
Route::get('/users/{user}/edit', \App\Http\Livewire\Support\Users\Edit::class)->name('users.edit');
Route::get('/users/trash', \App\Http\Livewire\Support\Users\Trash::class)->name('users.trash');
