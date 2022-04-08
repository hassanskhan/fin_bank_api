<?php

use Illuminate\Support\Facades\Route;
use App\FinapiService\FinapiService;
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


    Route::get('/getacctoken',[\App\Http\Controllers\FinapiController::class,'generateTokken']);
    Route::get('/createuser',[\App\Http\Controllers\FinapiController::class,'createUser']);
    Route::get('/genusertokken',[\App\Http\Controllers\FinapiController::class,'genUserTokken']);
    Route::get('/storetoken',[\App\Http\Controllers\FinapiController::class,'storeaccessToken'])->name('user.token');
    Route::get('/',[\App\Http\Controllers\FinapiController::class,'home']);
    Route::get('/getBanks',[\App\Http\Controllers\FinapiController::class,'showbankDetails'])->name('getBank');
    Route::post('/create-connection',[\App\Http\Controllers\FinapiController::class,'newBankconn'])->name('create-connection');
    Route::get('/importBankconn',[\App\Http\Controllers\FinapiController::class,'newBankconn'])->name('importBankconn');
    Route::get('/getBankacc',[\App\Http\Controllers\FinapiController::class,'getaccounts']);
    Route::get('apiBanks',[\App\Http\Controllers\FinapiController::class,'getAndstoreBanks']);
