<?php

namespace App\Http\Controllers;

use App\todolist;
use Illuminate\Http\Request;

class todo extends Controller
{
    public function index()
    {
        return view('home');

    }


    public function store(Request $request)
    {
        $todo = new todolist();
        $todo->name = $request->name ;
        $todo->lastname = $request->lastname ;
        $todo->email = $request->email;
        $todo->password = bcrypt($request->password) ;
        $todo->save();
        return redirect()->route('show_data');

    }
    public function showdata()
    {
        $todo =  todolist::all()->sortByDesc('id');
        return view('show_data',compact('todo'));
    }
    public function delete($id)
    {
    todolist::where('id',$id)->delete();
        return redirect()->route('show_data');

    }
    public function edit($id)
    {
       $todo= todolist::where('id',$id)->get();
        return view('edit',compact('todo'));
    }

    public function update(Request $request)
    {
        $datashow = todolist::where('id',$request->id)->first();
        $datashow->name = $request->name ;
        $datashow->lastname = $request->lastname ;
        $datashow->email = $request->email;
        $datashow->password = bcrypt($request->password) ;
        $datashow->save();
            return redirect()->route('show_data');
    }
}
