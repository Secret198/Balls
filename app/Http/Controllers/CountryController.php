<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function show(): View
    {
        $countries = Country::select("id", "name")->get();
        return view('search', compact("countries"));
    }
}
