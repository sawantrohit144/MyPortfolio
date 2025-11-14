@extends('admin.layout')

@section('content')
<div class="admin-container">
    <h1 class="form-title">✏️ Edit About Section</h1>

    <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @method('PUT')

        {{-- Safely decode highlights --}}
        @php
            $highlights = is_array($about->highlights)
                ? $about->highlights
                : (json_decode($about->highlights, true) ?? []);
        @endphp

        <div class="form-group">
            <label for="title">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title', $about->title) }}" 
                placeholder="Enter title" 
                required>
        </div>

        <div class="form-group">
            <label for="lead_text">Lead Text</label>
            <textarea 
                name="lead_text" 
                id="lead_text" 
                rows="3" 
                placeholder="Short lead text">{{ old('lead_text', $about->lead_text) }}</textarea>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea 
                name="description" 
                id="description" 
                rows="5" 
                placeholder="Detailed description">{{ old('description', $about->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="highlights">Highlights (comma separated)</label>
            <input 
                type="text" 
                name="highlights" 
                id="highlights" 
                value="{{ old('highlights', implode(', ', $highlights)) }}" 
                placeholder="e.g. PHP, Laravel, React, MySQL">
        </div>

        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image" class="file-input">

            @if($about->image)
                <div class="preview">
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $about->image) }}" alt="About Image" class="preview-image">
                </div>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">💾 Update</button>
            <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">⬅ Back</a>
        </div>
    </form>
</div>

<style>
    .admin-container {
        max-width: 700px;
        margin: 50px auto;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        font-family: 'Poppins', sans-serif;
    }

    .form-title {
        text-align: center;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        font-weight: 600;
        color: #34495e;
        margin-bottom: 6px;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }

    textarea {
        resize: none;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
        border: none;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .preview {
        margin-top: 10px;
        text-align: center;
    }

    .preview-image {
        max-width: 150px;
        border-radius: 10px;
        margin-top: 5px;
    }
</style>
@endsection
