<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DemoChatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/send-message', [ChatController::class,"send"]);
Route::post('friends',[ChatController::class,"friends"]);
Route::get('friendsList/{id}',[ChatController::class,"friendsList"]);
Route::post('singleChat',[ChatController::class,"singleChat"]);
Route::get('messsageCount',[ChatController::class,"messsageCount"]);
Route::post('seenMessage',[ChatController::class,"seenMessage"]);
Route::get('allChats',[ChatController::class,"allChats"]);
Route::post('singleChatAll',[ChatController::class,"singleChatAll"]);
Route::post('deleteUserChat',[ChatController::class,"deleteChat"]);
Route::post('deleteAllChats',[ChatController::class,"deleteAll"]);

Route::post('updateMessage',[ChatController::class,"updateMessage"]);
Route::get('deleteMsg/{id}',[ChatController::class,"deleteMessage"]);
Route::post('starChat',[ChatController::class,"starChat"]);
Route::post('unstarChat',[ChatController::class,"unstarChat"]);
Route::post('archiveChat',[ChatController::class,"archiveChat"]);
Route::post('unArchiveChat',[ChatController::class,"unArchiveChat"]);
Route::post('deleteConv',[ChatController::class,"deleteConv"]);
Route::post('unreadConv',[ChatController::class,"unreadConv"]);
Route::post('readChat',[ChatController::class,"readChat"]);

// Chat Filters
Route::post('getArchiveChats',[ChatController::class,"getArchiveChats"]);
Route::post('getStarChats',[ChatController::class,"getStarChats"]);
Route::post('getUnreadChats',[ChatController::class,"getUnreadChats"]);

Route::post('fileShare',[ChatController::class,"fileSend"]);
Route::post('fileShares',[DemoChatController::class,"fileSend"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
