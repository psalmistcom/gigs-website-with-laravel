<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //display all listing 
    public function index() 
    {
        // dd(request('tag'));
        return view('listings.index', [
            'listings'=> Listing::latest()->filter(request(['tag']))->get()
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing'=> $listing
        ]);
    }
}
