<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Auth;
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
    return view('admin.index');
})->middleware('admin');



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Admin
Route::get('/admin/dashboard/info', [AdminController::class, 'userInfo'])->name('user-info');
// Route::get('/admin/dashboard', [AdminController::class, 'returnHome'])->name('back');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard')->middleware('admin');

//customer
Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer-dashboard')->middleware('customer');