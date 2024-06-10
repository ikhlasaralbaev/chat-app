<?php

use App\Http\Controllers\Api\AuthController\AuhtController;
use App\Http\Controllers\Api\RoleController\RoleController;
use App\Http\Controllers\Api\UserController\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/auth')->name("auth.")->group(function() {
    Route::post("/register", [AuhtController::class, "register"]);
    Route::post("/login", [AuhtController::class, "login"]);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get("/profile", [AuhtController::class, "getme"]);
    });
});


Route::group(['middleware' => ['auth:sanctum', "role:admin"]], function () {
    Route::get("/users",[UserController::class, "index"]);
    Route::delete("/users/{id}",[UserController::class, "destroy"]);
    Route::apiResource('/roles', RoleController::class);
});