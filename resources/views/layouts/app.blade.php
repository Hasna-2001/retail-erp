<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retail ERP System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background-color: #212529;
            padding-top: 20px;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 2px 10px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #0d6efd;
            color: white;
        }
        .sidebar .brand {
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 10px 20px 20px;
            border-bottom: 1px solid #444;
            margin-bottom: 10px;
        }
        .main-content { padding: 30px; }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar" style="width:230px; min-width:230px;">
        <div class="brand"><i class="bi bi-shop"></i> Retail ERP</div>
        <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        <a href="{{ route('products.index') }}"><i class="bi bi-box me-2"></i>Products</a>
        <a href="{{ route('customers.index') }}"><i class="bi bi-people me-2"></i>Customers</a>
        <a href="{{ route('sales.index') }}"><i class="bi bi-cart me-2"></i>Sales</a>
        <hr style="border-color:#444; margin:10px;">
        <a href="{{ route('reports.sales') }}"><i class="bi bi-bar-chart me-2"></i>Sales Report</a>
        <a href="{{ route('reports.inventory') }}"><i class="bi bi-clipboard-data me-2"></i>Inventory Report</a>
        <hr style="border-color:#444; margin:10px;">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </div>

    <div class="flex-grow-1 main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>