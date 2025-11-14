<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; background:#f9f9fb; color:#333; margin:0; padding:0; }
        .admin-container { width: 90%; margin: 30px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 24px; color:#444; }
        .btn { display:inline-block; padding:8px 14px; border-radius:5px; text-decoration:none; color:#fff; font-weight:500; }
        .btn-primary { background:#3498db; }
        .btn-edit { background:#27ae60; }
        .btn-delete { background:#e74c3c; border:none; cursor:pointer; }
        .admin-table { width:100%; border-collapse: collapse; margin-top:20px; }
        .admin-table th, .admin-table td { border:1px solid #ddd; padding:10px; text-align:left; }
        .admin-table th { background:#f1f1f1; }
        .alert.success { background:#d4edda; padding:10px; border-radius:5px; margin-top:10px; color:#155724; }
        .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.dashboard-card {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: #fff;
    padding: 25px;
    border-radius: 12px;
    text-decoration: none;
    text-align: center;
    transition: 0.3s ease;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}

.dashboard-card i {
    font-size: 36px;
    margin-bottom: 10px;
}

.dashboard-card h3 {
    margin: 10px 0 5px;
}

.dashboard-card p {
    font-size: 14px;
    color: #ecf0f1;
}

.dashboard-card:hover {
    transform: translateY(-5px);
    background: linear-gradient(135deg, #2980b9, #1f618d);
}

/* ======= Form Styling ======= */
.form-title {
    font-size: 22px;
    color: #2c3e50;
    margin-bottom: 25px;
    border-left: 5px solid #3498db;
    padding-left: 10px;
}

.admin-form {
    background: #fff;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    max-width: 700px;
    margin: auto;
}

.form-group {
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: 600;
    margin-bottom: 8px;
    color: #34495e;
}

.form-group input[type="text"],
.form-group textarea,
.form-group input[type="file"] {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px 12px;
    font-size: 15px;
    transition: 0.3s ease;
    background: #fafafa;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #3498db;
    background: #fff;
    outline: none;
    box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.15);
}

.file-input {
    background: #f8f9fa;
}

.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.btn-secondary {
    background: #7f8c8d;
    text-decoration: none;
    border: none;
    padding: 8px 14px;
    border-radius: 6px;
    color: #fff;
    cursor: pointer;
    transition: 0.3s;
}

.btn-secondary:hover {
    background: #636e72;
}

/* Responsive */
@media (max-width: 768px) {
    .admin-form {
        padding: 20px;
    }
}
.about-card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    margin-top: 20px;
}

.btn-group {
    margin-top: 20px;
    display: flex;
    gap: 10px;
}

.btn-disabled {
    background: #bdc3c7;
    color: #fff;
    cursor: not-allowed;
    padding: 8px 14px;
    border-radius: 6px;
    border: none;
}

.btn-disabled:hover {
    background: #bdc3c7;
}

/* ==========================
   🧠 Skills Section Styles
========================== */



.table-hover tbody tr:hover {
    background-color: #f8f9fa !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    transition: all 0.2s ease-in-out;
}

.card { border-radius: 12px; }
.btn { border-radius: 8px; }
.table-hover tbody tr:hover { background-color: #f8f9fa; transition: 0.2s; }
 /* Only dropdown styling */
select[name="available"] {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
        background: #fafafa;
        cursor: pointer;
        transition: 0.2s;
    }

select[name="available"]:hover {
        background: #f0f0f0;
    }

select[name="available"]:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 3px rgba(0, 123, 255, 0.6);
    }
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

    .btn_experience{
    position: absolute !important;
    top: 5px !important;
    right: 225px !important;
    }

    .btn_skill{
        position: absolute !important;
    top: 5px !important;
    right: 170px !important;
    }
    
  .admin-container {
        max-width: 800px;
        margin: 50px auto;
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        position: relative;
    }
    .hero-card {
        margin-top: 25px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 12px;
        background: #f9f9f9;
    }
    .actions {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }
    .alert {
        padding: 10px 15px;
        margin-bottom: 15px;
        border-radius: 8px;
    }
    .success { background: #d4edda; color: #155724; }
    .error { background: #f8d7da; color: #721c24; }
</style>

</head>
<body>
    <div class="navbar" style="background:#2c3e50;padding:15px;">
        <a href="{{ route('admin.dashboard') }}" style="color:#ecf0f1;text-decoration:none;font-size:18px;font-weight:bold;">Admin Dashboard</a>
    </div>

    <main>@yield('content')</main>
</body>
</html>

