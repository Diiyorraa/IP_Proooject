@extends('layouts.app')

@section('title', 'Edit Shopping List')

@section('content')
<h1>Edit Shopping List</h1>

<form action="{{ route('shoppingList.update', ['id' => $shoppingList->id]) }}" method="POST" id="editForm">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $shoppingList->name }}">
        <span id="nameError" class="text-danger"></span>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<script>
    const form = document.getElementById('editForm');
    const nameInput = document.getElementById('name');
    const nameError = document.getElementById('nameError');

    form.addEventListener('submit', function(event) {
        const nameValue = nameInput.value.trim();

        if (!preg_match('/^[a-zA-Z0-9 ]{1,50}$/', $nameValue)) {
            nameError.textContent = 'Name should only contain alphanumeric characters and spaces. Names longer than 50 characters are not allowed.';
            event.preventDefault();
        } else {
            nameError.textContent = '';
        }
    });
</script>
@endsection