<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task=new task;

        $this->validate($request,[
        'task'=>'required|max:100|min:0',
        ] );

        $task->task=$request->task;
        $task->save();

        $data=task::all();

        return view('tasks')->with('tasks',$data);
        //dd($data);
        //return redirect()->back();
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function UpdateTaskCompleted($id)
    {
        $task=task::find($id);
        $task->IsCompleted=1;
        $task->save();
        return redirect()->back();

    }

    public function UpdateTaskNotCompleted($id)
    {
        $task=task::find($id);
        $task->IsCompleted=0;
        $task->save();
        return redirect()->back();
    }

    public function deletetask($id)
    {
        $task=task::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function updatetask($id)
    {
        $task=task::find($id);
        return  view('updatetask')->with('taskdata',$task);
    }

    public function updatetasks(Request $request)
    {
        $id=$request->id;
        $task=$request->task;
        $data=task::find($id);
        $data->task=$task;
        $data->save();
        $datas=task::all();
        return view('tasks')->with('tasks',$datas);
    }
    
}
