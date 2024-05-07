@extends('layouts.app')

@section('title', 'Shopping List')

@section('content')
<h1>Shopping List: {{ $shoppingList->name }}</h1>
<div>
    <form action="{{ route('item.create', ['id' => $shoppingList->id]) }}" method="GET" style="display: inline;">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-danger">Add Item</button>
    </form>
    <form action="{{ route('shoppingList.edit', ['id' => $shoppingList->id]) }}" method="GET" style="display: inline;">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-danger">Edit</button>
    </form>
    <form action="{{ route('shoppingList.delete', ['id' => $shoppingList->id]) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shopping list?')">Delete</button>
    </form>
</div>

<br>
<h2>Items:</h2>
@if ($items->isEmpty())
<p>No items found.</p>
@else
<ul>
    @foreach($items as $item)
    <li>
        {{ $item->name }} x {{ $item->quantity }}
        <form action="{{ route('item.edit', ['id' => $item->id]) }}" method="GET" style="display: inline;">
            @csrf
            @method('GET')
            <button type="submit" class="btn btn-danger">Edit</button>
        </form>
        <form action="{{ route('item.delete', ['id' => $item->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shopping list?')">Delete</button>
        </form>
    </li>
    @endforeach
</ul>
@endif


@endsection