<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\BackEnd\BageController;
use App\Http\Controllers\BackEnd\BlogController;
use App\Http\Controllers\BackEnd\MainController;
use App\Http\Controllers\BackEnd\RoleController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\OrderController;
use App\Http\Controllers\BackEnd\SocialController;
use App\Http\Controllers\BackEnd\ContactController;
use App\Http\Controllers\BackEnd\PartnerController;
use App\Http\Controllers\BackEnd\ProgramController;
use App\Http\Controllers\BackEnd\ServiceController;
use App\Http\Controllers\BackEnd\DocumentController;
use App\Http\Controllers\BackEnd\PermissionController;
use App\Http\Controllers\BackEnd\DocumentTypeController;

Route::get('/', function () {
	$userCount = User::count();
	return view('back-end.dashboard' ,compact('userCount'));
})->name('dashboard');

Route::middleware('role:super-admin|admin')->group(function () {
	// Users
	Route::resource('users', UserController::class)->except('show');

	// Roles
	Route::resource('roles', RoleController::class)->except('show');

	// Permissions
	Route::resource('permissions', PermissionController::class)->only(['index', 'store']);

	// Documents
	Route::get('documents/download/{media}', [DocumentController::class, 'download'])->name('documents.download');
	Route::resource('downloads', DocumentController::class)
	     ->names('documents')->parameter('downloads', 'document')->except('show');

	// Document Types
	Route::resource('doc-types', DocumentTypeController::class)
	     ->names('document_types')->parameter('doc-types', 'document_type');



});
