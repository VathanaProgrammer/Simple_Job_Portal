<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/sign-up", [HomeController::class, "sign_up"])->name("sign_up");
Route::post("/sign-up", [HomeController::class, "store"])->name("create_account");
Route::get("/sign_in", [HomeController::class, "show_login_form"])->name("login_form");
Route::post("/sign_in", [HomeController::class, "login"])->name("login");
Route::post("/logout", [HomeController::class, "logout"])->name("logout");
