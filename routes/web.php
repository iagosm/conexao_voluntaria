<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;

// Rotas de autenticação
Auth::routes();

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotas para Oportunidades (exigem autenticação)
Route::middleware(['auth'])->prefix('opportunities')->group(function () {
    Route::get('/', [OpportunityController::class, 'index'])->name('opportunities.index');
    Route::get('/create', [OpportunityController::class, 'create'])->name('opportunities.create');
    Route::post('/', [OpportunityController::class, 'store'])->name('opportunities.store');
    Route::get('/{id}', [OpportunityController::class, 'show'])->name('opportunities.show');
    Route::get('/{id}/edit', [OpportunityController::class, 'edit'])->name('opportunities.edit');
    Route::put('/{id}', [OpportunityController::class, 'update'])->name('opportunities.update');
    Route::delete('/{id}', [OpportunityController::class, 'destroy'])->name('opportunities.destroy');
});

// Rotas para Inscrições (exigem autenticação)
Route::middleware(['auth'])->prefix('applications')->group(function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/{id}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::get('/{id}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/{id}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
});
