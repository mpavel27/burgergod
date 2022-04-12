<!DOCTYPE html>
<html>
<head>
    <title>Burger God</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
</head>
<body>
<div id="mobile_navbar" class="mobile-navbar justify-content-between shadow">
    <ul class="navbar-nav gap-2">
        <li class="nav-item">
            <a class="nav-link mx-3" aria-current="page" href="#">Acasă</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mx-3" href="#">Despre Noi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mx-3" href="#">Servicii</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mx-3" href="#">Contact</a>
        </li>
    </ul>
    <div class="d-flex justify-content-center flex-column">
        <a href="{{ route('app.cart') }}" class="btn btn-secondary me-3 text-decoration-none position-relative w-100">
            <i class="fas fa-shopping-cart"></i>
            Cos de cumparaturi
            @if(session('cart'))
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ count(json_decode(session('cart'))) }}
                </span>
            @endif
        </a>
        @if(Auth::user())
            <a href="#" class="btn btn-secondary my-3">{{ Auth::user()->name }}</a>
        @else
            <button type="button" class="btn btn-secondary my-3" data-bs-toggle="modal" data-bs-target="#loginModal">LOGHEAZĂ-TE</button>
        @endif
        <a href="#" class="btn btn-primary">COMANDĂ ACUM</a>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top burgergod-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/assets/images/logo-white.png" alt="Burger God" height="90">
        </a>
        <button id="navbar-btn" class="toggle-navbar"><i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link mx-3 active" aria-current="page" href="{{ route('app.home') }}">Acasă</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3" href="#">Despre Noi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3" href="#">Servicii</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3" href="#">Contact</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="{{ route('app.cart') }}" class="btn-square btn-secondary me-3 text-decoration-none position-relative">
                    @if(session('cart'))
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ count(json_decode(session('cart'))) }}
                    </span>
                    @endif
                    <i class="fas fa-shopping-cart"></i>
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
                    <button type="button" class="btn btn-secondary me-3" data-bs-toggle="modal" data-bs-target="#loginModal">LOGHEAZĂ-TE</button>
                @endif
                <a href="#" class="btn btn-primary">COMANDĂ ACUM</a>
            </div>
        </div>
    </div>
</nav>
<section class="nav-section d-flex align-items-center">
    <div class="container mt-5">
        <h4 class="text-white">Comandă acum</h4>
        <h3 class="text-white">BURGERI FRESH ȘI GUSTOȘI</h3>
        <p class="text-white mb-3 fw-lighter">Vrei să știi cum decurg preparatele noastre de la bun la mai bun? Hai să începem!</p>
        <a href="#" class="btn btn-primary">COMANDĂ ACUM</a>
    </div>
</section>
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
            <p>Website dezvoltat de către <a href="https://eway-design.com/">Eway-Design</a> & Găzduit de catre <a href="https://softserver.ro/">Soft-Server</a></p>
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
                        <label for="name" class="form-label fw-normal">Nume</label>
                        <input type="text" class="form-control mb-3 py-3" id="name" name="name" placeholder="Introduceți numele dvs.">
                        <label for="emailAddress" class="form-label fw-normal">Email address</label>
                        <input type="text" class="form-control mb-3 py-3" id="emailAddress" name="email" placeholder="Introduceți adresa de e-mail">
                        <label for="phoneNumber" class="form-label fw-normal">Număr de telefon</label>
                        <input type="text" class="form-control mb-3 py-3" id="phoneNumber" name="phone_number" placeholder="Introduceți numărul dvs. de telefon">
                        <label for="password" class="form-label fw-normal">Password</label>
                        <input type="password" class="form-control mb-3 py-3" id="password" name="password" placeholder="Introduceți parola dvs.">
                        <label for="password" class="form-label fw-normal">Confirmați parola</label>
                        <input type="password" class="form-control py-3" id="password" name="password_confirmation" placeholder="Reintroduceți parola dvs.">
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
<script src="/assets/js/index.js"></script>
</body>
</html>
