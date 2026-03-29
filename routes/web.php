<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'settings' => \App\Models\SiteSetting::pluck('value', 'key'),
        'products' => \App\Models\Product::orderBy('sort_order')->get(),
        'timeline' => \App\Models\TimelineEvent::orderBy('year')->get(),
        'facilities' => \App\Models\Facility::orderBy('sort_order')->get(),
        'companyEvents' => \App\Models\CompanyEvent::orderBy('sort_order')->get(),
    ]);
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/reorder', [\App\Http\Controllers\Admin\DashboardController::class, 'reorder'])->name('reorder');

    $adminResources = [
        'products' => \App\Http\Controllers\Admin\ProductController::class,
        'timeline' => \App\Http\Controllers\Admin\TimelineEventController::class,
        'facilities' => \App\Http\Controllers\Admin\FacilityController::class,
        'company-events' => \App\Http\Controllers\Admin\CompanyEventController::class,
        'settings' => \App\Http\Controllers\Admin\SiteSettingController::class,
    ];

    foreach($adminResources as $name => $controller) {
        Route::put($name.'/{id}/restore', [$controller, 'restore'])->name($name.'.restore');
        Route::delete($name.'/{id}/force', [$controller, 'forceDelete'])->name($name.'.forceDelete');
        Route::resource($name, $controller);
    }
});

require __DIR__.'/auth.php';
