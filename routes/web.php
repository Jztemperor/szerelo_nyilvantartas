<?php

use App\Http\Controllers\AuthenticationController;
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

Route::get('/', [AuthenticationController::class,'create']);
Route::post('/', [AuthenticationController::class,'store']);