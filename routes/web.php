<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

// صفحه اصلی ادمین

Route::get('/', \App\Http\Livewire\Support\Admin\Index::class)->name('support.index');

// کاربران

Route::get('/users', \App\Http\Livewire\Support\Users\Index::class)->name('users.index');
Route::get('/users/create', \App\Http\Livewire\Support\Users\Create::class)->name('users.create');
