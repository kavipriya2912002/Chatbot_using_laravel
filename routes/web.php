<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotmanController;

Route::get('/', function () {
    return view('botman-welcome');
});

Route::match(['get', 'post'], '/botman', [BotmanController::class, 'index']);
