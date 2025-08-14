<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SidebarController;

use App\Models\Sidebar;

Route::get('/', function () {
    $allimg = Sidebar::all();
    return view('welcome' , compact('allimg'));
});

Route::get('/adminHome',function () {;
    return view('admin.layouts.master');
});


