@extends('layouts.app')
@section('main-container')
<section class="top-header mt-3">
    <div class="container">
        <div class="d-flex justify-content-between top-header-gap">
            <div class="d-flex justify-content-center flex-column">
                <h1 class="fw-bold">Comandă acum</h1>
                <h1 class="fw-bold">Burgeri Fresh și Gustoși</h1>
                <p class="m-0 fw-normal mb-4">Înregistreză-te pe website-ul nostru și comandă acum burger-ul tău preferat</p>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="feature-bg text-center">
                            <h4 class="m-0 fw-bold">50+</h4>
                            <h6 class="m-0 fw-bold text-muted">Produse</h6>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="feature-bg text-center">
                            <h4 class="m-0 fw-bold">100+</h4>
                            <h6 class="m-0 fw-bold text-muted">Clienți mulțumiți</h6>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="feature-bg text-center">
                            <h4 class="m-0 fw-bold">40+ min</h4>
                            <h6 class="m-0 fw-bold text-muted">Timp de livrare</h6>
                        </div>
                    </div>
                </div>
                <p class="fw-normal text-center text-muted">Îți suntem la dispoziție și pe:</p>
                <div class="d-flex justify-content-center align-items-center partners">
                    <img class="me-4" src="https://glovoapp.com/images/logo_green.svg" alt="Glovo" height="30">
                    <img class="me-4" src="https://webstatic.tazz.ro/build/media/tazz-logo.61d45db1.svg" alt="Tazz" height="30">
                    <img class="me-4" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjkiIGhlaWdodD0iNDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik01NS4yNjIgMHYzMC4wNzRoLTcuMTM2VjEuNTA0TDU1LjI2MiAwek0zNC45NDUgMzIuOTI0YzEuOTcgMCAzLjU2OCAxLjU4NCAzLjU2OCAzLjUzOCAwIDEuOTU0LTEuNTk4IDMuNTM4LTMuNTY4IDMuNTM4cy0zLjU2OC0xLjU4NC0zLjU2OC0zLjUzOGMwLTEuOTU0IDEuNTk3LTMuNTM4IDMuNTY4LTMuNTM4em0wLTI0LjM4M2M2LjA3NSAwIDExLjAxIDQuODg0IDExLjAxIDEwLjkxOCAwIDYuMDM1LTQuOTM1IDEwLjkyLTExLjAxIDEwLjkyLTYuMDg1IDAtMTEuMDEtNC44ODUtMTEuMDEtMTAuOTIgMC02LjAzNCA0LjkzNS0xMC45MTggMTEuMDEtMTAuOTE4em0wIDE0LjQ1NmMxLjk3MiAwIDMuNTY4LTEuNTgyIDMuNTY4LTMuNTM4IDAtMS45NTUtMS41OTYtMy41MzgtMy41NjgtMy41MzhzLTMuNTY4IDEuNTgzLTMuNTY4IDMuNTM4YzAgMS45NTYgMS41OTYgMy41MzggMy41NjggMy41Mzh6bS0yMi40NDggMGMxLjIzIDAgMi4yMy0uOTkyIDIuMjMtMi4yMWEyLjIyNCAyLjIyNCAwIDAwLTIuMjMtMi4yMTJINy4xNDZ2NC40MjJoNS4zNTF6TTcuMTQ2IDcuMDc3djQuNDIyaDMuOTY0YzEuMjI5IDAgMi4yMy0uOTkzIDIuMjMtMi4yMTJhMi4yMjQgMi4yMjQgMCAwMC0yLjIzLTIuMjFINy4xNDZ6bTExLjkyMiA3LjA5NWMxLjcyNCAxLjY5IDIuNzk1IDQuMDMgMi43ODUgNi42MTQgMCA1LjEzLTQuMTkyIDkuMjg4LTkuMzY2IDkuMjg4SDBWMGgxMS4xYzUuMTczIDAgOS4zNjUgNC4xNTcgOS4zNjUgOS4yODcgMCAxLjc5LS41MDUgMy40Ny0xLjM5NyA0Ljg4NXpNNjguNzQgMTYuMDJoLTMuNTU4djUuNTUzYzAgMS42OC41NDUgMi45MTggMS45NzIgMi45MTguOTIyIDAgMS41OTYtLjIwNiAxLjU5Ni0uMjA2djUuMjA5cy0xLjQ3Ny44ODQtMy40NzkuODg0aC0uMDg5Yy0uMDkgMC0uMTY4LS4wMS0uMjU4LS4wMWgtLjA2OWMtLjA0IDAtLjA5LS4wMS0uMTI5LS4wMS0zLjk4NC0uMjA2LTYuNjktMi42OTItNi42OS03LjAwN1Y1LjA0MWw3LjEzNi0xLjUwM3Y1LjQwNWgzLjU2OHY3LjA3N3oiIGZpbGw9IiMzNEQxODYiLz48L3N2Zz4=" alt="Bolt" height="30">
                    <img src="https://burgervan.ro/wp-content/uploads/2020/12/download.png" alt="Takeaway" height="30">
                </div>
            </div>
            <div>
                <img class="man-image" src="{{ asset('assets/images/delivery_mockup2.png') }}" height="800">
            </div>
        </div>
    </div>
