<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/set-user-timezone', function (Request $request) {
    session(['user_timezone' => $request->timezone]);
    return response()->json(['status' => 'success']);
})->middleware('web');

Route::get('/', function () {
    return view('portal');
});
