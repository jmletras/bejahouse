<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\ConcelhoController;
use App\Http\Controllers\LocalidadeController;

use App\Models\Imovel;
use App\Models\Localidade;

use Illuminate\Support\Facades\Route;

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

    $localidades = Localidade::select('nome_localidade', 'id')->has('imoveis')->orderBy('nome_localidade', 'ASC')->get();
    

    $imoveis = Imovel::select('*')->orderBy('id', 'desc')->take(6)->get();
    return view('index', compact('imoveis', 'localidades'));
});

Route::get('/contactos', function () {
    return view('contactos');
});


/*Route::resource('imoveis', ImovelController::class);*/

Route::get('/imoveis', [ImovelController::class, 'index']);
Route::get('/imoveis/create', [ImovelController::class, 'create'])->name('imoveis.create')->middleware('auth');
Route::post('/imoveis', [ImovelController::class, 'store'])->name('imoveis.store')->middleware('auth');
Route::get('/imoveis/{imovel}', [ImovelController::class, 'show'])->name('imoveis.show');

Route::get('/imoveis/{imovel}/edit', [ImovelController::class, 'edit'])->name('imoveis.edit')->middleware('auth');
Route::put('/imoveis/{imovel}', [ImovelController::class, 'update'])->name('imoveis.update')->middleware('auth');

Route::delete('/imoveis', [ImovelController::class, 'destroy'])->name('imoveis.destroy')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/distrito/{distrito}/concelho', [DistritoController::class, 'obterConcelhos']);
Route::get('concelho/{concelho}/localidade', [ConcelhoController::class, 'obterLocalidades']);
Route::get('localidade/{localidade}/codigo_postal', [LocalidadeController::class, 'obterCodigosPostais']);

Route::post('/enviar_contacto', [ImovelController::class, 'enviar_contacto']);
