@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Add Contact</h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.contacts.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label><strong>Lead</strong></label>
            <textarea name="lead" class="form-control" rows="3" required>{{ old('lead') }}</textarea>
        </div>

        <h4>Contact Methods</h4>
        <div id="methods-container"></div>

        <button type="button" id="add-method" class="btn btn-secondary mb-3">➕ Add Method</button>

        <div>
            <button type="submit" class="btn btn-success">💾 Save</button>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">⬅ Back</a>
        </div>
    </form>
</div>

<script>
document.getElementById('add-method').addEventListener('click', function() {
    const container = document.getElementById('methods-container');
    const index = container.children.length;

    container.insertAdjacentHTML('beforeend', `
        <div class="method-box border p-3 mb-2 rounded">
            <div class="mb-2">
                <label>Icon</label>
                <input type="text" name="methods[${index}][icon]" class="form-control" placeholder="fa-solid fa-envelope">
            </div>
            <div class="mb-2">
                <label>Type</label>
                <input type="text" name="methods[${index}][type]" class="form-control" placeholder="Email / Phone / Location">
            </div>
            <div class="mb-2">
                <label>Value</label>
                <input type="text" name="methods[${index}][value]" class="form-control">
            </div>
            <div class="mb-2">
                <label>Link (optional)</label>
                <input type="text" name="methods[${index}][link]" class="form-control" placeholder="mailto: or https://">
            </div>
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
}
</style>
@endsection
