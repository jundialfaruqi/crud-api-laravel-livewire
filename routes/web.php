<?php

use App\Livewire\Dashboard\IndexDashboard;
use App\Livewire\User\IndexUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', IndexDashboard::class)->name('dashboard.index');

Route::get('/user', IndexUser::class)->name('user.index');
