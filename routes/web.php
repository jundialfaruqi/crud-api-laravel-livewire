<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\IndexDashboard;
use App\Livewire\User\IndexUser;
use App\Livewire\Role\IndexRole;
use App\Livewire\Permission\IndexPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Permission;

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

Route::get('/', function () {
    return redirect()->route('dashboard.index');
})->middleware('auth');

Route::get('/dashboard', IndexDashboard::class)->name('dashboard.index')->middleware('auth');

Route::get('/user', IndexUser::class)->name('user.index')->middleware(['auth', 'permission:View User']);

Route::get('/role', IndexRole::class)->name('role.index')->middleware(['auth', 'permission:View Role']);

Route::get('/permission', IndexPermission::class)->name('permission.index')->middleware('auth', 'permission:View Permission');

Route::get('/login', Login::class)->name('auth.login');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('auth.login');
})->name('logout')->middleware('auth');
