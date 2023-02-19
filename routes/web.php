<?php

use App\Http\Controllers\ListingController;
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
//Common Resource Routes:
//index - Show all listings:

//show - Show single listing:

//create - show form to create new listing:

//store - Store new listing:

//edit - Show from to edit listing:

//update - Update Listing:

//destroy - Delete listing:

Route::get('/', [ListingController::class, 'index']);



//Show Create  from
Route::get('/listings/create',[ListingController::class,'create']);
//Store listing data
Route::post('/listings',[ListingController::class, 'store']);


//single listing
Route::get('/listings/{listing}', [ListingController::class, 'show' ]);

