<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AreAController;
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
//Rutas para los folios
Route::middleware('auth')->group(function () {
    Route::get('/crear-folio', [FolioController::class, 'create'])->name('folio.create');
    Route::post('/guardar-folio', [FolioController::class, 'store'])->name('folio.store');
    Route::get('/folios/{folio}', [FolioController::class, 'show'])->name('folios.show');
    Route::get('/mis-folios', [FolioController::class, 'misFolios'])->name('folio.index');
});

//Rutas para los tickets
Route::middleware('auth')->group(function () {
    Route::get('/inbox', [TicketController::class, 'index'])->name('ticket.index');
    Route::post('/store-tck', [TicketController::class, 'store'])->name('ticket.store');

});

Route::middleware('checkRole:Administrador')->group(function () {
    Route::get('/index-folios', [FolioController::class, 'index'])->name('folio.index');
});
//Rutas para las áreas
Route::middleware('checkRole:Administrador')->group(function () {
    Route::get('/areas', [AreaController::class, 'index'])->name('area.index');
    Route::post('/area/guardar', [AreaController::class, 'store'])->name('area.store');
    Route::put('/editar-area/{id}', [AreaController::class, 'update'])->name('area.update');
    Route::delete('/areas/{area_id}', [AreaController::class, 'destroy'])->name('areas.destroy');
});


Route::get('/poblacion', function () {
    return view('rppc.tickets.ticket-inbox');
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
