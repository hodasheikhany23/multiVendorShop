<?php

use App\Http\Controllers\Admin\menuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetLocale;

Auth::routes();

Route::get('/',\App\Livewire\Front\Home::class)->name('home');
Route::get('/home',\App\Livewire\Front\Home::class)->name('home');

Route::get('store/category/{slug}',\App\Livewire\Front\ProductCategoryWire::class)->name('store.category');
Route::get('store/category/{slug}/{product}/detail',\App\Livewire\Front\ProductDetailWire::class)->name('store.product.detail');


// Admin routes
Route::prefix('admin')->middleware(['auth','can:admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});
Route::get('admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('admin.login');

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

Route::prefix('admin/tag')->group(function(){
    Route::get('/',\App\Livewire\Admin\Tag\TagWire::class)
        ->name('admin.tag.index')
        ->middleware(['auth','can:admin']);

    Route::get('/create',\App\Livewire\Admin\Tag\TagWireCreate::class)
        ->name('admin.tag.create')
        ->middleware(['auth','can:admin']);

    Route::get('/{tag}/edit',\App\Livewire\Admin\Tag\TagWireUpdate::class)
        ->name('admin.tag.edit')
        ->middleware(['auth','can:admin']);

});


Route::prefix('admin/attribute')->group(function(){
    Route::get('/',\App\Livewire\Admin\Atrribute\AttributeWire::class)
        ->name('admin.attribute.index')
        ->middleware(['auth','can:admin']);

    Route::get('/create',\App\Livewire\Admin\Atrribute\AttributeWireCreate::class)
        ->name('admin.attribute.create')
        ->middleware(['auth','can:admin']);

    Route::get('/{attribute}/edit',\App\Livewire\Admin\Atrribute\AttributeWireUpdate::class)
        ->name('admin.attribute.edit')
        ->middleware(['auth','can:admin']);

});

Route::prefix('admin/product')->group(function(){
    Route::get('/',\App\Livewire\Admin\Product\ProductWire::class)
        ->name('admin.product.index')
        ->middleware(['auth','can:admin']);

    Route::get('/create',\App\Livewire\Admin\Product\ProductWireCreate::class)
        ->name('admin.product.create')
        ->middleware(['auth','can:admin']);

    Route::get('/{product}/edit',\App\Livewire\Admin\Product\ProductWireUpdate::class)
        ->name('admin.product.edit')
        ->middleware(['auth','can:admin']);

});

