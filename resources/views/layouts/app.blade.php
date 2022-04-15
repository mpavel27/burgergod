<!DOCTYPE html>
<html>
<head>
    <title>Burger God</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro.min.css" media="all">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/mobile.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        .toast {
            width: 350px;
            max-width: 100%;
            font-size: 14px !important;
            pointer-events: auto;
            background-clip: padding-box;
            border: unset !important;
            box-shadow: 0 0 20px 0px #0000001f !important;
            border-radius: 6px !important;
        }

        .toast-message {
            font-weight: 400;
        }
    </style>
</head>
<body>
<div class="order-notifications">
    <div class="bg-warning p-4">
        <p class="m-0">Ai o comanda in curs de procesare</p>
    </div>
</div>
<div class="mobile_navbar d-flex flex-column align-items-center">
    <a href="{{ route('app.home') }}">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Burger God" height="80">
    </a>
    <ul class="list-unstyled m-0 text-start d-flex flex-column gap-2 mt-4">
        <li><a class="text-decoration-none text-dark" href="{{ route('app.home') }}">Acasă</a></li>
        <li><a class="text-decoration-none text-dark" href="{{ route('app.about-us') }}">Despre Noi</a></li>
        <li><a class="text-decoration-none text-dark" href="{{ route('app.menu') }}">Meniu</a></li>
        <li><a class="text-decoration-none text-dark" href="{{ route('app.contact') }}">Contact</a></li>
        @if(Auth::user())
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle me-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ route('app.account') }}">Detaliile mele</a></li>
                    <li><a class="dropdown-item" href="{{ route('app.account') }}">Adresele mele</a></li>
                    <li><a class="dropdown-item" href="{{ route('app.account') }}">Schimbă parola</a></li>
                    <li><a class="dropdown-item" href="{{ route('app.logout') }}">Delogare</a></li>
                </ul>
            </div>
        @else
            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Loghează-te</a>
        @endif
    </ul>
    <button type='button' class="btn-square btn-primary mt-3 rounded-circle" id="mobile-navbar">
        <i class="fas fa-times"></i>
    </button>
    <div class="d-flex flex-row justify-content-center gap-3 mt-3">
        <a class="text-dark text-decoration-none fs-1" href="">
            <i class="fab fa-instagram"></i>
        </a>
        <a class="text-dark text-decoration-none fs-1" href="">
            <i class="fab fa-facebook"></i>
        </a>
    </div>
</div>
<div class="website_navbar">
    <button class="mobile_navbar_btn btn-square btn-primary position-absolute">
        <i class="fas fa-bars"></i>
    </button>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between py-4 navbar-mobile">
            <div class="d-flex align-items-center">
                <a href="{{ route('app.home') }}"><img src="https://burgergod.ro/wp-content/uploads/2022/01/loard-spin.png" alt="Burger God" height="70" class="me-5"></a>
                <div class="nav-links">
                    <ul class="list-unstyled d-flex gap-5 m-0 align-items-center">
                        <li>
                            <a href="{{ route('app.home') }}" class="navbar_link {{ (Request::url() == route('app.home')) ? 'active' : '' }}">Acasă</a>
                        </li>
                        <li>
                            <a href="{{ route('app.about-us') }}" class="navbar_link {{ (Request::url() == route('app.about-us')) ? 'active' : '' }}">Despre Noi</a>
                        </li>
                        <li>
                            <a href="{{ route('app.menu') }}" class="navbar_link {{ (Request::url() == route('app.menu')) ? 'active' : '' }}">Meniu</a>
                        </li>
                        <li>
                            <a href="{{ route('app.contact') }}" class="navbar_link {{ (Request::url() == route('app.contact')) ? 'active' : '' }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex">
                <a href="{{ route('app.cart') }}" class="btn-square btn-secondary position-relative me-2">
                    <i class="fad fa-shopping-cart"></i>
                    @if(session('cart'))
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ count(json_decode(session('cart'))) }}
                        </span>
                    @endif
                </a>
                @if(Auth::user())
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle me-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('app.account') }}">Detaliile mele</a></li>
                            <li><a class="dropdown-item" href="{{ route('app.account') }}">Adresele mele</a></li>
                            <li><a class="dropdown-item" href="{{ route('app.account') }}">Schimbă parola</a></li>
                            <li><a class="dropdown-item" href="{{ route('app.logout') }}">Delogare</a></li>
                        </ul>
                    </div>
                @else
                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Loghează-te</a>
                @endif
            </div>
        </div>
    </div>
