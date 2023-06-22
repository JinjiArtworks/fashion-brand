<?php

use App\Http\Controllers\Customers\FaqController;
use App\Http\Controllers\Customers\HomeController;
use App\Http\Controllers\Customers\ProductController;
use App\Http\Controllers\Owner\EmployeeController;
use App\Http\Controllers\Staff\CustomerController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\FaqListController;
use App\Http\Controllers\Staff\TransactionController;
use Illuminate\Support\Facades\Route;



Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/', [HomeController::class, 'index'])->name('shop');

Route::group(['as' => 'faq-cust.'], function () {
    Route::get('/faq-cust', [FaqController::class, 'index']);
    Route::get('/faq-create', [FaqController::class, 'create'])->name('create');
    Route::post('/faq-store', [FaqController::class, 'store'])->name('store');
});

Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'staff.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/create-product', [DashboardController::class, 'create'])->name('create');
        Route::get('/edit-product/{id}', [DashboardController::class, 'edit'])->name('edit');
        Route::post('/store-product', [DashboardController::class, 'store'])->name('store');
        Route::put('/update-product/{id}', [DashboardController::class, 'update'])->name('update');
        Route::get('/delete-product/{id}', [DashboardController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'transaction.'], function () {
        Route::get('/data-transaction', [TransactionController::class, 'index']);
        Route::get('/create-transaction', [TransactionController::class, 'create'])->name('create');
        Route::get('/edit-transaction/{id}', [TransactionController::class, 'edit'])->name('edit');
        Route::post('/store-transaction', [TransactionController::class, 'store'])->name('store');
        Route::put('/update-transaction/{id}', [TransactionController::class, 'update'])->name('update');
        Route::get('/delete-transaction/{id}', [TransactionController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'customers.'], function () {
        Route::get('/data-customer', [CustomerController::class, 'index']);
        Route::get('/create-customer', [CustomerController::class, 'create'])->name('create');
        Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])->name('edit');
        Route::post('/store-customer', [CustomerController::class, 'store'])->name('store');
        Route::put('/update-customer/{id}', [CustomerController::class, 'update'])->name('update');
        Route::get('/delete-customer/{id}', [CustomerController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'employees.'], function () {
        Route::get('/data-employee', [EmployeeController::class, 'index']);
        Route::get('/create-employee', [EmployeeController::class, 'create'])->name('create');
        Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit'])->name('edit');
        Route::post('/store-employee', [EmployeeController::class, 'store'])->name('store');
        Route::put('/update-employee/{id}', [EmployeeController::class, 'update'])->name('update');
        Route::get('/delete-employee/{id}', [EmployeeController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'faq.'], function () {
        Route::get('/data-faqs', [FaqListController::class, 'index']);
        Route::get('/create-faq', [FaqListController::class, 'create'])->name('create');
        Route::get('/edit-faq/{id}', [FaqListController::class, 'edit'])->name('edit');
        Route::post('/store-faq', [FaqListController::class, 'store'])->name('store');
        Route::put('/update-faq/{id}', [FaqListController::class, 'update'])->name('update');
        Route::get('/delete-faq/{id}', [FaqListController::class, 'destroy'])->name('delete');
    });
});
require __DIR__ . '/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
