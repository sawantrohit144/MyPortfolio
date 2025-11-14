@extends('admin.layout')

@section('content')
<div class="container mt-5 position-relative">

    <!-- 🔙 Back Button -->
    <a href="{{ route('admin.dashboard') }}" class="back-btn-top btn_experience">← Back</a>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">💼 Work Experience</h2>
        <a href="{{ route('admin.experiences.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle"></i> Add New Experience
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
            @if($experiences->isEmpty())
                <p class="text-center text-muted py-4">No experiences added yet. Click “Add New Experience”.</p>
            @else
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Years</th>
                            <th>Role</th>
                            <th>Company</th>
                            <th>Tags</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($experiences as $exp)
                        <tr>
                            <td>{{ $exp->years }}</td>
                            <td>{{ $exp->role }}</td>
                            <td>{{ $exp->company }}</td>
                            <td>
                                @if(!empty($exp->tags))
                                    @foreach($exp->tags as $tag)
                                        <span class="badge bg-info text-dark me-1">{{ $tag }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.experiences.edit', $exp->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.experiences.destroy', $exp->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i>
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
