<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/users/show/{id}', [UsersController::class, 'show'])->name('show');

Route::get('/create', [UsersController::class, 'create'])->name('create');

Route::post('/store', [UsersController::class, 'store'])->name('store');

// Route::get('/list', [DonorController::class, 'list'])->name('list');

// Route::get('/detail/{id}', [DonorController::class, 'detail'])->name('detail');

// Route::get('/destroy/{id}', [DonorController::class, 'destroy'])->name('destroy');



Route::middleware(['withAuth'])->prefix('petugas')
    ->controller(DonorController::class)
    ->name('petugas.')->group(
        function () {
            Route::get('dashboard', 'index')->name('dashboard');

            Route::get('tambah', 'create')->name('tambah');

            Route::post('store', 'store')->name('store');

            Route::get('edit/{donors}', 'edit')->name('edit');

            Route::delete('destroy/{donors}', 'destroy')->name('destroy');

            Route::post('update/{donors}', 'update')->name('update');
        }

    );


Route::middleware(['usersAuth'])->prefix('users')
    ->controller(UsersController::class)
    ->name('users.')->group(
        function () {


            Route::get('dashboard', 'index')->name('dashboard');

            Route::post('update/{users}', 'update')->name('update');

            Route::get('edit/{users}', 'edit')->name('edit');
        }

    );

// Route::get('/users', function () {
//     return view('users.v_users');
// })->middleware(['withAuth'])->name('v_users');


Route::any("/login", [AuthController::class, "login"])
    ->name('login')
    ->middleware(["noAuth"]);

Route::any("/logout", [AuthController::class, "logout"])
    ->name('logout')
    ->middleware(["withAuth"]);
