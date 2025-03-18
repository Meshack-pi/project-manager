<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Http\Controllers\RoadMap\DataController;
use App\Http\Controllers\Auth\OidcAuthController;
use App\Filament\Resources\OutputResource\Pages\OutputActivities;
use App\Http\Controllers\ProjectViewController;
use App\Filament\Resources\ProjectResource\Pages\ProjectDetails;



Route::get('/projects/{project}/viewproject', [ProjectViewController::class, 'show'])->name('projects.view');
// Validate an account
Route::get('/validate-account/{user:creation_token}', function (User $user) {
    return view('validate-account', compact('user'));
})
    ->name('validate-account')
    ->middleware([
        'web',
        DispatchServingFilamentEvent::class
    ]);

    Route::name('filament.resources.outputs.')
        ->prefix(config('filament.path'))
        ->middleware(config('filament.middleware.base'))
        ->group(function () {
            Route::get('/outputs/{output}/activities', OutputActivities::class)->name('activities');
        });
// Login default redirection
Route::redirect('/login-redirect', '/login')->name('login');

// Road map JSON data
Route::get('road-map/data/{project}', [DataController::class, 'data'])
    ->middleware(['verified', 'auth'])
    ->name('road-map.data');

Route::name('oidc.')
    ->prefix('oidc')
    ->group(function () {
        Route::get('redirect', [OidcAuthController::class, 'redirect'])->name('redirect');
        Route::get('callback', [OidcAuthController::class, 'callback'])->name('callback');
    });