</section>
<section class="menu">
    <div class="container">
        @if($storeOnline == 'true')
        <h5 class="category-title text-center">Meniul Nostru</h5>
        <h5 class="fw-bold text-center my-4 mb-2">CEI MAI APRECIAȚI BURGERI</h5>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($topItems as $item)
                <div class="swiper-slide">
                    <div class="product-bg text-center position-relative">
                        <img src="{{ asset('items/'.$item->image) }}">
                        <div class="p-4">
                            <h5 class="fw-bold">{{ $item->name }}</h5>
                            <p class="fw-normal">{{ $item->description }}</p>
                            <h5>{{ $item->price }} RON</h5>
                        </div>
                        <a href="{{ route('app.item', ['id' => $item->id]) }}" class="btn-square btn-primary order-now"><i class="fad fa-shopping-cart"></i></a>
                        @if($item->grams != 0)
                        <div class="item-info-left m-0">Grame: {{ $item->grams }}</div>
                        @endif
                        @if($item->calories != 0)
                        <div class="item-info-right m-0">Calorii: {{ $item->calories }}</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    @else
        <div class="text-center py-5">
            <h4>Ne pare rău dar momentan magazin-ul nostru este închis!</h4>
            <p class="m-0">Vă rugăm să reveniți între orele 19:00 și 03:00</p>
        </div>
    @endif
</section>
<section class="photo-gallery my-5">
    <div class="container">
        <div class="text-center mb-5">
            <h4 class="mb-3">Jurnal foto</h4>
            <h5 class="text-uppercase fw-bold mt-3">Descoperă frumusețile unui burger!</h5>
        </div>
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid mb-4 gallery-img" src="https://cdn.discordapp.com/attachments/680500119007002700/964139265594359808/20817643.png" alt="BurgerGod">
            </div>
            <div class="col-md-3">
                <img class="img-fluid mb-4 gallery-img" src="https://cdn.discordapp.com/attachments/680500119007002700/964139265594359808/20817643.png" alt="BurgerGod">
            </div>
            <div class="col-md-3">
                <img class="img-fluid mb-4 gallery-img" src="https://cdn.discordapp.com/attachments/680500119007002700/964139265594359808/20817643.png" alt="BurgerGod">
            </div>
            <div class="col-md-3">
                <img class="img-fluid mb-4 gallery-img" src="https://cdn.discordapp.com/attachments/680500119007002700/964139265594359808/20817643.png" alt="BurgerGod">
            </div>
            <div class="col-md-3">
                <img class="img-fluid mb-4 gallery-img" src="https://cdn.discordapp.com/attachments/680500119007002700/964139265594359808/20817643.png" alt="BurgerGod">
            </div>
            <div class="col-md-3">
                <img class="img-fluid mb-4 gallery-img" src="https://cdn.discordapp.com/attachments/680500119007002700/964139265594359808/20817643.png" alt="BurgerGod">
            </div>
            <div class="col-md-3">
                <img class="img-fluid mb-4 gallery-img" src="https://cdn.discordapp.com/attachments/680500119007002700/964139265594359808/20817643.png" alt="BurgerGod">
            </div>
            <div class="col-md-3">
                <img class="img-fluid mb-4 gallery-img" src="https://cdn.discordapp.com/attachments/680500119007002700/964139265594359808/20817643.png" alt="BurgerGod">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-primary">Follow Us</a>
        </div>
    </div>
</section>
<section class="call-us">
    <div class="container">
        <div class="text-center">
            <h3 class="fw-bold">Contactează-ne</h3>
            <p class="fw-normal">Iți suntem mereu la dispoziție între orele 11:00 și 23:00</p>
        </div>
        <button class="phone-number">
            SUNĂ-NE +40 723000525
        </button>
    </div>
</section>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        breakpoints: {
            1181: {
                slidesPerView: 4
            },
            1180: {
                slidesPerView: 3
            },
            1020: {
                slidesPerView: 2
            },
            700: {
                slidesPerView: 1
            },
            300: {
                slidesPerView: 1
            }
        },
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
</script>
@endsection
