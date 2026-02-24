<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/page', function(){  return "Hello laravel";  } );
Route::get('/message' , function(){ return "This is my first message";  });
Route::get('/calcul' , function(){ return 5+36; });