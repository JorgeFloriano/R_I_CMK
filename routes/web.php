<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TecModelController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/table', [HomeController::class, 'table'])->name('table');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'destroy')->name('login.destroy');
});

Route::middleware('checksession')->group(function(){
    Route::get('/home', 'MainController@programacao')->name('programacao');
    Route::get('/relatorios', 'MainController@relatorios')->name('relatorios');

    Route::get('/equip', 'EquipController@equip')->name('equip');
    Route::get('/desat_list', 'EquipController@desat_list')->name('desat_list');

    Route::get('/new_equip', 'EquipController@new_equip')->name('new_equip');
    Route::post('/new_equip_submit', 'EquipController@new_equip_submit')->name('new_equip_submit');

    Route::get('/edit_equip/{id}', 'EquipController@edit_equip')->name('edit_equip');
    Route::post('/edit_equip_submit', 'EquipController@edit_equip_submit')->name('edit_equip_submit');

    Route::get('/desat_equip/{id}', 'EquipController@desat_equip')->name('desat_equip');
    Route::get('/ativ_equip/{id}', 'EquipController@ativ_equip')->name('ativ_equip');

    Route::get('/relat_form/{id}', 'RelatController@relat_form')->name('relat_form');
    Route::get('/relat_show/{id}', 'RelatController@relat_show')->name('relat_show');

    Route::post('/relat_form_submit', 'RelatController@relat_form_submit')->name('relat_form_submit');

    Route::resource('tec_models', TecModelController::class);
});

//------------------------------------------------------------------
Route::get('/teste', 'RelatController@teste')->name('teste');

//-------------------------------------------------------------------

Route::get('/pdfteste', function (){
    $pdf = Pdf::loadView('login')->setOptions(['defaultFont' => 'sans-serif']);
    return $pdf->stream('teste.pdf');
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});