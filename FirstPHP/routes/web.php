<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SidebarController;

use App\Models\Sidebar;

Route::get('/', function () {
    $allimg = Sidebar::all();
    return view('welcome' , compact('allimg'));
});

Route::get('/adminHome',function () {
    $allimg = Sidebar::all();
    return view('admin.adminHome', compact('allimg'));
});


Route::post('/adminHome', [SidebarController::class ,'addslidebarimge'])->name("addslidebarimge");
Route::delete('/adminHome/{id}', [SidebarController::class ,'deletslidebarimge'])->name("sidebar.destroy");