<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventCreate;
use App\Http\Controllers\EventTeste;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventDelete;
use App\Http\Controllers\EventEdit;

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

Route::get('/', [EventController::class,'index']);
Route::get('/testevariavel',[EventTeste::class,'teste']);
Route::get('/event/create',[EventCreate::class,'createEvent'])->middleware('auth');
Route::get('/event/{id}',[EventCreate::class,'show']);
Route::post('/events', [EventController::class,'store']);
Route::delete('/events/{id}', [EventDelete::class,'destroy']);
Route::get('event/edit/{id}',[EventEdit::class, 'edit'])->middleware('auth');
Route::post('/event/update/{id}',[EventEdit::class,'update'])->middleware('auth');

Route::get('/produtos',function(){

    $busca = request('search');
    return view('product',['busca' =>$busca]);
});

Route::get('/products/{id}', function($id){
    return view('product',['id' => $id]);
});

Route::get('/products_teste/{id?}', function($id = null){
    return view('product',['id' => $id]);
});

Route::get('/dashboard', [EventController::class,'dashboard'])->middleware('auth');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
