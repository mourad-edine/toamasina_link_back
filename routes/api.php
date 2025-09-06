<?php

use App\Http\Controllers\Authuser\AuthController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\publication\PublicationController;
use App\Http\Controllers\utilisateur\UtilisateurController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//utilisateru
Route::get('/user' ,[UtilisateurController::class,'getUser']);
//publication

Route::post('/auth/login' ,[AuthController::class , 'login'])->name('user.login');
Route::post('/auth/send-verification-code' ,[AuthController::class , 'signin'])->name('user.signin');
Route::post('/auth/register' ,[AuthController::class , 'verification'])->name('user.register');
Route::delete('/auth/delete' ,[AuthController::class , 'logout'])->name('user.destroy')->middleware('auth:sanctum');

Route::get('/publication' ,[PublicationController::class,'getPost']);
//notification par user
Route::get('/notification/{id}' ,[NotificationController::class,'getNotification']);
