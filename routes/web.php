<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InboxController;
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

Route::get('/', function () {

    return view('welcome');
});
Route::get('/testdata', function () {

    return view('testdata');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/dashboard', [DashboardController::class,'index']);
Route::get('/worksheets', [WorksheetsController::class,'index']);
Route::get('/workers', [WorkersController::class,'index']);
Route::get('/inbox', [InboxController::class,'index']);

Route::get('/worksheets/{worksheetID}', function () {
    return view('contents.view_worksheet',[
        'titles' => ['Worksheets', 'View'],
    ]);
});


Route::get('/', [AuthenticationController::class,'create']);
Route::post('/', [AuthenticationController::class,'store']);

