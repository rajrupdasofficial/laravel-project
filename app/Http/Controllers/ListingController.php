<?php

namespace App\Http\Controllers;
use App\Models\Listing;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all lisitngs
    public function index(){
        //dd(request('tag'));
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag'])) ->get()
        ]);
    

    }
    //show single listings
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }
}
