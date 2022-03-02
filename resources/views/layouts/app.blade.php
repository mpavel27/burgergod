<!DOCTYPE html>
<html>
<head>
    <title>Burger God</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro.min.css" media="all">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/mobile.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div id="mobile_navbar" class="mobile-navbar justify-content-between shadow">
    <ul class="navbar-nav gap-2">
        <li class="nav-item">
            <a class="nav-link mx-3 active" aria-current="page" href="#">Acasă</a>
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
        <a href="#" class="btn btn-secondary my-3">LOGHEAZĂ-TE</a>
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
                    <a class="nav-link mx-3 active" aria-current="page" href="#">Acasă</a>
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
            <div class="d-flex">
                <a href="#" class="btn btn-secondary me-3">LOGHEAZĂ-TE</a>
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
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="/assets/js/index.js"></script>
</body>
</html>
