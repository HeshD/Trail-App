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

Route::get('/markascompleted/{id}','TaskController@UpdateTaskCompleted');

Route::get('/markasnotcompleted/{id}','TaskController@UpdateTaskNotCompleted');

Route::get('/deletetask/{id}','TaskController@deletetask');

Route::get('/updatetask/{id}','TaskController@updatetask');

Route::post('/updatetasks','TaskController@updatetasks');
