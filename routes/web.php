<?php

use App\Models\Country;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome')->with(["countries" => Country::orderBy('country_name', 'asc')->get()]);
});
