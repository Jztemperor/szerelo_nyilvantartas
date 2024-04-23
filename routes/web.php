<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WorkersController;
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


Route::get('/testdata', function () {

    return view('testdata');
});

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('/worksheets', [WorksheetsController::class,'index'])->name('worksheets')->middleware('auth');
Route::get('/workers', [WorkersController::class,'index'])->name('workers')->middleware('auth');
Route::get('/inbox', [InboxController::class,'index'])->name('inbox')->middleware('auth');

Route::get('/worksheets/{worksheetID}', function () {
    return view('contents.view_worksheet',[
        'titles' => ['Worksheets', 'View'],
    ]);
});


Route::get('/', [AuthenticationController::class,'create'])->name('login');
Route::post('/', [AuthenticationController::class,'store']);
Route::delete('/', [AuthenticationController::class,'destroy'])->name('logout');

Route::resource('users', UsersController::class)->middleware('authorize:admin');