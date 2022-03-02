@extends('layouts.app')
@section('main-container')
<section class="about">
    <img class="burger" src="/assets/images/burger.png">
    <img class="burger-2" src="/assets/images/burger.png">
    <img class="burger-3" src="/assets/images/burger.png">
    <div class="container">
        <div class="text-center mt-5 mb-5">
            <h4 class="mb-3">Ce punem pe masa?</h4>
            <h5 class="text-uppercase fw-bold mt-3">Preparatele noastre</h5>
        </div>
        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="burger-image">
                    <a href="#" class="btn btn-primary">COMANDĂ</a>
                    <img src="/assets/images/burger.jpg" height="400">
                </div>
                <p class="burger-title text-center mt-2">American Burger</p>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="burger-image">
                    <a href="#" class="btn btn-primary">COMANDĂ</a>
                    <img src="/assets/images/burger.jpg" height="400">
                </div>
                <p class="burger-title text-center mt-2">American Burger</p>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="burger-image">
                    <a href="#" class="btn btn-primary">COMANDĂ</a>
                    <img src="/assets/images/burger.jpg" height="400">
                </div>
                <p class="burger-title text-center mt-2">American Burger</p>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="burger-image">
                    <a href="#" class="btn btn-primary">COMANDĂ</a>
                    <img src="/assets/images/burger.jpg" height="400">
                </div>
                <p class="burger-title text-center mt-2">American Burger</p>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="burger-image">
                    <a href="#" class="btn btn-primary">COMANDĂ</a>
                    <img src="/assets/images/burger.jpg" height="400">
                </div>
                <p class="burger-title text-center mt-2">American Burger</p>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="burger-image">
                    <a href="#" class="btn btn-primary">COMANDĂ</a>
                    <img src="/assets/images/burger.jpg" height="400">
                </div>
                <p class="burger-title text-center mt-2">American Burger</p>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="burger-image">
                    <a href="#" class="btn btn-primary">COMANDĂ</a>
                    <img src="/assets/images/burger.jpg" height="400">
                </div>
                <p class="burger-title text-center mt-2">American Burger</p>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="burger-image">
                    <a href="#" class="btn btn-primary">COMANDĂ</a>
                    <img src="/assets/images/burger.jpg" height="400">
                </div>
                <p class="burger-title text-center mt-2">American Burger</p>
            </div>
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
@endsection
