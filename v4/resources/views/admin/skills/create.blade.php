@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Add New Skill</h2>

    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Icon (FontAwesome class)</label>
            <input type="text" name="icon" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control">
        </div>

        <div class="mb-3">
            <label>Proficiency (%)</label>
            <input type="number" name="proficiency" class="form-control" min="0" max="100">
        </div>

        <div class="mb-3">
            <label>Items (JSON format or key-value pairs)</label>
            <textarea name="items" class="form-control" placeholder='[{"name":"Laravel","icon":"fab fa-laravel"}]'></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save Skill</button>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
