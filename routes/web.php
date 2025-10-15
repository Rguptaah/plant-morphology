<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/plant-index', function () {
    return view('plant-index');
})->name('plant-index');
Route::get('/basic-search', function () {
    return view('basic-search');
})->name('basic-search');
Route::get('/advance-search', function () {
    return view('advance-search');
})->name('advance-search');
Route::get('/help', function () {
    return view('help');
})->name('help');

Route::get('/plant/{plant}', [PlantController::class , 'show'])->name('plant.show');

Route::get('/plant-demo', function () {
    $plant = (object) [
        'species' => 'Datura innoxia Mill.',
        'family' => 'Solanaceae',
        'genus' => 'Datura',
        'sanskrit_name' => 'Dhattura',
        'synonyms' => '<em>Datura velutinosa</em> V.R. Fuentes in Revista Jard. Bot. Nac. Univ. Habana 1: 53 (1980 publ. 1981)',
        'etymology' => '<strong>Datura</strong> – vernacular East Indian name<br><strong>innoxia</strong> – harmless, not having prickles',
        'image' => 'images/datura_innoxia.jpg'
    ];
    return view('plants.plant-detail', compact('plant'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Search route
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    
    // Plant routes for authenticated users
    Route::get('/plants', [PlantController::class, 'index'])->name('plants.index');
    Route::get('/plants/{plant}', [PlantController::class, 'show'])->name('plants.show');
    
    // Query routes for all authenticated users
    Route::get('/queries', [QueryController::class, 'index'])->name('queries.index');
    Route::get('/queries/create', [QueryController::class, 'create'])->name('queries.create');
    Route::post('/queries', [QueryController::class, 'store'])->name('queries.store');
    Route::get('/queries/{query}', [QueryController::class, 'show'])->name('queries.show');
    
    // Routes for botanists
    Route::middleware('role:botanist')->group(function () {
        // Route::get('/plants/create', [PlantController::class, 'create'])->name('plants.create');
        // Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');
        // Route::get('/plants/{plant}/edit', [PlantController::class, 'edit'])->name('plants.edit');
        // Route::put('/plants/{plant}', [PlantController::class, 'update'])->name('plants.update');
        
        // Botanists can resolve assigned queries
        Route::get('/queries/{query}/resolve', [QueryController::class, 'resolve'])->name('queries.resolve');
        Route::put('/queries/{query}/resolution', [QueryController::class, 'updateResolution'])->name('queries.update-resolution');
    });
    
    // Routes for reviewers
    Route::middleware('role:reviewer')->group(function () {
        Route::get('/plants/pending', [PlantController::class, 'pending'])->name('plants.pending');
        Route::put('/plants/{plant}/approve', [PlantController::class, 'approve'])->name('plants.approve');
        Route::put('/plants/{plant}/reject', [PlantController::class, 'reject'])->name('plants.reject');
    });
    
    // Routes for administrators
    Route::middleware('role:administrator')->group(function () {
        // Admin dashboard
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Plant management
        Route::delete('/plants/{plant}', [PlantController::class, 'destroy'])->name('plants.destroy');
        
        // User management
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
        Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
        Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
        
        // Role management
        Route::get('/admin/roles', [AdminController::class, 'roles'])->name('admin.roles');
        Route::get('/admin/roles/create', [AdminController::class, 'createRole'])->name('admin.roles.create');
        Route::post('/admin/roles', [AdminController::class, 'storeRole'])->name('admin.roles.store');
        Route::get('/admin/roles/{role}/edit', [AdminController::class, 'editRole'])->name('admin.roles.edit');
        Route::put('/admin/roles/{role}', [AdminController::class, 'updateRole'])->name('admin.roles.update');
        Route::delete('/admin/roles/{role}', [AdminController::class, 'destroyRole'])->name('admin.roles.destroy');
        
        // Query management
        Route::get('/queries/{query}/assign', [QueryController::class, 'assign'])->name('queries.assign');
        Route::put('/queries/{query}/assignment', [QueryController::class, 'updateAssignment'])->name('queries.update-assignment');
    });
});

require __DIR__.'/auth.php';
