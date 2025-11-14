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

    public function search(string $countryId): View{
        $country = Country::select("*")->where("countries.id", $countryId)->join('continents', 'countries.continent_id', '=', 'continents.id')
        ->join('currencies', 'countries.currency_id', '=', 'currencies.id')->get();

        return view('country_view', compact("country"));
    }
}
