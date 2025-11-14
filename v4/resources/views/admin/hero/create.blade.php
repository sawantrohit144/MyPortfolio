@extends('admin.layout')

@section('content')
<div class="admin-container">
    <h1 class="form-title">➕ Add Hero Section</h1>

    <form action="{{ route('admin.hero.store') }}" method="POST" class="admin-form">
        @csrf

        <div class="form-group">
            <label>Available</label>
            <select name="available">
                <option value="1">Enabled</option>
                <option value="0">Disabled</option>
            </select>
        </div>

        <div class="form-group">
            <label>Badge Text</label>
            <input type="text" name="badge_text">
        </div>

        <div class="form-group">
            <label>Headline</label>
            <input type="text" name="headline">
        </div>

        <div class="form-group">
            <label>Highlighted Name</label>
            <input type="text" name="highlighted_name">
        </div>

        <div class="form-group">
            <label>Typed Texts (comma separated)</label>
            <input type="text" name="typed_texts" placeholder="e.g. Web Developer, Designer">
        </div>

        <h3>Primary Button</h3>
        <input type="text" name="primary_button_text" placeholder="Text">
        <input type="text" name="primary_button_link" placeholder="Link">
        <input type="text" name="primary_button_icon" placeholder="Icon class">

        <h3>Secondary Button</h3>
        <input type="text" name="secondary_button_text" placeholder="Text">
        <input type="text" name="secondary_button_link" placeholder="Link">
        <input type="text" name="secondary_button_icon" placeholder="Icon class">

        <div class="form-group">
            <label>Scroll Text</label>
            <input type="text" name="scroll_text">
        </div>

        <div class="form-actions">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
