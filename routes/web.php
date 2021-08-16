<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');  

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/recipes', [HomeController::class, 'recipes'])->name('recipes');
    Route::get('/for-grown-ups', [HomeController::class, 'adults'])->name('adults');

    // Characters
    Route::group(['prefix' => '/characters'], function() {
        Route::get('', [CharacterController::class, 'index'])->name('characters');
        Route::get('/{character}', [CharacterController::class, 'show'])->name('character');
    });

    // Profile
    Route::group(['prefix' => '/profile'], function() {
        Route::get('', [ProfileController::class, 'index'])->name('profile');
        Route::group(['prefix' => '/{user}'], function() {
            Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::put('/edit', [ProfileController::class, 'update']);
            Route::get('/avatar', [ProfileController::class, 'editAvatar'])->name('profile.avatar');
            Route::put('/avatar', [ProfileController::class, 'updateAvatar']);
        });
        Route::delete('', [ProfileController::class, 'delete'])->name('profile.delete');
    });

    // Games
    Route::get('/game', [GameController::class, 'index'])->name('game');
    Route::group(['prefix' => '/game/locations'], function() {
        Route::get('', [LocationController::class, 'index'])->name('locations');
        Route::group(['prefix' => '/{location:slug}'], function() {
            Route::get('', [LocationController::class, 'show'])->name('locations.show');
            Route::group(['prefix' => '/meals'], function() {
                Route::get('', [LocationController::class, 'getMeals'])->name('location.meals');
                Route::get('/{meal:id}', [LocationController::class, 'getMeal'])->name('location.meals.show');
            });
            Route::group(['prefix' => '/quiz'], function() {
                Route::get('', [QuizController::class, 'index'])->name('location.quiz');
                Route::post('', [QuizController::class, 'store']);
            });
        });
    });
});

require __DIR__.'/auth.php';
