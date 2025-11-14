@extends('admin.layout')

@section('content')
<div class="admin-container">
    <h1 class="form-title">Add About Section</h1>

    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Enter title" required>
        </div>

        <div class="form-group">
            <label for="lead_text">Lead Text</label>
            <textarea name="lead_text" id="lead_text" rows="3" placeholder="Short lead text"></textarea>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" placeholder="Detailed description"></textarea>
        </div>

        <div class="form-group">
            <label for="highlights">Highlights (comma separated)</label>
            <input type="text" name="highlights" id="highlights" placeholder="e.g. PHP, Laravel, React, MySQL">
        </div>

        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image" class="file-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">💾 Save</button>
            <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">⬅ Back</a>
        </div>
    </form>
</div>
@endsection
