<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Country;
use App\Services\Dialogue\Dialogue;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return Dialogue::send_response(true, '', Country::orderBy('country_name', 'asc')->get());
    }
}
