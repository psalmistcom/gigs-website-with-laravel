<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
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
Route::get('/listings/{listing}', [ListingController::class, 'show']);
Route::get('/listings/create', [ListingController::class, 'create']);












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