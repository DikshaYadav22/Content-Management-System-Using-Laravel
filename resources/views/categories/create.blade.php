@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
            <h2>Add Categories</h2>
        </div>
        <div class="card-body">
    <form action={{route('categories.store')}} method="POST">
        @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name">

    </div>
    
    <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
</div>
@endsection