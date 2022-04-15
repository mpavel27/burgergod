@extends('layouts.app')
@section('main-container')
    <section class="checkout py-5">
        <div class="container">
            <form method="POST" action="{{ route('app.cart.checkout.post') }}" class="row">
                @csrf
                <div class="col-xl-8">
                    <div class="border p-4 rounded-3 mb-3">
                        <h4>Finalizare comandă</h4>
                        <hr>
                        <h6 class="p-3 my-3 rounded-3 fw-bold" style="background-color: var(--primary-color)">Informatii personale <sup class="text-danger">*</sup></h6>
                        <input type="text" class="form-control" name="user_name" placeholder="Nume" @if(auth()->check()) value="{{ auth()->user()->name }}" @endif>
                        <input type="email" class="form-control my-3" name="user_email" placeholder="Email" @if(auth()->check()) value="{{ auth()->user()->email }}" @endif>
                        <input type="tel" class="form-control" name="user_phone_number" placeholder="Număr de telefon" @if(auth()->check()) value="{{ auth()->user()->phone_number }}" @endif>
                        @if(session('shipment_type') == 1)
                        <h6 class="p-3 my-3 rounded-3 fw-bold" style="background-color: var(--primary-color)">Detalii pentru curier <sup class="text-danger">*</sup></h6>
                        <input type="text" class="form-control" name="city" placeholder="Oraș" required>
                        <input type="text" class="form-control my-3" name="user_address" placeholder="Adresă" required>
                        <textarea class="form-control" name="notes" placeholder="Informații suplimentare (opțional)"></textarea>
                        @endif
                        <h6 class="p-3 my-3 rounded-3 fw-bold" style="background-color: var(--primary-color)">Tipul de plată <sup class="text-danger">*</sup></h6>
                        <div class="border rounded-2 p-3 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" value="card" id="flexRadioDefault1">
                                <label class="form-check-label" for="payment">
                                    Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" value="cash" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="payment">
                                    Numerar
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="border p-4 rounded-3">
                        <h4>Cart Total</h4>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Subtotal</h5>
                            <p class="m-0">{{ $total }} RON</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Taxa de livrare</h5>
                            <p class="m-0">{{ $delivery_tax }} RON</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Total</h5>
                            <p class="m-0">{{ $total + $delivery_tax }} RON</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Plasați comanda</button>
                </div>
            </form>
        </div>
    </section>
@endsection
