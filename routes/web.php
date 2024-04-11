<?php

use App\Models\User;
use App\Models\WorkOrder;
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
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::group(['prefix' => 'content'], function () {
    Route::get('/dashboard', function () {
        return view('contents.dashboard', [
            'titles' => []
        ]);
    });
    Route::get('/worksheets', function () {
        return view('contents.worksheets',[
            'titles' => ['Worksheets','Create']
        ]);
    });
    Route::get('/workers', function () {
        return view('contents.workers',[
            'titles' => ['Workers']
        ]);
    });
    Route::get('/inbox', function () {
        return view('contents.inbox',[
            'titles' => ['Inbox']
        ]);
    });
});

