<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
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

Route::get('/', [AuthController::class, 'login_view'])->name('login')->middleware(RedirectIfAuthenticated::class);
Route::post('/', [AuthController::class, 'login'])->middleware(RedirectIfAuthenticated::class);
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware(Authenticate::class);

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(Authenticate::class);

Route::get('admin/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit')->middleware(Authenticate::class);
Route::post('admin/profile/details', [ProfileController::class, 'details'])->name('admin.profile.details')->middleware(Authenticate::class);
Route::post('admin/profile/picture', [ProfileController::class, 'picture'])->name('admin.profile.picture')->middleware(Authenticate::class);
Route::post('admin/profile/password', [ProfileController::class, 'password'])->name('admin.profile.password')->middleware(Authenticate::class);
