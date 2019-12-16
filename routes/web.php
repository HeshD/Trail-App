<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/task',function(){
$data=App\task::all();

    return view('tasks')->with('tasks',$data);
});

Route::post('/saveTask','TaskController@store');
//route::get('/contactus','Frontendcontroller@indexhome');