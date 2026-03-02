<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/page', function(){  return "Hello laravel";  } );
Route::get('/message' , function(){ return "This is my first message";  });
Route::get('/calcul' , function(){ return 5+36; });


Route::get("/home" , function(){
        // return "<h1> Home page </h1>
        //         <p>This is home page </p>"; 
        return view("home");
}

);

Route::get("/contact" , function(){
    // return "<h1> Contact page </h1>
    //         <p>This is contact page</p>";
    return view("contact");
}

);

Route::get("/about" , function(){

    return view("contct");
}
);