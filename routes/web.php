<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignCategoryController;
use App\Http\Controllers\DonationController;

Route::group(['domain' => ''], function() {
    Route::get('/',[AuthController::class, 'index'])->name('auth');
    Route::get('auth',[AuthController::class, 'index'])->name('auth');
        Route::post('login',[AuthController::class, 'do_login'])->name('login'); 
        Route::middleware(['checkAuthToken'])->group(function(){
            Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
        
            Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    
            Route::prefix('donation')->name('donation.')->group(function(){
                Route::get('',  [DonationController::class, 'index'])->name('index');
                Route::get('create',[DonationController::class, 'create'])->name('create');
                Route::get('edit/{donation}',  [DonationController::class, 'edit'])->name('edit');
                Route::post('store',     [DonationController::class, 'store'])->name('store');
                Route::post('update/{donation}',   [DonationController::class, 'update'])->name('update');
                Route::delete('destroy/{donation}', [DonationController::class, 'destroy'])->name('destroy');
                Route::post('accept/{donation}',  [DonationController::class, 'accept'])->name('accept');
                Route::post('deny/{donation}',  [DonationController::class, 'deny'])->name('deny');
            });
            Route::prefix('campaign')->name('campaign.')->group(function(){
                Route::get('detail/{id}',  [CampaignController::class, 'detail'])->name('detail');
                Route::get('list',  [CampaignController::class, 'index'])->name('index');
                Route::get('create',[CampaignController::class, 'create'])->name('create');
                Route::get('edit/{id}',  [CampaignController::class, 'edit'])->name('edit');
                Route::post('store',     [CampaignController::class, 'store'])->name('store');
                Route::post('update/{id}',   [CampaignController::class, 'update'])->name('update');
                Route::put('approve/{id}',  [CampaignController::class, 'approve'])->name('approve');
                Route::put('reject/{id}',  [CampaignController::class, 'reject'])->name('reject');
                Route::put('revise/{id}',  [CampaignController::class, 'revise'])->name('revise');
                Route::put('setToLive/{id}',  [CampaignController::class, 'setToLive'])->name('setToLive');
            });
            Route::prefix('category')->name('category.')->group(function(){
                Route::get('list',  [CampaignCategoryController::class, 'index'])->name('list');
                Route::get('create',[CampaignCategoryController::class, 'create'])->name('create');
                Route::get('edit/{id}',  [CampaignCategoryController::class, 'edit'])->name('edit');
                Route::post('store',[CampaignCategoryController::class, 'store'])->name('store');
                Route::put('update/{id}',   [CampaignCategoryController::class, 'update'])->name('update');
                Route::delete('destroy/{id}', [CampaignCategoryController::class, 'destroy'])->name('destroy');
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