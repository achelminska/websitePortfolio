<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/lang/{locale}', function (Request $request, string $locale) {
    if (in_array($locale, ['pl', 'en'], true)) {
        session(['locale' => $locale]);
    }

    return redirect()->back(fallback: route('home'));
})->name('locale.switch');
