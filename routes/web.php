<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/set-locale', [ProfileController::class, 'setLocaleDefault'])->name('set_locale');

Route::middleware(['auth'])->as('admin.')->group(function ()
{
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/inspections/index', App\Livewire\Inspection\Index::class)->name('inspections.index');
    Route::get('/inspections/create', App\Livewire\Inspection\Create::class)->name('inspections.create');
    Route::get('/inspections/edit/{inspection}', App\Livewire\Inspection\Edit::class)->name('inspections.edit');
});


require __DIR__.'/auth.php';
