@extends('layouts.app')

@section('title', 'Shopping Lists')

@section('content')
<h1>Shopping Lists
    <form action="{{ route('shoppingList.create', ['id' => 1]) }}" method="GET" style="display: inline;">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-danger">Add Shopping List</button>
    </form>
</h1>

@if ($shoppingLists->isEmpty())
<p>No shopping lists found.</p>
@else
<ul>
    @foreach($shoppingLists as $list)
    <li>
        {{ $list->name }}
        <a href="{{ route('shoppingList.show', ['id' => $list->id]) }}" class="btn btn-primary">View</a>
    </li>
    @endforeach
</ul>
@endif
@endsection