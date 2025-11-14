@extends('admin.layout')

@section('content')
<div class="admin-container">
    <!-- 🔙 Back Button -->
    <a href="{{ route('admin.dashboard') }}" class="back-btn-top ">← Back</a>
    <h1>About Section Management</h1>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    {{-- CREATE BUTTON (only visible if no record exists) --}}
    @if(empty($about))
        <a href="{{ route('admin.about.create') }}" class="btn btn-primary">➕ Create About Section</a>
    @else
        <button class="btn btn-disabled" disabled>➕ Create Disabled (Already Exists)</button>
    @endif

    <hr style="margin: 25px 0; border: 0; border-top: 1px solid #ddd;">

    {{-- DISPLAY EXISTING RECORD --}}
    @if($about)
    <div class="about-card">
        <h3>{{ $about->title ?? 'No Title' }}</h3>
        <p><strong>Lead:</strong> {{ $about->lead_text ?? '-' }}</p>
        <p>{{ $about->description ?? '-' }}</p>

        @if($about->image)
            <img src="{{ asset('/'.$about->image) }}" alt="About Image" width="150" style="border-radius:8px; margin-top:10px;">
        @endif

        <div class="btn-group">
            <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-edit">✏️ Edit</a>

            <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the About section?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete">🗑 Delete</button>
            </form>
        </div>
    </div>
    @else
        <p style="color:#666;">No About Section found. Please create one.</p>
    @endif
</div>
@endsection
