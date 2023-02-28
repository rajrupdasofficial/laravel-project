<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');
//Store listing data
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

//show listing 
Route::get('listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('listings/{listing}',[ListingController::class,'update'])->middleware('auth');
//deleteListing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');
//Manage listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

//single listing
Route::get('/listings/{listing}', [ListingController::class, 'show' ]);

//show register create form
Route::get('/register/',[UserController::class,'register'])->middleware('guest');

//create new user
Route::post('/users',[UserController::class,'store']);

//logout
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//Route Login
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

//Login to User 
Route::post('/users/authenticate',[UserController::class,'authenticate']);

