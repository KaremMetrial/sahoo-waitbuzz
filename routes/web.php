<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\ContactController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ProductController;
    use Livewire\Livewire;

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
        ],
        function () {
            // Home Page
            Route::get('/', [HomeController::class, 'index'])->name('home');

            // Categories
            Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{category}', 'show')->name('show');
            });

            // contacts
            Route::prefix('contacts')->controller(ContactController::class)->name('contacts.')->group(function () {
                Route::post('/', 'store')->name('store');
            });

            // Products
            Route::prefix('products')->controller(ProductController::class)->name('products.')->group(function () {
                // our project
                Route::get('/our-featured-project', 'ourFeaturedProject')->name('featured');

                Route::get('/{product}', 'show')->name('show');
            });
        }
    );

    // override livewire path
    Livewire::setScriptRoute(function($handle) {
        return Route::get('/livewire/livewire.js', $handle);
    });

    Livewire::setUpdateRoute(function($handle) {
        return Route::get('/livewire/update', $handle);
    });
