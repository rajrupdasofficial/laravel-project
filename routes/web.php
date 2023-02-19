<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

Route::get('/', function () {
    return view('listing',[
        'heading' => 'Latest Listing',
        'listings' => Listing::all()
    ]);

});

//single listing
Route::get('/listings/{id}', function($id){
    return view('list',[
        'listing' => Listing::find($id)
    ]);
});