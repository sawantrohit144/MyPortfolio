@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Contact</h2>
    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Lead</label>
            <textarea name="lead" class="form-control" rows="3">{{ $contact->lead }}</textarea>
        </div>

        <h4>Contact Methods</h4>
        <div id="methods-container">
            @foreach($contact->methods ?? [] as $i => $method)
                <div class="method-box border p-3 mb-2">
                    <div class="mb-2">
                        <label>Icon</label>
                        <input type="text" name="methods[{{ $i }}][icon]" class="form-control" value="{{ $method['icon'] }}">
                    </div>
                    <div class="mb-2">
                        <label>Type</label>
                        <input type="text" name="methods[{{ $i }}][type]" class="form-control" value="{{ $method['type'] }}">
                    </div>
                    <div class="mb-2">
                        <label>Value</label>
                        <input type="text" name="methods[{{ $i }}][value]" class="form-control" value="{{ $method['value'] }}">
                    </div>
                    <div class="mb-2">
                        <label>Link</label>
                        <input type="text" name="methods[{{ $i }}][link]" class="form-control" value="{{ $method['link'] }}">
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-method">Remove</button>
                </div>
            @endforeach
        </div>

        <button type="button" id="add-method" class="btn btn-secondary mb-3">➕ Add Method</button>

        <div>
            <button type="submit" class="btn btn-success">💾 Update</button>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">⬅ Back</a>
        </div>
    </form>
</div>

<script>
document.getElementById('add-method').addEventListener('click', function() {
    const container = document.getElementById('methods-container');
    const index = container.children.length;

    container.insertAdjacentHTML('beforeend', `
        <div class="method-box border p-3 mb-2">
            <div class="mb-2"><label>Icon</label><input type="text" name="methods[${index}][icon]" class="form-control"></div>
            <div class="mb-2"><label>Type</label><input type="text" name="methods[${index}][type]" class="form-control"></div>
            <div class="mb-2"><label>Value</label><input type="text" name="methods[${index}][value]" class="form-control"></div>
            <div class="mb-2"><label>Link</label><input type="text" name="methods[${index}][link]" class="form-control"></div>
            <button type="button" class="btn btn-danger btn-sm remove-method">Remove</button>
        </div>
    `);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-method')) {
        e.target.closest('.method-box').remove();
    }
});
</script>

<style>
.method-box {
    background: #f8f9fa;
    border-radius: 8px;
}
</style>
@endsection
