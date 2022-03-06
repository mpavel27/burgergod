<!DOCTYPE html>
<html>
<head>
    <title>Burger God - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro.min.css" media="all">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet" />
</head>
<body>
    <div class="d-flex">
        <div class="sidebar bg-dark">
            <div class="d-flex flex-column gap-2">
                <h4 class="text-center text-white m-0">Burger God</h4>
                <p class="text-center text-muted mb-2">Logged as {{ Auth::user()->name }}</p>
                <a href="{{ route('app.admin.dashboard') }}" class="btn btn-primary">Dashboard</a>
                <a href="{{ route('app.admin.categories') }}" class="btn btn-secondary">Categories</a>
                <a href="{{ route('app.admin.items') }}" class="btn btn-secondary">Items</a>
                <a href="{{ route('app.admin.extras') }}" class="btn btn-secondary">Extras</a>
                <a href="#" class="btn btn-secondary">Clients</a>
                <a href="#" class="btn btn-secondary">Delivery Boy</a>
            </div>
        </div>
        <div class="content">
            <div class="p-4">
                @yield('admin-container')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel(`ordersChannel`)
            .listen('Orders', (e) => {
                console.log(e.message);
            });
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    @toastr_js
    @toastr_render
</body>
</html>
