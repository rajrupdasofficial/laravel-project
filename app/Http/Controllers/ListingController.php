<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Session\Session;

class ListingController extends Controller
{
    //Show all lisitngs
    public function index(){
        //dd(request('tag'));
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6) //we can also put simplePaginate for a simple pagination
        ]);
    

    }
    //show single listings
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }
    //Show create form
    public function create(){
        return view('listings.create');
    }

    //Show create data
    public function store(Request $request){
        $formFields = $request->validate([
            'title'=> 'required',
           // 'logo' => 'required|image|mimes:png,jpg,jpeg',
            'company'=>['required', Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required',   
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);
        //Session::flash('message',);

        return redirect('/')->with('message','Listing created successfully');
    }
    //show edut form
    public function edit(Listing $listing){
        return view('listings.edit', ['listing'=> $listing]);
    }


    //show update data
    public function update(Request $request, Listing $listing){
        $formFields = $request->validate([
            'title'=> 'required',
           // 'logo' => 'required|image|mimes:png,jpg,jpeg',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required',   
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        //Session::flash('message',);


        return back()->with('message','Listing updated successfully');
    }
    //delete listing
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message','Listing delete success');
    }
}
