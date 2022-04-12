<!DOCTYPE html>
<html>
<head>
    <title>Burger God - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro.min.css" media="all">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet" />
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar bg-dark">
            <div class="d-flex flex-column gap-2">
                <h4 class="text-center text-white m-0">Burger God</h4>
                <p class="text-center text-muted mb-2">Logged as {{ Auth::user()->name }}</p>
                <a href="{{ route('app.admin.dashboard') }}" class="btn btn-primary">Dashboard</a>
                @if(Auth::user()->type == 2)
                <a href="{{ route('app.admin.categories') }}" class="btn btn-secondary">Categories</a>
                <a href="{{ route('app.admin.items') }}" class="btn btn-secondary">Items</a>
                <a href="{{ route('app.admin.extras') }}" class="btn btn-secondary">Extras</a>
                <a href="#" class="btn btn-secondary">Clients</a>
                <a href="{{ route('app.admin.delivery-boys') }}" class="btn btn-secondary">Delivery Boy</a>
                @endif
            </div>
        </div>
        <div class="content">
            <div class="p-4">
                @yield('admin-container')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    @toastr_js
    <script>
        var source = "{{ asset('assets/sounds/notification2.wav') }}";
        var audio = new Audio();

        audio.src = source;
        audio.autoplay = true;
        audio.loop = true;
        audio.pause();
        audio.currentTime = 0;
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": function () {

                audio.pause();
                audio.currentTime = 0;
            },
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "0",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "closeOnHover": false,
            "onHidden": function() {
                location.reload();
            }
        }

        Echo.channel(`ordersChannel`)
            .listen('Orders', (e) => {
                audio.play();
                toastr.warning(e.message);
            });
    </script>
</body>
</html>
