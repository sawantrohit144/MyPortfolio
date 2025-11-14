@extends('admin.layout')

@section('content')
<div class="contact-container">
     <!-- 🔙 Back + Title in one responsive row -->
    <div class="contact-header">
            <h1 class="page-title">Contact Details</h1>
            <a href="{{ route('admin.dashboard') }}" class="back-btn">← Back</a>
    </div>

    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($contact)
        <div class="card contact-card">
            <p class="lead-text"><strong>Lead Message:</strong> {{ $contact->lead }}</p>

            <h5 class="method-title">Contact Methods</h5>
            <ul class="method-list">
                @foreach ($contact->methods as $method)
                    <li class="method-item">
                        <div class="method-icon">
                            @if(!empty($method['icon']))
                                <i class="{{ $method['icon'] }}"></i>
                            @endif
                        </div>
                        <div class="method-info">
                            <strong>{{ $method['type'] }}:</strong>
                            @if(!empty($method['link']))
                                <a href="{{ $method['link'] }}" target="_blank">{{ $method['value'] }}</a>
                            @else
                                <span>{{ $method['value'] }}</span>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="action-buttons">
                <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-primary">✏️ Edit</a>

                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Are you sure you want to delete this contact?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑️ Delete</button>
                </form>
            </div>
        </div>
    @else
        <div class="no-contact">
            <p>No contact information found.</p>
            <a href="{{ route('admin.contacts.create') }}" class="btn btn-success">➕ Create Contact</a>
        </div>
    @endif
</div>
@endsection

<style>
/* ====== General Layout ====== */
.contact-container {
    max-width: 800px;
    margin: 40px auto;
    background: #f9fafb;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.page-title {
    font-size: 1.8rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
}

/* ====== Card Styling ====== */
.card {
    background: #fff;
    border-radius: 10px;
    padding: 25px 30px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: transform 0.2s ease-in-out;
}
.card:hover {
    transform: translateY(-2px);
}

.lead-text {
    font-size: 1.1rem;
    color: #444;
    margin-bottom: 15px;
}

/* ====== Methods ====== */
.method-title {
    font-weight: 600;
    margin-top: 20px;
    color: #222;
}

.method-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.method-item {
    display: flex;
    align-items: center;
    background: #f7f8fa;
    margin-bottom: 10px;
    padding: 12px 15px;
    border-radius: 8px;
    transition: background 0.2s ease-in-out;
}

.method-item:hover {
    background: #eef2ff;
}

.method-icon {
    margin-right: 12px;
    font-size: 1.5rem;
    color: #007bff;
}

.method-info a {
    color: #007bff;
    text-decoration: none;
    margin-left: 5px;
    transition: color 0.2s;
}
.method-info a:hover {
    color: #0056b3;
}

/* ====== Buttons ====== */
.btn {
    border-radius: 8px;
    padding: 10px 18px;
    font-weight: 500;
    transition: all 0.2s ease-in-out;
    text-decoration: none;
    display: inline-block;
}
.btn-primary {
    background: #007bff;
    color: #fff;
    border: none;
}
.btn-primary:hover {
    background: #0056b3;
}

.btn-success {
    background: #28a745;
    color: #fff;
    border: none;
}
.btn-success:hover {
    background: #218838;
}

.btn-danger {
    background: #dc3545;
    color: #fff;
    border: none;
}
.btn-danger:hover {
    background: #b02a37;
}

.action-buttons {
    margin-top: 20px;
}
.action-buttons form {
    display: inline-block;
}

/* ====== No Contact ====== */
.no-contact {
    text-align: center;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
}
.no-contact p {
    color: #555;
    font-size: 1rem;
    margin-bottom: 15px;
}

/* ====== Alerts ====== */
.alert {
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 15px;
}
.alert-info {
    background: #dbeafe;
    color: #1e3a8a;
}
.alert-success {
    background: #dcfce7;
    color: #166534;
}


/* Header: title + back button aligned */
.contact-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

/* Back Button */
.back-btn {
    padding: 8px 16px;
    background: #ffffff;
    border: 1px solid #ccc;
    border-radius: 8px;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    transition: 0.2s ease-in-out;
}
.back-btn:hover {
    background: #e5e5e5;
}

/* Responsive layout */
@media (max-width: 576px) {
    .contact-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}


</style>
