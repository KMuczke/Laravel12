<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Open\ProjectController as OpenProjectController;


Route::get('/', function () {
    return view('layouts.layoutpublic');
})->name('home');

Route::get('/projects', [OpenProjectController::class, 'index'])
    ->name('open.projects.index');


Route::prefix('admin')
    ->middleware('role:student|teacher|admin')
    ->group(function () {
        Route::resource('projects', AdminProjectController::class)
            ->names('projects');
        Route::get('projects/{project}/delete', [AdminProjectController::class, 'delete'])
            ->name('projects.delete');
    });


Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::middleware(['auth'])->group(function () {

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)
        ->name('settings.profile');

    Route::get('settings/password', Password::class)
        ->name('settings.password');

    Route::get('settings/appearance', Appearance::class)
        ->name('settings.appearance');
});

require __DIR__ . '/auth.php';
