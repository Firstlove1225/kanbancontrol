<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->to(route('filament.admin.pages.dashboard'));
});
