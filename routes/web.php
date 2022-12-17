<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\AuthController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/home', [DonorController::class, 'home'])->name('home');

Route::get('/create', [DonorController::class, 'create'])->name('create');

Route::post('/store', [DonorController::class, 'store'])->name('store');

// Route::get('/list', [DonorController::class, 'list'])->name('list');

// Route::get('/detail/{id}', [DonorController::class, 'detail'])->name('detail');

// Route::get('/destroy/{id}', [DonorController::class, 'destroy'])->name('destroy');



// Route::prefix('student')
//     ->name('student.')
//     ->controller(DonorController::class)
//     ->group(function () {
//         Route::get('/', 'index')->name('index'); // halaman index
//         Route::get('/show/{student}', 'show')->name('show');
//         Route::get('/edit/{student}', 'edit')->name('edit');
//         Route::get('/create', 'create')->name('create');
//         Route::post('/store', 'store')->name('store');
//         Route::put('/update/{student}', 'update')->name('update');
//         Route::delete('/destroy/{student}', 'destroy')->name('destroy');
//     });


Route::middleware(['withAuth'])->prefix('donor')
    ->controller(DonorController::class)
    ->name('donor.')->group(
        function () {

            Route::get('/list', 'list')->name('list');

            Route::get('/detail{id}', 'detail')->name('detail');

            Route::post('/destroy', 'destroy')->name('destroy');
        }

    );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['withAuth'])->name('dashboard');


Route::any("/login", [AuthController::class, "login"])
    ->name('login')
    ->middleware(["noAuth"]);

Route::any("/logout", [AuthController::class, "logout"])
    ->name('logout')
    ->middleware(["withAuth"]);
