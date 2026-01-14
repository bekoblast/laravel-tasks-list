<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'name' => 'Beko'
    ]);
});

//Route with usable name!
Route::get('/hello', function () {
    return 'Hello';
})->name('hello-route');

//redirect to previous route name!
Route::get('/hallo', function () {
    return redirect()->route('hello-route');
});

//Route with Parameters
Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name . '!';
});

//Custom not found route!
Route::fallback(function () {
    return 'Error 404 - Wrong Page!!';
});