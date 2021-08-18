<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks', [TaskController::class, 'index']);

Route::prefix('/task')->group( function(){
    Route::post   ('/store'       , [TaskController::class , 'store']);
    Route::put    ('/{id}'        , [TaskController::class , 'update']);
    Route::delete ('/{id}'        , [TaskController::class , 'destroy']);
    Route::put    ('/restore/{id}', [TaskController::class , 'restore']);
});

Route::get('/lists', [ListController::class, 'index']);

Route::prefix('/list')->group( function(){
    Route::post   ('/store'       , [ListController::class , 'store']);
    Route::put    ('/{id}'        , [ListController::class , 'update']);
    Route::delete ('/{id}'        , [ListController::class , 'destroy']);
    Route::put    ('/restore/{id}', [ListController::class , 'restore']);
});