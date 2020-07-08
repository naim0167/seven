@extends('todos.layout')

@section ('content')
<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text 2xl pb-4">Whtat next you need to-do</h1>
    <a href="{{route('todo.index')}}" class="mx-5 py-2 cursor-pointer text-gray-400">
        <span class="fas fa-arrow-left"></span>
    </a>
</div>
    <h1 class="text 2xl">Whtat next you need to-do</h1>
    <x-alert/>
    <form method="post" action="{{route('todo.store')}}" class="py-5">
    @csrf
    <input type="text" name="title" class="py-2 px-2 border rounded">
    <input type="submit" value="Create" class="p-2 border rounded-lg">
    </form>
@endsection
