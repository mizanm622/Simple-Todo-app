<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the data.
     */
    public function index()
    {
      $data=Todo::all();

      return view('task',compact('data'));
    }


    /**
     * Store a newly created data in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'task_name'=>'required|unique:todos|max:255'
       ]);

       Todo::insert([
        'task_name'=>$request->task_name
       ]);

       return redirect()->back()->with('insert','Task Successfully Inserted!');
    }


    /**
     * Show the form for editing the specified data.
     */
    public function edit($id)
    {
       $data=Todo::all();
       $edit_todo=Todo::where('id',$id)->first();

       return view('task',compact('edit_todo','data'));
    }

    /**
     * Update the specified data in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'task_name'=>'required|unique:todos|max:255'
           ]);

           Todo::where('id', $request->id)->update([
            'task_name'=>$request->task_name
           ]);

           return redirect()->route('todo.index')->with('update','Task Successfully Updated!');
    }

    /**
     * Remove the specified data from storage.
     */
    public function destroy($id)
    {

            Todo::where('id', $id)->delete();
            return redirect()->back()->with('delete','Task Successfully Deleted!');



    }
}
