<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use FamilyTree365\LaravelGedcom\Facades\GedcomParserFacade;


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
    return view('pages.test');
});

Route::get('/users',[AppController::class,'usersPage']);


Route::prefix('api')->group(function (){
    Route::prefix('sdt')->group(function (){
        Route::post('/users', [ApiController::class, 'sdtUsers']);
    });

    Route::prefix('delete')->group(function (){
        Route::delete('/users',[ApiController::class, 'deleteUsers']);
    });
});

Route::get('/import',function (){
    $filename = asset('/app-assets/gedcoms/JacquelineLapiere.ged');
    GedcomParserFacade::parse("",$filename,"", false);
    echo "done";
});
