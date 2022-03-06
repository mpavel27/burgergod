@extends('layouts.app')
@section('main-container')
    <section class="item">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="py-5">
                        <img src="{{ asset('items/'.$item->image) }}" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="py-5">
                        <div class="item-top">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="mb-2">{{ $item->name }}</h3>
                                    <h5 class="fw-lighter">{{ $item->description }}</h5>
                                </div>
                                <h2>{{ $item->price }} RON</h2>
                            </div>
                            <hr>
                        </div>
                        @if(count($item->extras) > 0)
                        <div class="item-center">
                            <h5 class="m-0">Produse extra</h5>
                            <p class="fw-lighter">Alege-ti produsele extra</p>
                            <div class="border p-3 rounded-3">
                                @foreach($item->extras as $extra)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" data-extra="true" data-extra-price="{{ $extra->price }}" value="{{ $extra->id }}" id="extra{{ $extra->id }}">
                                        <label class="form-check-label fw-normal" for="extra{{ $extra->id }}">
                                            {{ $extra->name }} - @if($extra->type != 1) {{ $extra->price }} RON @else GRATIS @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="item-bottom mt-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0">Total: <span id="total">{{ $item->price }}</span>LEI</h5>
                                <button type="button" class="btn btn-primary">Adaugă în coș</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $('input[data-extra="true"]').change(function (e) {
                var total_price = parseFloat($('#total').text());
                if(this.checked) {
                    total_price += parseFloat($(this).data('extra-price'));
                    $('#total').text(total_price.toFixed(2))
                } else {
                    total_price -= parseFloat($(this).data('extra-price'));
                    $('#total').text(total_price.toFixed(2))
                }
            });
        });
    </script>
@endsection
