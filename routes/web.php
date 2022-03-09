<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\DemoChatController;
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
Route::get('/',[HomeController::class,"home"]);
Route::post('/logins',[HomeController::class,"login"]);
Route::get('/checkout/{id}',[HomeController::class,"checkout"]);
Route::get('/logout',[HomeController::class,"logout"]);

Route::get('paywithpaypal',  [PaypalController::class,"payWithPaypal"]);
Route::post('paypal',  [PaypalController::class,"postPaymentWithpaypal"])->name('paypal');
Route::get('paypal-success', [PaypalController::class,"getPaymentStatus"])->name('status');
Route::get('paypal-cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel');
 Route::get('/dashboard', function () {
        return view('customer.index');
    })->name('home');

  
    Route::get('dashboard/profile', function () {
        return view('customer.profile');
    });
    Route::get('/demo/login', function () {
    return view('login');
});

Route::get('usersList/{id}',[DemoChatController::class,"usersList"]);
Route::post('send-message-chat', [DemoChatController::class,"sendMessage"]);
Route::post('add-friend',[DemoChatController::class,"addFriends"]);
Route::post('single-chat',[DemoChatController::class,"single_chat"]);
Route::get('/demo', [DemoChatController::class,"index"]);
Route::get('allChats',[DemoChatController::class,"allChats"]);
Route::post('singleChatAll',[DemoChatController::class,"singleChatAll"]);
Route::post('deleteUserChat',[DemoChatController::class,"deleteChat"]);
Route::post('deleteAllChats',[DemoChatController::class,"deleteAll"]);

Route::post('updateMessage',[DemoChatController::class,"updateMessage"]);
Route::get('deleteMsg/{id}',[DemoChatController::class,"deleteMessage"]);
Route::post('starChat',[DemoChatController::class,"starChat"]);
Route::post('unstarChat',[DemoChatController::class,"unstarChat"]);
Route::post('archiveChat',[DemoChatController::class,"archiveChat"]);
Route::post('unArchiveChat',[DemoChatController::class,"unArchiveChat"]);
Route::post('deleteConv',[DemoChatController::class,"deleteConv"]);
Route::post('unreadConv',[DemoChatController::class,"unreadConv"]);
Route::post('readChat',[DemoChatController::class,"readChat"]);

// Chat Filters
Route::post('getArchiveChats',[DemoChatController::class,"getArchiveChats"]);
Route::post('getStarChats',[DemoChatController::class,"getStarChats"]);
Route::post('getUnreadChats',[DemoChatController::class,"getUnreadChats"]);

Route::post('fileShare',[DemoChatController::class,"fileSend"]);

Route::get('logout',[DemoChatController::class,"logout"])->name('logout');
