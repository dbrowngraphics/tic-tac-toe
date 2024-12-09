<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Tictactoe;

Route::get('/', function () {
    return view('welcome');
});

Route::get('play-game', Tictactoe::class);
