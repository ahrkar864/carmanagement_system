<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;

Route::get('/select2', function () {
    return view('layouts.select2');
});



Route::get('/', function () {
    return redirect('admins/login');

});



Route::get('/home', function () {
    return redirect()->route('admins.home');
});

// Route::get('/branches', function () {
//     return view('branches.index');
// })->name('branches.index');



Route::resource('admin/branches', BranchController::class);

Route::resource('admin/departments', DepartmentController::class);

Route::resource('admin/positions', PositionController::class);

Route::get('admin/roles', [RoleController::class, 'index'])->name('roles.index');

Route::get('admin/permissions', [PermissionController::class, 'index'])->name('permissions.index');

// Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
Route::resource('admin/users', UserController::class);
