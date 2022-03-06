@extends('layouts.app')
@section('main-container')
    <section class="account py-5">
        <div class="container">
            <div class="d-flex">
                <div class="account-sidebar p-4 rounded-3 shadow border">
                    <ul class="nav flex-column gap-3">
                        <li class="nav-item">
                            <a class="btn btn-secondary active w-100" data-bs-toggle="tab" href="#details">Detaliile mele</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary w-100" data-bs-toggle="tab" href="#orders">Istoric comenzi</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary w-100" data-bs-toggle="tab" href="#addresses">Adresele mele</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary w-100" data-bs-toggle="tab" href="#addresses">Schimba parola</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content w-100">
                    <div class="tab-pane show active" id="details">
                        <div class="shadow p-4 rounded-3 border ms-4 w-100">
                            <h4 class="m-0">Detaliile mele</h4>
                            <hr>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label for="nameLabel" class="fw-lighter">Numele tau</label>
                                    <input type="text" class="form-control py-3" id="nameLabel" placeholder="Numele dvs." value="{{ $details->name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 my-3">
                                    <label for="nameLabel" class="fw-lighter">Număr de telefon</label>
                                    <input type="text" class="form-control py-3" id="nameLabel" placeholder="Numărul dvs. de telefon" value="{{ $details->phone_number }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label for="nameLabel" class="fw-lighter">Adresă de e-mail</label>
                                    <input type="text" class="form-control py-3" id="nameLabel" placeholder="Adresa dvs. de e-mail" value="{{ $details->email }}" disabled="disabled">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mt-3">Actualizează</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders">
                        details222
                    </div>
                    <div class="tab-pane fade" id="addresses">
                        details2
                    </div>
                    <div class="tab-pane fade" id="security">
                        details2
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
