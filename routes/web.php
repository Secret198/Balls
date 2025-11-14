<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/search', [CountryController::class, 'show']);
Route::get('/search/{countryId}', [CountryController::class, 'search']);
Route::get('locale/{locale}', function (string $locale) {
if (!in_array($locale, ['en', 'fi'])) {
        $locale = config('app.fallback_locale');
    }
    
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale.change');
