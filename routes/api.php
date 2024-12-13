<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\SATQController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/satq/token', [SATQController::class,'obtenerToken'])->name('satq.token');
Route::get('/satq/concepto/{token}/{referencia}', [SATQController::class,'obtenerConceptosPagados'])->name('satq.conP');
Route::get('/satq/log/{conceptoId}/{token}', [SATQController::class,'obtenerConceptoLog'])->name('satq.conL');


Route::get('/folios', [FolioController::class, 'index1']);
Route::get('/folios-antecedentes', [FolioController::class, 'foliosAnt']);
Route::get('/cabezas-sector', [FolioController::class, 'getCabezasSector']);
Route::get('/dependencias/{cabezaSector}', [FolioController::class, 'getDependencias']);
Route::get('/delegaciones/{dependencia}', [FolioController::class, 'getDelegaciones']);
Route::get('/areas/{delegacion}', [FolioController::class, 'getAreas']);


// Ruta para obtener tickets filtrados por estado
Route::get('/tickets', [TicketController::class, 'getTickets']);

// Ruta para obtener detalles de un ticket específico por ID
Route::get('/tickets/{id}', [TicketController::class, 'getTicketById']);