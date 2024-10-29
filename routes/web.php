<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


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


Route::get('/',[AdminController::class,'home']);

Route::get('/home',[AdminController::class,'index'])->name('home')->middleware('auth','admin');;

Route::get('/create_room',[AdminController::class,'create_room'])->middleware('auth','admin');;
Route::post('/add_room',[AdminController::class,'add_room'])->middleware('auth','admin');;
Route::get('/view_room',[AdminController::class,'view_room'])->middleware('auth','admin');;
Route::get('/delete_room/{id}',[AdminController::class,'delete_room'])->middleware('auth','admin');;
Route::get('/update_room/{id}',[AdminController::class,'update_room'])->middleware('auth','admin');;
Route::post('/edit_room/{id}',[AdminController::class,'edit_room'])->middleware('auth','admin');;

Route::get('/room_details/{id}',[HomeController::class,'room_details']);

Route::post('/add_booking/{id}',[HomeController::class,'add_booking']);

Route::get('/bookings',[AdminController::class,'bookings'])->middleware('auth','admin')->middleware('auth','admin');

Route::get('/delete_booking/{id}',[AdminController::class,'delete_booking'])->middleware('auth','admin');

Route::get('/approved_booking/{id}',[AdminController::class,'approved_booking'])->middleware('auth','admin');
Route::get('/declined_booking/{id}',[AdminController::class,'declined_booking'])->middleware('auth','admin');

Route::get('/view_gallery',[AdminController::class,'view_gallery'])->middleware('auth','admin');
Route::post('/upload_gallery',[AdminController::class,'upload_gallery'])->middleware('auth','admin');

Route::get('/delete_galleryimg/{id}',[AdminController::class,'delete_galleryimg'])->middleware('auth','admin');

Route::post('/contacts',[HomeController::class,'contacts']);

Route::get('/messages',[AdminController::class,'messages'])->middleware('auth','admin');

Route::get('/send_mail/{id}',[AdminController::class,'send_mail'])->middleware('auth','admin');
Route::post('/mail_noti/{id}',[AdminController::class,'mail_noti'])->middleware('auth','admin');

Route::get('/our_room',[HomeController::class,'our_room']);

Route::get('/hotel_gallery',[HomeController::class,'hotel_gallery']);

Route::get('/contact_us',[HomeController::class,'contact_us']);








