@extends('todos.layout')

@section ('content')
    <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text 2xl pb-4">{{$todo->title}}</h1>
        <a href="{{route('todo.index')}}" class="mx-5 py-2 cursor-pointer text-gray-400">
            <span class="fas fa-arrow-left"></span>
        </a>
    </div>
    <x-alert/>
    <div>
        <div>
            <div>
                <p>{{$todo->description}}</p>
            </div>
        </div>
    </div>
    {{-- <form method="post" action="{{route('todo.store')}}" class="py-5">
    @csrf
    <div class="py-1">
        <input type="text" name="title" class="py-2 px-2 border rounded" placeholder="Title">
    </div>
    <div class="py-1">
        <textarea name="description" class="p-2 rounded border" placeholder="Description"></textarea>
    </div>
    <div class="py-1">
        <input type="submit" value="Create" class="p-2 border rounded-lg">
    </div>
    </form> --}}
{{--
     $todo->update(['title'=>$request->title]);
       $todo->update(['description'=>$request->description]);  --}}
@endsection
