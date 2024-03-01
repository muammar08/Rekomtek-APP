<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratAirController;
use App\Http\Controllers\SuratSirtuController;
use App\Http\Controllers\SKController;

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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::group(['middleware' => 'auth'], function () {

    // Route::get('/beranda', function () {
    //     return view('beranda');
    // })->name('beranda');

    Route::get('/beranda', [SKController::class, 'beranda'])->name('beranda');

    Route::get('/suratrekom', function () {
        return view('suratrekomtek');
    });

    Route::get('/izinpengelolaanair', [SuratAirController::class, 'pageIzinAir']);
    Route::post('/izinpengelolaanairup', [SuratAirController::class, 'izinAir'])->name('uploadIzinAir');

    Route::get('/perpanjanganpengelolaanair',[SuratAirController::class,'pagePerpanjanganAir']);
    Route::post('/perpanjanganpengelolaanairup',[SuratAirController::class,'perpanjanganAir'])->name('uploadPjAir');

    Route::get('/izinpengelolaansirtu', [SuratSirtuController::class, 'pageIzinSirtu']);
    Route::post('/izinpengelolaansirtuup', [SuratSirtuController::class, 'izinSirtu'])->name('uploadIzinSirtu');

    Route::get('/perpanjanganpengelolaansirtu',[SuratSirtuController::class,'pagePerpanjanganSirtu']);
    Route::post('/perpanjanganpengelolaansirtuup',[SuratSirtuController::class,'perpanjanganSirtu'])->name('uploadPjSirtu');

    Route::get('/arsipsurat', function () {
        return view('arsipsurat');
    });
    Route::get('/arsipair',[SuratAirController::class,'show']);
    Route::get('/searchair', [SuratAirController::class, 'search']);
    Route::get('/detailsuratair{is}',[SuratAirController::class,'showDetail']);
    Route::get('/downloadword/{word}',[SuratAirController::class,'downloadword']);
    Route::get('/downloadpdf/{pdf}',[SuratAirController::class,'downloadpdf']);

    Route::get('/arsipsirtu',[SuratSirtuController::class,'show']);
    Route::get('/searchsirtu', [SuratSirtuController::class, 'search']);
    Route::get('/detailsuratsirtu{is}',[SuratSirtuController::class,'showDetail']);
    Route::get('/downloadword/{word}',[SuratSirtuController::class,'downloadword']);
    Route::get('/downloadpdf/{pdf}',[SuratSirtuController::class,'downloadpdf']);

    Route::get('/updateSK', [SKController::class, 'getData']);
    Route::post('/SKupdate', [SKController::class, 'update'])->name('skupdate');
    Route::get('/addtimrekom', [SKController::class, 'pageAddTim'])->name('addTimRekom');
    Route::post('/SKstore', [SKController::class, 'store'])->name('skstore');
    Route::get('/excel', [SKController::class, 'excel'])->name('excel');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    
    // Route::get('/view/{is}',[PageController::class,'view']);
});
