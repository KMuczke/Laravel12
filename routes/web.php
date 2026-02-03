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
    });


Route::middleware(['auth'])->group(function () {

    Route::get('/projects', function () {
        return redirect()->route('admin.projects.index');
    })->name('projects.index');

    Route::get('/projects/create', function () {
        return redirect()->route('admin.projects.create');
    })->name('projects.create');

    Route::get('/projects/{project}', function ($project) {
        return redirect()->route('admin.projects.show', $project);
    })->name('projects.show');

    Route::get('/projects/{project}/edit', function ($project) {
        return redirect()->route('admin.projects.edit', $project);
    })->name('projects.edit');

    Route::delete('/projects/{project}', function ($project) {
        return redirect()->route('admin.projects.destroy', $project);
    })->name('projects.destroy');
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
