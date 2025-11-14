@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3 class="fw-bold text-primary mb-4">
                {{ isset($experience) ? 'Edit Experience' : 'Add New Experience' }}
            </h3>

            <form 
                action="{{ isset($experience) ? route('admin.experiences.update', $experience->id) : route('admin.experiences.store') }}" 
                method="POST"
            >
                @csrf
                @if(isset($experience)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Years (e.g. 2020 - 2024)</label>
                    <input type="text" name="years" class="form-control" value="{{ old('years', $experience->years ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" class="form-control" value="{{ old('role', $experience->role ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Company</label>
                    <input type="text" name="company" class="form-control" value="{{ old('company', $experience->company ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $experience->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tags</label>
                    <div id="tag-container" class="d-flex flex-wrap gap-2 mb-2">
                        @php
                            $tags = old('tags', $experience->tags ?? []);
                        @endphp
                        @foreach($tags as $tag)
                            <div class="tag-item badge bg-primary text-white p-2">
                                <span>{{ $tag }}</span>
                                <button type="button" class="btn-close btn-close-white btn-sm ms-2 remove-tag"></button>
                                <input type="hidden" name="tags[]" value="{{ $tag }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex gap-2">
                        <input type="text" id="tag-input" class="form-control" placeholder="Type tag & press Enter">
                        <button type="button" id="add-tag" class="btn btn-outline-primary">Add Tag</button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    {{ isset($experience) ? 'Update Experience' : 'Save Experience' }}
                </button>
                <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary mt-3">Cancel</a>
            </form>
        </div>
    </div>
</div>

{{-- JS for tag input --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tagContainer = document.getElementById('tag-container');
    const tagInput = document.getElementById('tag-input');
    const addTagBtn = document.getElementById('add-tag');

    function addTag(value) {
        if (!value.trim()) return;
        const div = document.createElement('div');
        div.classList.add('tag-item', 'badge', 'bg-primary', 'text-white', 'p-2');
        div.innerHTML = `<span>${value}</span>
            <button type="button" class="btn-close btn-close-white btn-sm ms-2 remove-tag"></button>
            <input type="hidden" name="tags[]" value="${value}">`;
        tagContainer.appendChild(div);
        tagInput.value = '';
    }

    addTagBtn.addEventListener('click', () => addTag(tagInput.value));
    tagInput.addEventListener('keypress', e => {
        if (e.key === 'Enter') {
            e.preventDefault();
            addTag(tagInput.value);
        }
    });

    tagContainer.addEventListener('click', e => {
        if (e.target.classList.contains('remove-tag')) {
            e.target.parentElement.remove();
        }
    });
});
</script>

<style>
.tag-item {
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.btn-close {
    font-size: 10px;
}
</style>
@endsection
