<?php

use Illuminate\Http\Request;
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
    return view('welcome');
});

Route:: get('/hello', function () {
    return "Hello World";
});

Route:: get('/test', function () {
    return Response('Hello World')
    ->header('content-type', 'application/json')
    ->header('foo', 'bar')
    ;
});

Route:: get('/post/{id}', function ($id){
    ddd($id);
    return Response('Pose' . $id);     
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request){
    dd($request);
});