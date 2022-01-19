<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\PermissionRoleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAdminController;
use App\Http\Middleware\checkAdminLogin;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', [AdminLoginController::class, 'getLogin']);
Route::post('/postLogin', [AdminLoginController::class, 'postLogin']);
Route::get('/logout', [AdminLoginController::class, 'getLogout']);

Route::middleware(['admin'])->group(function () {
	Route::get('/', function() {
		return view('admin.welcome');
	});
	Route::get('/dashboard', [AdminLoginController::class, 'success']);
	Route::prefix('user')->group(function () {
		Route::get('/add', [UserAdminController::class, 'add']);
		Route::post('/store', [UserAdminController::class, 'store']);
		Route::get('/list', [UserAdminController::class, 'list']);
		Route::get('/show/{id}', [UserAdminController::class, 'show']);
		Route::get('/profile/{id}', [UserAdminController::class, 'profile']);
		Route::put('/update/{id}', [UserAdminController::class, 'update']);
		Route::get('/delete/{id}', [UserAdminController::class, 'delete']);
		Route::put('/update-role/{id}', [UserAdminController::class, 'update_role']);
	});
	Route::prefix('post')->group(function () {
		Route::get('/add', [PostController::class, 'add']);
		Route::post('/store', [PostController::class, 'store']);
		Route::get('/list', [PostController::class, 'list']);
		Route::get('/show/{id}', [PostController::class, 'show']);
		Route::get('/edit/{id}', [PostController::class, 'edit']);
		Route::put('/update/{id}', [PostController::class, 'update']);
		Route::get('/delete/{id}', [PostController::class, 'delete']);
	});
	Route::prefix('permission')->group(function () {
		Route::get('/view', [PermissionRoleController::class, 'view_permission']);
		Route::post('/add-role', [PermissionRoleController::class, 'add_role']);
		// Route::post('/store', [PermissionRoleController::class, 'permission_role']);
		Route::get('/edit/{id}', [PermissionRoleController::class, 'permission_edit']);
		Route::put('/update/{id}', [PermissionRoleController::class, 'permission_update']);
	});
});