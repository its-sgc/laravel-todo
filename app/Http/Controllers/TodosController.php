<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo=Todos::all();
        return view('welcome')->with('todo',$todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todo=Todos::all();
        return view('welcome')->with('todo',$todo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $todo=new Todos;
        $todo->todo=$request->todo;
        $todo->save();
        return redirect()->route('todos.create')->with('success','Contact Added Successfully');
    }

    


    public function edit($id)
    {
        $todo=Todos::find($id);
        return redirect()->route('todos.create', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo=Todos::find($id);
        $todo->todo=$request->todo;
        $todo->save();
        return redirect()->route('todos.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todos::find($id);
        $todo->delete();
        return redirect()->route('todos.create');
    }
}
