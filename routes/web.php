<?php

use App\Http\Controllers\Admin\menuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetLocale;

Auth::routes();

Route::get('/',\App\Livewire\Front\Home::class)->name('home');
Route::get('/home',\App\Livewire\Front\Home::class)->name('home');

//Route::get('/', function () {
//    return view('admin.layouts.dashboard');
//})->middleware(['auth','can:admin']);

Route::resource('menu', menuController::class)->middleware(['auth','can:admin']);

Route::prefix('admin/menu')->group(function(){
    Route::get('/', App\Livewire\menu\MenuWire::class)
        ->name('admin.menu.index')
        ->middleware(['auth','can:admin']);

    Route::get('/create', App\Livewire\menu\MenuWireCreate::class)
        ->name('admin.menu.create')
        ->middleware(['auth','can:admin']);

    Route::get('/{menu}/edit', \App\Livewire\menu\MenuWireUpdate::class)
        ->name('admin.menu.edit')
        ->middleware(['auth','can:admin']);
});
Route::prefix('admin/module')->group(function(){
    Route::get('/',App\Livewire\Admin\module\ModuleWire::class)
        ->name('admin.module.index')
        ->middleware(['auth','can:admin']);

    Route::get('/create',App\Livewire\Admin\module\ModuleWireCreate::class)
        ->name('admin.module.create')
        ->middleware(['auth','can:admin']);

});
Route::prefix('admin/user')->group(function(){
    Route::get('/',App\Livewire\Admin\User\userWire::class)
        ->name('admin.user.index')
        ->middleware(['auth','can:admin']);


});
Route::prefix('admin/vendor')->group(function(){
    Route::get('/',\App\Livewire\Admin\Vendor\VendorWire::class)
        ->name('admin.vendor.index')
        ->middleware(['auth','can:admin']);

    Route::get('/create',\App\Livewire\Admin\Vendor\VendorWireCreate::class)
        ->name('admin.vendor.create')
        ->middleware(['auth','can:admin']);

    Route::get('/{vendor}/edit',\App\Livewire\Admin\Vendor\VendorWireUpdate::class)
        ->name('admin.vendor.edit')
        ->middleware(['auth','can:admin']);
});

Route::prefix('admin/category')->group(function(){
    Route::get('/',\App\Livewire\Admin\Category\CategoryWire::class)
        ->name('admin.category.index')
        ->middleware(['auth','can:admin']);

    Route::get('/create',\App\Livewire\Admin\Category\CategoryWireCreate::class)
        ->name('admin.category.create')
        ->middleware(['auth','can:admin']);

    Route::get('/{category}/edit',\App\Livewire\Admin\Category\CategoryWireUpdate::class)
        ->name('admin.category.edit')
        ->middleware(['auth','can:admin']);

});
