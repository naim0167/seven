<?php
namespace App\Http\Controllers;
use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos=auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        // dd(auth()->user()->todos());
        // new User()
        // $userId = auth()->id();
        // $request['user_id']= $userId;
        auth()->user()->todos()->create($request->all());
        return redirect(route('todo.index'))->with('message','Todo Created Successfully');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }

    public function update(TodoCreateRequest $request,Todo $todo)
    {
        $todo->update(['title'=>$request->title]);
        return redirect(route('todo.index'))->with('message','Updated!');
        // dd($request->all());
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message','Task Marked as completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked as incompleted');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Task Deleted!');
    }
}
