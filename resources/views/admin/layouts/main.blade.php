<!DOCTYPE html>
<html>
<head>
    <title>Burger God - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro.min.css" media="all">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}">
</head>
<body>
    <div class="d-flex">
        <div class="sidebar bg-dark">
            <div class="d-flex flex-column gap-2">
                <h4 class="text-center text-white">Burger God</h4>
                <a href="#" class="btn btn-primary">Dashboard</a>
                <a href="#" class="btn btn-secondary">Categories</a>
                <a href="#" class="btn btn-secondary">Items</a>
                <a href="#" class="btn btn-secondary">Ingredients</a>
                <a href="#" class="btn btn-secondary">Clients</a>
                <a href="#" class="btn btn-secondary">Delivery Boy</a>
            </div>
        </div>
        <div class="content">
            <div class="p-4">
                <h3>Bine ai revenit, {{ Auth::user()->name }}</h3>
                @yield('admin-container')
            </div>
        </div>
    </div>
</body>
</html>
