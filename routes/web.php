<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\ProcesoController;
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

//

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/documentos', DocumentoController::class);
Route::resource('/tipo_documentos', TipoDocumentoController::class);
Route::resource('/procesos', ProcesoController::class);
Route::get('/api/procesos', [App\Http\Controllers\ProcesoController::class, 'traerProcesos'])->name('home');
Route::get('/api/tipos', [App\Http\Controllers\TipoDocumentoController::class, 'traerTipos'])->name('home');
Route::get('/api/traer_documentos', [App\Http\Controllers\DocumentoController::class, 'traerDocumentos'])->name('home');
Route::post('/api/eliminar_documento', [App\Http\Controllers\DocumentoController::class, 'eliminarDocumento'])->name('home');
Route::get('/api/getDocumento', [App\Http\Controllers\DocumentoController::class, 'getDocumento'])->name('home');
Route::post('/api/editar_documento', [App\Http\Controllers\DocumentoController::class, 'editarDocumento'])->name('home');