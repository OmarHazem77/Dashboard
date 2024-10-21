<?php
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Controller;
use App\Http\Controllers\WebsiteController;


Route::get('/',[WebsiteController::class,'index'])->name('website.index');
Route::get('/about',[WebsiteController::class,'about'])->name('website.about');


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('auth.login');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/handleRegister', 'handleRegister')->name('auth.handleRegister');
    Route::post('/handleLogin', 'handleLogin')->name('auth.handleLogin');
    Route::get('/logout', 'logout')->name('auth.logout');

});//middleware('IsLogin')->
Route::  prefix('admin')->name('admin.')->group(function () {
    Route::controller(DoctorController::class)->name('doctors.')->group(function () {
        Route::get('/doctors', 'index')->name('index');
        Route::get('/doctors/create', 'create')->name('create');
        Route::post('/doctors', 'store')->name('store');
        Route::get('/doctors/{id}/edit', 'edit')->name('edit');
        Route::put('/doctors/{id}', 'update')->name('update');
        Route::get('/doctors/archive', 'archive')->name('archive');
        Route::get('/doctors/{id}/show', 'show')->name('show');
        Route::delete('/doctors/{id}', 'destroy')->name('destroy');
        Route::delete('/doctors/{id}/archive', 'destroyArchive')->name('destroyArchive');
        Route::post('/doctors/{id}/restore', 'restore')->name('restore');
    });
    Route::get('/',HomeController::class)->name('index');

});
