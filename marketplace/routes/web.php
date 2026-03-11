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

    return view("contact");
}
);



Route::get("/data/show" , function(){

    $name = "wassim";
    $age = 33;
    $birth_date = 1992;

    $data = [
        'name'=>"wassim" , 
        'age'=>33 ,
        'birth_date'=>1992];

    // 1-Parsing data using with()
    //return view('sharing_data')->with( 'age' , $age)->with('name' , $name);
    // 2-Parsing data using compact()
    //return view('sharing_data',compact('name','age','birth_date'));
    // 3-Parsing data using an array
    return view('sharing_data',$data);

    // 4-Sharing data with all views
    // 5-Using view composer

    // best practice : compact 
}
);

