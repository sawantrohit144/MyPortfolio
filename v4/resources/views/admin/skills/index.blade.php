@extends('admin.layout')

@section('content')
<div class="container mt-5 position-relative">

    <!-- 🔙 Back Button -->
    <a href="{{ route('admin.dashboard') }}" class="back-btn-top btn_skill">← Back</a>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">🎯 Skills Management</h2>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle"></i> Add New Skill
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if($skills->isEmpty())
                <p class="text-center text-muted py-4">
                    No skills added yet. Click “Add New Skill” to create one.
                </p>
            @else
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Category</th>
                            <th>Proficiency</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skills as $skill)
                        <tr>
                            <td class="fw-semibold">{{ $skill->title }}</td>
                            <td><i class="{{ $skill->icon }} text-primary fs-5 me-2"></i> {{ $skill->icon }}</td>
                            <td>{{ $skill->category }}</td>
                            <td>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-success" style="width: {{ $skill->proficiency }}%;" role="progressbar">
                                        {{ $skill->proficiency }}%
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

@endsection