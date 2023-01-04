<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //display all listing 
    public function index()
    {
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            "title" => "required",
            "company" => ["required", Rule::unique('listings', 'company')],
            "email" => ["required", "email"],
            "website" => "required",
            "location" => "required",
            "tags" => "required",
            "description" => "required"
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing added successfully');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            "title" => "required",
            "company" => ["required"],
            "email" => ["required", "email"],
            "website" => "required",
            "location" => "required",
            "tags" => "required",
            "description" => "required"
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        return back()->with('message', 'Listing updated successfully');
    }
}
