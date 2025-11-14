@extends('admin.layout')

@section('content')

<style>
    /* Top Right Back Button */
    .back-btn-top {
        position: absolute;
        top: 20px;
        right: 30px;
        background: #f1f1f1;
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 14px;
        text-decoration: none;
        color: #333;
        display: flex;
        align-items: center;
        gap: 6px;
        border: 1px solid #ccc;
        transition: 0.2s;
    }
    .back-btn-top:hover {
        background: #e1e1e1;
    }
</style>

<div class="admin-container">

    <!-- 🔙 Back Button -->
    <a href="{{ route('admin.dashboard') }}" class="back-btn-top">← Back</a>
    <!-- If you want to go back to a different page, tell me -->

    <h1 class="form-title">🎯 Hero Section Management</h1>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif

    @if(!$hero)
        <a href="{{ route('admin.hero.create') }}" class="btn btn-primary">➕ Add Hero Section</a>
    @else
        <div class="hero-card">
            <h3>{{ $hero->headline ?? 'No Headline' }}</h3>
            <p><strong>Name:</strong> {{ $hero->highlighted_name ?? '---' }}</p>
            <p><strong>Badge:</strong> {{ $hero->badge_text ?? '---' }}</p>
            <p><strong>Scroll Text:</strong> {{ $hero->scroll_text ?? '---' }}</p>
            <p><strong>Status:</strong> {{ $hero->available ? 'Enabled' : 'Disabled' }}</p>
            
            <div class="actions">
                <a href="{{ route('admin.hero.edit', $hero->id) }}" class="btn btn-primary">✏️ Edit</a>
                <form action="{{ route('admin.hero.destroy', $hero->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑️ Delete</button>
                </form>
            </div>
        </div>
    @endif
</div>

@endsection
