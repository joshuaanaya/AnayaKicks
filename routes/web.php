<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\http\Controllers\ListingController;
use App\Http\Controllers\userController;
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
// All Listings
Route::get('/', [App\Http\Controllers\ListingController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [App\Http\Controllers\ListingController::class, 'create'])->middleware('auth');

//Store Listing Data
Route::post('/listings', [App\Http\Controllers\ListingController::class, 'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit', [App\Http\Controllers\ListingController::class, 'edit'])->middleware('auth');

//Update Listings
Route::put('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [App\Http\Controllers\ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store']);

//Show Register/Create Form
Route::get('/login', [UserController::class, 'login'])->name('login');

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

