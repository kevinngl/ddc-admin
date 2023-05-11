<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignCategoryController;
use App\Http\Controllers\CashController;

Route::group(['domain' => ''], function() {
    Route::get('/',[AuthController::class, 'index'])->name('auth');
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('office')->name('office.')->group(function(){
        Route::redirect('dashboard','auth', 301);
        Route::get('auth',[AuthController::class, 'index'])->name('auth');
        Route::post('login',[AuthController::class, 'do_login'])->name('login'); 
                   
        Route::middleware(['checkAuthToken'])->group(function(){
            Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
        
            Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    
            Route::prefix('cash')->name('cash.')->group(function(){
                Route::get('',  [CashController::class, 'index'])->name('index');
                Route::get('create',[CashController::class, 'create'])->name('create');
                Route::get('edit/{cash}',  [CashController::class, 'edit'])->name('edit');
                Route::post('store',     [CashController::class, 'store'])->name('store');
                Route::post('update/{cash}',   [CashController::class, 'update'])->name('update');
                Route::delete('destroy/{cash}', [CashController::class, 'destroy'])->name('destroy');
                Route::post('accept/{cash}',  [CashController::class, 'accept'])->name('accept');
                Route::post('deny/{cash}',  [CashController::class, 'deny'])->name('deny');
            });
            Route::prefix('campaign')->name('campaign.')->group(function(){
                Route::get('',  [CampaignController::class, 'index'])->name('index');
                Route::get('create',[CampaignController::class, 'create'])->name('create');
                Route::get('edit/{campaign}',  [CampaignController::class, 'edit'])->name('edit');
                Route::post('store',     [CampaignController::class, 'store'])->name('store');
                Route::post('update/{campaign}',   [CampaignController::class, 'update'])->name('update');
                Route::delete('destroy/{campaign}', [CampaignController::class, 'destroy'])->name('destroy');
                Route::post('accept/{campaign}',  [CampaignController::class, 'accept'])->name('accept');
                Route::post('deny/{campaign}',  [CampaignController::class, 'deny'])->name('deny');
            });
            Route::prefix('category')->name('category.')->group(function(){
                Route::get('',  [CampaignCategoryController::class, 'index'])->name('index');
                Route::get('create',[CampaignCategoryController::class, 'create'])->name('create');
                Route::get('edit/{category}',  [CampaignCategoryController::class, 'edit'])->name('edit');
                Route::post('store',[CampaignCategoryController::class, 'store'])->name('store');
                Route::post('update/{category}',   [CampaignCategoryController::class, 'update'])->name('update');
                Route::delete('destroy/{category}', [CampaignCategoryController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('users')->name('users.')->group(function(){
                Route::get('',  [UserController::class, 'index'])->name('index');
                Route::get('profile', [UserController::class, 'profile'])->name('profile');
                Route::get('create',[UserController::class, 'create'])->name('create');
                Route::get('edit/{user}',  [UserController::class, 'edit'])->name('edit');
                Route::post('store',     [UserController::class, 'store'])->name('store');
                Route::post('updateAdmin/{user}',   [UserController::class, 'updateAdmin'])->name('updateAdmin');
                Route::post('updateSuper/{user}',   [UserController::class, 'updateSuper'])->name('updateSuper');
                Route::post('updateUser/{user}',   [UserController::class, 'updateUser'])->name('updateUser');
                Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
                Route::post('editPassword', [UserController::class, 'editPassword'])->name('editPassword');
            });        
        });
    });
});