@extends('admin.layout')

@section('content')
<div class="admin-container">
    <h1 class="form-title">✏️ Edit Hero Section</h1>

    @php
        $typed = is_array($hero->typed_texts) ? $hero->typed_texts : (json_decode($hero->typed_texts, true) ?? []);
    @endphp

    <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Available</label>
            <select name="available">
                <option value="1" {{ $hero->available ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ !$hero->available ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>

        <div class="form-group"><label>Badge Text</label>
            <input type="text" name="badge_text" value="{{ $hero->badge_text }}">
        </div>

        <div class="form-group"><label>Headline</label>
            <input type="text" name="headline" value="{{ $hero->headline }}">
        </div>

        <div class="form-group"><label>Highlighted Name</label>
            <input type="text" name="highlighted_name" value="{{ $hero->highlighted_name }}">
        </div>

        <div class="form-group"><label>Typed Texts</label>
            <input type="text" name="typed_texts" value="{{ implode(', ', $typed) }}">
        </div>

        <h3>Primary Button</h3>
        <div class="form-group"><label>Button Text</label>
                <input type="text" name="primary_button_text" value="{{ $hero->primary_button_text }}">
        </div>
        <div class="form-group"><label>Button Link</label>
                <input type="text" name="primary_button_link" value="{{ $hero->primary_button_link }}">
        </div>
        <div class="form-group"><label>Button Icon</label>
                <input type="text" name="primary_button_icon" value="{{ $hero->primary_button_icon }}">
        </div>

        <h3>Secondary Button</h3>
        <div class="form-group"><label>Button Text</label>
                <input type="text" name="secondary_button_text" value="{{ $hero->secondary_button_text }}">
        </div>
        <div class="form-group"><label>Button Link</label>
                <input type="text" name="secondary_button_link" value="{{ $hero->secondary_button_link }}">
        </div>
        <div class="form-group"><label>Button Link</label>
                <input type="text" name="secondary_button_icon" value="{{ $hero->secondary_button_icon }}">
        </div>
        <div class="form-group"><label>Scroll Text</label>
            <input type="text" name="scroll_text" value="{{ $hero->scroll_text }}">
        </div>

        <div class="form-actions">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