</div>
@yield('main-container')
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>Link-uri utile</h4>
                <ul class="list-unstyled m-0">
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Link-uri utile</h4>
                <ul class="list-unstyled m-0">
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Link-uri utile</h4>
                <ul class="list-unstyled m-0">
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled m-0">
                    <li>BURGER GOD SRL</li>
                    <li>CUI - 123123123</li>
                    <li>Strada Mărgeanului 53, București 052034</li>
                    <li>Tel: 0723000525</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>Website dezvoltat de către <a href="https://eway-design.com/">Eway-Design</a> & Găzduit de catre <a href="https://softserver.ro/">SoftServer</a></p>
        </div>
    </div>
</footer>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <ul class="nav nav-tabs mb-4 justify-content-evenly">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#login">Autentificare</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#register">Inregistrare</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <form method="POST" action="{{ route('app.login') }}" class="tab-pane container active" id="login">
                        @csrf
                        <div class="d-flex justify-content-left mb-3">
                            <h4>Autentificare</h4>
                        </div>
                        <label for="emailAddress" class="form-label fw-normal">Email address</label>
                        <input type="text" class="form-control mb-3 py-3" id="emailAddress" name="email" placeholder="Introduceți adresa de e-mail">
                        <label for="password" class="form-label fw-normal">Password</label>
                        <input type="password" class="form-control py-3" id="password" name="password" placeholder="Introduceți parola dvs.">
                        <div class="d-flex justify-content-between mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Închide</button>
                            <button type="submit" class="btn btn-primary">Loghează-te</button>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('app.register') }}" class="tab-pane container fade" id="register">
                        @csrf
                        <div class="d-flex justify-content-left mb-3">
                            <h4>Înregistrare</h4>
                        </div>
                        <label for="nameReg" class="form-label fw-normal">Nume</label>
                        <input type="text" class="form-control mb-3 py-3" id="nameReg" name="name" placeholder="Introduceți numele dvs.">
                        <label for="emailAddressReg" class="form-label fw-normal">Email address</label>
                        <input type="text" class="form-control mb-3 py-3" id="emailAddressReg" name="email" placeholder="Introduceți adresa de e-mail">
                        <label for="phoneNumber" class="form-label fw-normal">Număr de telefon</label>
                        <input type="text" class="form-control mb-3 py-3" id="phoneNumber" name="phone_number" placeholder="Introduceți numărul dvs. de telefon">
                        <label for="passwordReg" class="form-label fw-normal">Password</label>
                        <input type="password" class="form-control mb-3 py-3" id="passwordReg" name="password" placeholder="Introduceți parola dvs.">
                        <label for="passwordRegConf" class="form-label fw-normal">Confirmați parola</label>
                        <input type="password" class="form-control py-3" id="passwordRegConf" name="password_confirmation" placeholder="Reintroduceți parola dvs.">
                        <div class="d-flex justify-content-between mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Închide</button>
                            <button type="submit" class="btn btn-primary">Înregistrează-te</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@toastr_js
@toastr_render
<script>
    let navbarCollapsed = false;
    $('.mobile_navbar_btn').click(function () {
        if(navbarCollapsed == false) {
            $('.mobile_navbar').addClass('active')
            navbarCollapsed = true;
        } else {
            $('.mobile_navbar').removeClass('active')
            navbarCollapsed = false;
        }
    });

    $('#mobile-navbar').click(function () {
        if(navbarCollapsed == true) {
            $('.mobile_navbar').removeClass('active')
            navbarCollapsed = false;
        }
    });
</script>
</body>
</html>
