<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EntryController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    /** Login */
    Route::get('/', [WebController::class, 'index'])->name('web.index');

});

/** Admin */
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function(){
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/report', [DashboardController::class, 'report'])->name('report.index');

    //User
    Route::any('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);

    // Clients
    Route::any('clients/search', [ClientController::class, 'search'])->name('clients.search');
    Route::resource('clients', ClientController::class); 

     // Companies
     Route::any('companies/search', [CompanyController::class, 'search'])->name('companies.search');
     Route::resource('companies', CompanyController::class); 

    // Employees
    Route::any('employees/search', [EmployeeController::class, 'search'])->name('employees.search');
    Route::resource('employees', EmployeeController::class); 

    // Partner
    Route::any('partners/search', [PartnerController::class, 'search'])->name('partners.search');
    Route::resource('partners', PartnerController::class); 

    // Material
    Route::any('materials/search', [MaterialController::class, 'search'])->name('materials.search');
    Route::resource('materials', MaterialController::class); 

    // Entry
    Route::any('entries/search', [EntryController::class, 'search'])->name('entries.search');
    Route::resource('entries', EntryController::class); 
});


