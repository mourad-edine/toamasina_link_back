<?php

use App\Http\Controllers\Authuser\AuthController;
use App\Http\Controllers\commentaire\CommaentaireController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\publication\PublicationController;
use App\Http\Controllers\reaction\ReactionController;
use App\Http\Controllers\utilisateur\UtilisateurController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//utilisateru
Route::get('/user' ,[UtilisateurController::class,'getUser']);
Route::get('/user/{id}' ,[UtilisateurController::class,'getUserById']);
//publication

Route::post('/auth/login' ,[AuthController::class , 'login'])->name('user.login');
Route::post('/auth/send-verification-code' ,[AuthController::class , 'signin'])->name('user.signin');
Route::post('/auth/register' ,[AuthController::class , 'verification'])->name('user.register');
Route::delete('/auth/delete' ,[AuthController::class , 'logout'])->name('user.destroy');

Route::get('/publication' ,[PublicationController::class,'getPostAll']);
Route::post('/publication' ,[PublicationController::class,'createPost']);
Route::get('/publication/user/{id}' ,[PublicationController::class,'getPostByUser']);
Route::get('/publication/{id}' ,[PublicationController::class,'getpostId']);
//notification par user
Route::get('/notification/{id}' ,[NotificationController::class,'getNotification']);


//reaction
Route::post('/reaction_create' , [ReactionController::class,'createReaction']);
Route::get('/reaction/{id_publication}' , [ReactionController::class,'getReactionByPublication']);
Route::delete('/reaction_delete' , [ReactionController::class,'deleteReaction']);
//commentaire

Route::post('/commentaire_create' , [CommaentaireController::class,'createCommentaire']);
Route::get('/commentaire' , [CommaentaireController::class,'getCommentaire']);
Route::delete('/commentaire_delete/{id}' , [CommaentaireController::class,'deleteCommentaire']);