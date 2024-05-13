<?php

use Inertia\Inertia;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoltController;
use App\Http\Controllers\MediaController;

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

Route::get('t', function () {

});

Route::redirect('/', 'sobre');
Route::get('sobre', function () {
    return inertia('Sobre');
})->name('sobre');

include('route-manual.php');

Route::get('pagina-exemplo', function () {
    return Inertia::render('PaginaExemplo', [
        'message' => \Illuminate\Foundation\Inspiring::quote()
    ]);
});

Route::get('volts/order-by/{column}', [VoltController::class, 'orderBy'])->name('volts.orderby');

Route::resource('volts', VoltController::class);
Route::put('volts', function () {
    return back();
})->name('volts.filter')->middleware('keeper');
Route::put('volts/{volt}/ativar', [VoltController::class, 'ativar'])->name('volts.ativar');
Route::put('volts/{volt}/inativar', [VoltController::class, 'inativar'])->name('volts.inativar');
Route::put('volts/{volt}/toggle-status', [VoltController::class, 'toggleStatus'])->name('volts.toggle-status');
Route::put('volts/{volt}/toggle-importante', [VoltController::class, 'toggleImportante'])->name('volts.toggle-importante');
Route::post('volts/upload', [VoltController::class, 'upload'])->name('volts.upload');

Route::delete('medias/{media}', [MediaController::class, 'destroy'])->name('medias.destroy');

Route::get('message', function () {
    flash()->success(\Illuminate\Foundation\Inspiring::quote());
    return redirect()->back();
});

Route::resource('times', TimeController::class);
Route::get('times', function () {
    return Inertia::render('Times');
});




