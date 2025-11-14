@extends('admin.layout')

@section('content')
<div class="admin-container">
    <h1>Welcome to Admin Dashboard 🎨</h1>
    <p style="color:#666; margin-bottom:20px;">Manage your portfolio sections easily below.</p>

    <div class="dashboard-grid">
        <a href="{{ route('admin.hero.index') }}" class="dashboard-card">
            <i class="fas fa-star"></i>
            <h3>Hero Section</h3>
            <p>Edit your main banner content</p>
        </a>

        <a href="{{ route('admin.about.index') }}" class="dashboard-card">
            <i class="fas fa-user"></i>
            <h3>About Section</h3>
            <p>Update bio, description & highlights</p>
        </a>

        <a href="{{ route('admin.skills.index') }}" class="dashboard-card">
            <i class="fas fa-code"></i>
            <h3>Skills</h3>
            <p>Manage technical and soft skills</p>
        </a>

        <a href="{{ route('admin.experiences.index') }}" class="dashboard-card">
            <i class="fas fa-briefcase"></i>
            <h3>Experience</h3>
            <p>Add or update your job experiences</p>
        </a>

        <a href="{{ route('admin.contacts.index') }}" class="dashboard-card">
            <i class="fas fa-envelope"></i>
            <h3>Contact Info</h3>
            <p>Set email, phone & social links</p>
        </a>
    </div>
</div>
@endsection
