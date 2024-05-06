<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/search-drop-down', function () {
    return view('search_drop_down');
});
//
//Route::post('/contact', function (Request $request) {
//    $contact = $request->validate([
//        'name' => 'required',
//        'email' => 'required|email',
//        'phone' => 'required',
//        'message' => 'required',
//    ]);
//
////    Mail::to('andre@andre.com')->send(new ContactFormMailable($contact));
//
//    return back()->with('success_message', 'We received your message successfully and will get back to you shortly!');
//});
