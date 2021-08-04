<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::post('/imgtest', [UserController::class ,'imagetest']);


Route::get('/', [UserController::class, 'index']);

Route::get("/getinfo", [UserController::class, 'getinfo']);

Route::get('/signup', [UserController::class, 'signup']);

Route::get('/forgot', [UserController::class, 'forgot']);

Route::get('/Home', [UserController::class, 'home']);

Route::get('/Profile/{id}', [UserController::class, 'profile']);

Route::get('/messages', [UserController::class, 'messages']);

Route::get('/location', [UserController::class, 'location']);

Route::get('/notifications', [UserController::class, 'notifications']);

Route::get('/settings', [UserController::class, 'settings']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/search', [UserController::class, 'search']);

Route::get('/searchbyname/{Name}', [UserController::class, 'searchbyname']);

Route::get('/getFriendReq/{id}', [UserController::class, 'getFriendReq']);

Route::post('/sendrequest', [UserController::class, 'sendrequest']);

Route::post('/cancelfriendorfriendreq', [UserController::class, 'removefriend']);

Route::post('/acceptreq', [UserController::class, 'acceptreq']);

Route::post('/forgotpassword', [UserController::class, 'forgotpassword']);

Route::post('/Home', [UserController::class, 'authenticate']);

Route::post('/Login', [UserController::class, 'signupauthentication']);

Route::post('Settings/verify', [UserController::class, 'settingsverifyuser']);

Route::post('/settings/changename', [UserController::class, 'changename']);

Route::post('/settings/changebio', [UserController::class, 'changebio']);

Route::post('/settings/changePP', [UserController::class, 'changePP']);

Route::post('/settings/changeMP', [UserController::class, 'changeMP']);

Route::post('/settings/changeFP', [UserController::class, 'changeFP']);

Route::get('/settings/deleteaccount', [UserController::class, 'deleteaccount']);

Route::get('/datatestajax', [UserController::class, 'ajaxtest']);

Route::post('/dataposttest', [UserController::class, 'ajaxtestpost']);

Route::post('/ForgotPasswordUsername', [UserController::class, 'forgotpassworduserauth']);

Route::post('/ForgotPasswordQuestion', [UserController::class, 'forgotpasswordQuesauth']);

Route::post('/updatepass', [UserController::class, 'updatepass']);

Route::get('/getUserData/{id}', [UserController::class, 'getUserData']);

Route::get('/test', function () {
    return view('Test');
});


Route::get('/messages/getFriends', [UserController::class, 'getFriends']);

Route::post('/messages/getChat', [UserController::class, 'getChat']);

Route::post('/messages/sendMessage', [UserController::class, 'sendmessage']);

Route::get('/Home/getPost', [UserController::class, 'getPost']);

Route::post('/Home/addPost', [UserController::class, 'addPost']);
