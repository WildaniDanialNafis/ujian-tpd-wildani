<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Arsip Surat')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-bg: #ffffff;
            --primary: #4361ee;
            --border-color: #e9ecef;
        }
        body {
            background-color: #f9fafb;
            overflow-x: hidden;
        }
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1020;
            box-shadow: 0 0 20px rgba(0,0,0,0.04);
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem 1.5rem;
        }
        .nav-link {
            border-radius: 0.5rem;
            margin-bottom: 0.35rem;
            padding: 0.65rem 1rem;
            font-weight: 500;
            color: #495057;
            transition: all 0.2s ease;
        }
        .nav-link:hover, .nav-link.active {
            background: var(--primary);
            color: white !important;
        }
        .nav-link i {
            width: 1.25rem;
            text-align: center;
        }
        .card {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            border-radius: 12px;
            overflow: hidden;
        }
        .table th {
            font-weight: 600;
            color: #495057;
            background: #f8f9fa;
        }
        @media (max-width: 991.98px) {
            .sidebar { width: 250px; }
            .main-content { margin-left: 250px; }
        }
        @media (max-width: 767.98px) {
            .sidebar { width: 100%; height: auto; position: relative; }
            .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

@include('components.sidebar')

<div class="main-content">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')
</body>
</html>