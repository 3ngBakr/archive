<?php

use App\Http\Controllers\FrontEnd\BlogController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\DownloadController;
use App\Http\Controllers\FrontEnd\OrderController;
use App\Http\Controllers\FrontEnd\PagesController;
use App\Http\Controllers\FrontEnd\ProgramController;
use App\Http\Controllers\FrontEnd\SearchController;
use App\Http\Controllers\FrontEnd\ServiceController;
use App\Http\Controllers\FrontEnd\BageController;
use App\Http\Controllers\FrontEnd\SocialController;

use Illuminate\Support\Facades\Route;

Route::get('/hh', [PagesController::class, 'index'])->name('home');

