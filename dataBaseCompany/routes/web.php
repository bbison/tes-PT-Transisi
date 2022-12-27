<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/company/detail/{id}', [CompanyController::class, 'allemployee'])->middleware('auth');
Route::get('/download-data/{id}', [CompanyController::class, 'download'])->middleware('auth');
Route::get('/ajax/employee/{str}', [EmployeeController::class, 'ajax'])->middleware('auth');
Route::get('/ajax/company/{str}', [CompanyController::class, 'ajax'])->middleware('auth');
Route::resource('/company', CompanyController::class)->middleware('auth');
Route::resource('/employee', EmployeeController::class)->middleware('auth');
Route::post('/importemployee', [EmployeeController::class, 'prosesimport'])->middleware('auth');
Route::post('/importcompany', [CompanyController::class, 'prosesimport'])->middleware('auth');
