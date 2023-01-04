<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

/*
    COMMON RESOURCES ROUTES
    - index: Show all listings 
    - show: show single listings
    - create: Show form to create new listings 
    - store: save new listing to DB 
    - edit: Show form to edit listing 
    - Update: Update listing 
    - Delete: Delete listings
*/

Route::get('/', [ListingController::class, 'index']);
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//user controller
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);












// single listinng 
// Route::get('/listings/{id}', function($id){
//     return view('listing', [
//         'listing'=> Listing::find($id)
//     ]);
// });

// Route:: get('/hello', function () {
//     return "Hello World";
// });

// Route:: get('/test', function () {
//     return Response('Hello World')
//     ->header('content-type', 'application/json')
//     ->header('foo', 'bar')
//     ;
// });

// Route:: get('/post/{id}', function ($id){
//     return Response('Pose' . $id);     
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request){
//     return $request->name . ' ' . ' is in ' . $request->city;
// });