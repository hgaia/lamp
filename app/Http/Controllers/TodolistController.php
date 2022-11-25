<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index()
    {
        $todolists = Todolist::all();
        return view('home', compact('todolists'));
    }
    public function create(Request $request)
    {
        $content = $request->input('content');

        $newTodo = Todolist::create([
            'content' =>$content
        ]);

        return back();
    }    
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
    public function update(Todolist $todolist)
    {
        
        $todolist->is_complete = true;
        $todolist->save();
        return back();
    }
}
