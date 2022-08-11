<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    //Show all Listings
    public function index() {
        return view('Listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //show single listing
    public function show(Listing $listing) {
        return view('Listings.show', [
        'listing' => $listing
    ]);
    }

    //show create form
    public function create(){
        return view('Listings.create');
    }

    //store listing data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'size' => 'required',
            'website' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        //Email is the same as the user email without input
        $formFields['email'] = auth()->user()->email;

        //Set user ownership ID
        $formFields['user_id'] = auth()->id();

        //Set Original tags to match user input of brand, Model, Colorway/Nickname
        $formFields['tags'] = $formFields['title'] . "," . $formFields['company']. "," . $formFields['location'];

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    //update listing data
    public function update(Request $request, Listing $listing){

        //Make sure logged in user is owner
        if(auth()->user()->idAdmin != 1){
            if($listing->user_id != auth()->id()) {
                abort(403, 'Unauthorized action');
            }
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'size' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }


        $listing->update($formFields);

        return redirect('listings/manage')->with('message', 'Listing updated successfully!');
    }

    //show edit form
    public function edit(Listing $listing) {
        return view('Listings.edit', ['listing' => $listing ]);
    }

    //Delete Listing
    public function destroy(Listing $listing) {
        //Make sure logged in user is owner
        if(auth()->user()->idAdmin != 1){
            if($listing->user_id != auth()->id()) {
                abort(403, 'Unauthorized action');
            }
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    //Manage Listings
    public function manage() {
        return view('Listings.manage', 
        ['listings' => auth()->user()->listings()->get()], 
        ['allListings' => Listing::latest()->paginate(6)]);
    }
}
