<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('register');
});

Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    Route::resource('currencies', \App\Http\Controllers\Admin\CurrencyController::class);
    Route::resource('expense_categories', \App\Http\Controllers\Admin\ExpenseCategoryController::class);
    Route::resource('income_categories', \App\Http\Controllers\Admin\IncomeCategoryController::class);
    Route::resource('expenses', \App\Http\Controllers\Admin\ExpenseController::class);
    Route::resource('incomes', \App\Http\Controllers\Admin\IncomeController::class);

    Route::resource('monthly_reports', \App\Http\Controllers\Admin\MontlyReportController::class);
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home');
