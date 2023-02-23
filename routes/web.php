<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;



Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
	$userCount = User::count();
	return view('back-end.dashboard',compact('userCount'));
})->name('dashboard');
