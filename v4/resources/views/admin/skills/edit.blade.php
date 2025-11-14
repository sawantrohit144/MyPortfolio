@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Skill</h2>

    <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $skill->title }}" required>
        </div>

        <div class="mb-3">
            <label>Icon (FontAwesome class)</label>
            <input type="text" name="icon" class="form-control" value="{{ $skill->icon }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $skill->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ $skill->category }}">
        </div>

        <div class="mb-3">
            <label>Proficiency (%)</label>
            <input type="number" name="proficiency" class="form-control" min="0" max="100" value="{{ $skill->proficiency }}">
        </div>

        <div class="mb-3">
            <label>Items (JSON format)</label>
            <textarea name="items" class="form-control">{{ json_encode($skill->items) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Skill</button>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
