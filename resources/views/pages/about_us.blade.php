@extends('layouts.app')
@section('main-container')
    <section class="about-us">
        <div class="container">
            <div class="nav-breadcrumb mt-4 mb-5">
                <ul class="list-unstyled m-0 d-flex flex-row gap-4">
                    <li>
                        <a class="page" href="{{ route('app.home') }}">Acasă</a>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="fas fa-circle separator"></i>
                    </li>
                    <li>
                        <a class="current-page" href="{{ Request::url() }}">Despre Noi</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-xxl-8 mb-4">
                    <h3 class="fw-bold">Burger God - Fast Food</h3>
                    <h5 class="mt-3 mb-5">Livrări zilnice de luni pană duminică între orele 11:00 – 23:00</h5>
                    <p class="m-0 fw-normal text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus non diam et tristique. Duis eleifend eros sem, ac ultrices nisi ullamcorper at. Donec et condimentum metus. Ut mattis nisl velit, ac convallis ipsum dictum et.<br><br><br>Sed sollicitudin aliquam ex, placerat rhoncus quam pharetra id. Sed facilisis dictum sem sed lacinia. Sed fringilla ac massa at varius. Sed sit amet mauris odio. Sed at efficitur ligula.
                        Pellentesque condimentum efficitur tincidunt. Aliquam accumsan suscipit rhoncus. Sed at venenatis sem. Mauris fringilla venenatis tellus, id euismod augue luctus non.</p>
                </div>
                <div class="col-xxl-4">
                    <div class="d-flex justify-content-center">
                        <img class="rounded-3 shadow img-fluid" src="https://burgervan.ro/wp-content/uploads/2017/04/asamblat.jpg" width="400">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xxl-6">
                    <div class="d-flex justify-content-center">
                        <img class="rounded-3 shadow img-fluid mb-4" src="https://cdn.discordapp.com/attachments/680500119007002700/964554991673172038/download.png" width="600">
                    </div>
                </div>
                <div class="col-xxl-6">
                    <h3 class="fw-bold">Locația noastră</h3>
                    <h5 class="mt-3 mb-5">Sector 5 Strada Mărgeanului 53</h5>
                    <p class="m-0 fw-normal text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus non diam et tristique. Duis eleifend eros sem, ac ultrices nisi ullamcorper at. Donec et condimentum metus. Ut mattis nisl velit, ac convallis ipsum dictum et.<br><br><br>Sed sollicitudin aliquam ex, placerat rhoncus quam pharetra id. Sed facilisis dictum sem sed lacinia. Sed fringilla ac massa at varius. Sed sit amet mauris odio. Sed at efficitur ligula.
                        Pellentesque condimentum efficitur tincidunt. Aliquam accumsan suscipit rhoncus. Sed at venenatis sem. Mauris fringilla venenatis tellus, id euismod augue luctus non.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
