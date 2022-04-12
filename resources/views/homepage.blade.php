@extends('layouts.app')
@section('main-container')
<section class="top-header mt-3">
    <div class="container">
        <div class="d-flex justify-content-between gap-4">
            <div class="d-flex justify-content-center flex-column">
                <h1 class="fw-bold">Comandă acum</h1>
                <h1 class="fw-bold">Burgeri Fresh și Gustoși</h1>
                <p class="m-0 fw-normal mb-4">Înregistreză-te pe website-ul nostru și comandă acum burger-ul tău preferat</p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="feature-bg text-center">
                            <h4 class="m-0 fw-bold">50+</h4>
                            <h6 class="m-0 fw-bold text-muted">Produse</h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-bg text-center">
                            <h4 class="m-0 fw-bold">100+</h4>
                            <h6 class="m-0 fw-bold text-muted">Clienți mulțumiți</h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-bg text-center">
                            <h4 class="m-0 fw-bold">40+ min</h4>
                            <h6 class="m-0 fw-bold text-muted">Timp de livrare</h6>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center gap-5 mt-5">
                    <img src="https://glovoapp.com/images/logo_green.svg" alt="Glovo" height="30">
                    <img src="https://webstatic.tazz.ro/build/media/tazz-logo.61d45db1.svg" alt="Tazz" height="30">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjkiIGhlaWdodD0iNDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik01NS4yNjIgMHYzMC4wNzRoLTcuMTM2VjEuNTA0TDU1LjI2MiAwek0zNC45NDUgMzIuOTI0YzEuOTcgMCAzLjU2OCAxLjU4NCAzLjU2OCAzLjUzOCAwIDEuOTU0LTEuNTk4IDMuNTM4LTMuNTY4IDMuNTM4cy0zLjU2OC0xLjU4NC0zLjU2OC0zLjUzOGMwLTEuOTU0IDEuNTk3LTMuNTM4IDMuNTY4LTMuNTM4em0wLTI0LjM4M2M2LjA3NSAwIDExLjAxIDQuODg0IDExLjAxIDEwLjkxOCAwIDYuMDM1LTQuOTM1IDEwLjkyLTExLjAxIDEwLjkyLTYuMDg1IDAtMTEuMDEtNC44ODUtMTEuMDEtMTAuOTIgMC02LjAzNCA0LjkzNS0xMC45MTggMTEuMDEtMTAuOTE4em0wIDE0LjQ1NmMxLjk3MiAwIDMuNTY4LTEuNTgyIDMuNTY4LTMuNTM4IDAtMS45NTUtMS41OTYtMy41MzgtMy41NjgtMy41MzhzLTMuNTY4IDEuNTgzLTMuNTY4IDMuNTM4YzAgMS45NTYgMS41OTYgMy41MzggMy41NjggMy41Mzh6bS0yMi40NDggMGMxLjIzIDAgMi4yMy0uOTkyIDIuMjMtMi4yMWEyLjIyNCAyLjIyNCAwIDAwLTIuMjMtMi4yMTJINy4xNDZ2NC40MjJoNS4zNTF6TTcuMTQ2IDcuMDc3djQuNDIyaDMuOTY0YzEuMjI5IDAgMi4yMy0uOTkzIDIuMjMtMi4yMTJhMi4yMjQgMi4yMjQgMCAwMC0yLjIzLTIuMjFINy4xNDZ6bTExLjkyMiA3LjA5NWMxLjcyNCAxLjY5IDIuNzk1IDQuMDMgMi43ODUgNi42MTQgMCA1LjEzLTQuMTkyIDkuMjg4LTkuMzY2IDkuMjg4SDBWMGgxMS4xYzUuMTczIDAgOS4zNjUgNC4xNTcgOS4zNjUgOS4yODcgMCAxLjc5LS41MDUgMy40Ny0xLjM5NyA0Ljg4NXpNNjguNzQgMTYuMDJoLTMuNTU4djUuNTUzYzAgMS42OC41NDUgMi45MTggMS45NzIgMi45MTguOTIyIDAgMS41OTYtLjIwNiAxLjU5Ni0uMjA2djUuMjA5cy0xLjQ3Ny44ODQtMy40NzkuODg0aC0uMDg5Yy0uMDkgMC0uMTY4LS4wMS0uMjU4LS4wMWgtLjA2OWMtLjA0IDAtLjA5LS4wMS0uMTI5LS4wMS0zLjk4NC0uMjA2LTYuNjktMi42OTItNi42OS03LjAwN1Y1LjA0MWw3LjEzNi0xLjUwM3Y1LjQwNWgzLjU2OHY3LjA3N3oiIGZpbGw9IiMzNEQxODYiLz48L3N2Zz4=" alt="Bolt" height="30">
                    <img src="https://burgervan.ro/wp-content/uploads/2020/12/download.png" alt="Takeaway" height="30">
                </div>
            </div>
            <div>
                <img src="{{ asset('assets/images/delivery_mockup.png') }}" height="850">
            </div>
        </div>
    </div>
</section>
<section class="menu">
    <div class="container">
        <h5 class="category-title text-center">Meniu</h5>
        <h5 class="fw-bold text-center my-4 mb-2">Cei mai apreciați burgeri</h5>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($topItems as $item)
                <div class="swiper-slide">
                    <div class="product-bg text-center position-relative">
                        <img src="http://127.0.0.1:8000/items/1649719263.png">
                        <div class="p-3">
                            <h5 class="fw-bold">{{ $item->name }}</h5>
                            <p class="fw-normal">{{ $item->description }}</p>
                            <h5>{{ $item->price }} RON</h5>
                        </div>
                        <a href="{{ route('app.item', ['id' => $item->id]) }}" class="btn-square btn-primary order-now"><i class="fad fa-shopping-cart"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<section class="where-we-are">
    <div class="container">
        <div class="text-center mt-5 mb-5">
            <h4 class="mb-3">Unde suntem?</h4>
            <h5 class="text-uppercase fw-bold mt-3">Iți suntem mereu la dispoziție</h5>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                <iframe class="map mb-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1425.109420361787!2d26.05901319347596!3d44.40815487911131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b1f927def7c669%3A0xc6f6408b4203d4da!2sBurgerGod!5e0!3m2!1sen!2suk!4v1646158567505!5m2!1sen!2suk" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6">
                <p class="location-text"><i class="fas fa-map-marked" style="color: var(--primary-color)"></i>Adresă — Strada Mărgeanului 53, București 052034</p>
                <p class="location-text"><i class="fas fa-phone" style="color: var(--primary-color)"></i>Telefon — 0723000525</p>
                <p class="location-text"><i class="fas fa-calendar" style="color: var(--primary-color)"></i>Program — L-D: 11:00 – 23:00</p>
                <!-- <p class="location-text"><i class="fas fa-at" style="color: var(--primary-color)"></i>E-mail — contact@burgergod.ro</p> -->
                <input type="text" class="custom-input mb-3" placeholder="Prenume">
                <input type="text" class="custom-input mb-3" placeholder="E-mail">
                <input type="text" class="custom-input mb-3" placeholder="Număr de telefon">
                <input type="text" class="custom-input mb-3" placeholder="Mesaj">
                <button class="btn btn-primary w-100">Trimite</button>
            </div>
        </div>
    </div>
</section>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        freeMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
@endsection
