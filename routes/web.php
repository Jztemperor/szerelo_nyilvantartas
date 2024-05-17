<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WorkersController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\WorksheetsController;
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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
//Route::get('/inbox', [InboxController::class,'index'])->name('inbox')->middleware('auth');

Route::get('/', [AuthenticationController::class, 'create'])->name('login');
Route::post('/', [AuthenticationController::class, 'store']);
Route::delete('/', [AuthenticationController::class, 'destroy'])->name('logout');

Route::resource('users', UsersController::class)->except('show')->middleware('authorize:admin');
Route::get('/users/search', [UsersController::class, 'search'])->name('users.search')->middleware('authorize:admin');

Route::resource('worksheets', WorksheetsController::class)->middleware('auth');
Route::resource('workers', WorkersController::class)->middleware('auth');
Route::resource('works', WorksController::class)->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

Route::get('/public/faq', function () {
    return view('contents.public.login-faq');
});
Route::get('/public/privacy', function () {
    return view('contents.public.login-privacy');
});
Route::get('/public/contact', function () {
    return view('contents.public.login-contact');
});

Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');


Route::get('/parts', [PartController::class, 'index'])->name('parts.index')->middleware('auth');
Route::get('/parts/order', [PartController::class, 'create'])->name('parts.create')->middleware('auth');
Route::post('/parts/order', [PartController::class, 'store'])->name('parts.store')->middleware('auth');
Route::put('/parts/update/{id}', [PartController::class, 'update'])->name('parts.update')->middleware('auth');

Route::get('works/{workId}/add-part', [WorksController::class, 'add_part_form'])->name('add-part-form')->middleware('auth');
Route::post('works/{id}/add-part', [WorksController::class, 'add_part'])->name('add-part')->middleware('auth');
