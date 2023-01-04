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

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        return redirect('/listings/manage')->with('message', 'Listing added successfully');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        //authorize user that want to update the listing
        if ($listing->user_id != auth()->id()) {
            abort(403, 'You are not authorized to update this listing');
        }
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

    public function delete(Listing $listing)
    {
        //authorize user that want to update the listing
        if ($listing->user_id != auth()->id()) {
            abort(403, 'You are not authorized to delete this listing');
        }

        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    public function manage()
    {
        // return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
        return view(
            'listings.manage',
            [
                'listings' => auth()->user()->listings()->latest()->get()
            ]
        );
    }
}
