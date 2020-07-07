<?php
namespace App\Http\Controllers;
use App\Todo;
// use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(TodoCreateRequest $request)
    {
        Todo::create($request->all());
        return redirect()->back()->with('message','Todo Created Successfully');
    }
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit',compact('todo'));
    }
}
