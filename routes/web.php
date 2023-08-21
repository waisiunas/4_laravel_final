<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DynamicController;
use App\Http\Controllers\admin\InventoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\PurchaseOrderController;
use App\Http\Controllers\admin\SaleOrderController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/', 'login_view')->name('login');
        Route::post('/', 'login');
    });

    Route::middleware(Authenticate::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->middleware(Authenticate::class)->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::post('details', 'details')->name('details');
        Route::post('picture', 'picture')->name('picture');
        Route::post('password', 'password')->name('password');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index')->name('categories');
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{category}/edit', 'edit')->name('edit');
            Route::post('{category}/edit', 'update');
            Route::get('{category}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(BrandController::class)->group(function () {
        Route::get('brands', 'index')->name('brands');
        Route::prefix('brand')->name('brand.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{brand}/edit', 'edit')->name('edit');
            Route::post('{brand}/edit', 'update');
            Route::get('{brand}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(VendorController::class)->group(function () {
        Route::get('vendors', 'index')->name('vendors');
        Route::prefix('vendor')->name('vendor.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{vendor}/show', 'show')->name('show');
            Route::get('{vendor}/edit', 'edit')->name('edit');
            Route::post('{vendor}/edit', 'update');
            Route::get('{vendor}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('products', 'index')->name('products');
        Route::prefix('product')->name('product.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{product}/show', 'show')->name('show');
            Route::get('{product}/edit', 'edit')->name('edit');
            Route::post('{product}/picture', 'picture')->name('picture');
            Route::post('{product}/edit', 'update');
            Route::get('{product}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(PurchaseOrderController::class)->group(function () {
        Route::get('purchase_orders', 'index')->name('purchase_orders');
        Route::prefix('purchase_order')->name('purchase_order.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{purchase_order}/show', 'show')->name('show');
            Route::get('{purchase_order}/edit', 'edit')->name('edit');
            Route::post('{purchase_order}/edit', 'update');
            Route::get('{purchase_order}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(DynamicController::class)->group(function () {
        Route::post('add_category', 'add_category')->name('add_category');
        Route::post('fetch_categories', 'fetch_categories')->name('fetch_categories');

        Route::post('add_brand', 'add_brand')->name('add_brand');
        Route::post('fetch_brands', 'fetch_brands')->name('fetch_brands');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('customers', 'index')->name('customers');
        Route::prefix('customer')->name('customer.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{customer}/edit', 'edit')->name('edit');
            Route::post('{customer}/edit', 'update');
            Route::get('{customer}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(SaleOrderController::class)->group(function () {
        Route::get('sale_orders', 'index')->name('sale_orders');
        Route::prefix('sale_order')->name('sale_order.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
        });
    });

    Route::controller(InventoryController::class)->group(function () {
        Route::get('inventory', 'index')->name('inventory');
        Route::prefix('inventory')->name('inventory.')->group(function () {
            Route::get('{inventory}/edit', 'edit')->name('edit');
            Route::post('{inventory}/edit_quantity', 'update_quantity')->name('edit_quantity');
            Route::post('{inventory}/edit_location', 'update_location')->name('edit_location');
        });
    });
});
