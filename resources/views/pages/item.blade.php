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
                <form method="POST" action="{{ route('app.cart.add') }}" class="col-lg-6">
                    @csrf
                    <div class="py-5">
                        <div class="item-top">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <input type="hidden" name="item" value="{{ $item->id }}">
                                    <h3 class="mb-2">{{ $item->name }}</h3>
                                    <h5 class="fw-lighter">{{ $item->description }}</h5>
                                </div>
                                <h2>{{ $item->price }} RON</h2>
                            </div>
                            <hr>
                        </div>
                        <div class="item-center">
                            @if(count($item->extras) > 0)
                            <h5 class="m-0">Produse extra</h5>
                            <p class="fw-lighter">Alege-ti produsele extra</p>
                            <div class="border p-3 rounded-3">
                                @foreach($item->extras as $extra)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" data-extra="true" name="extra_{{ $extra->id }}" data-extra-price-original="{{ $extra->price }}" data-extra-price="{{ $extra->price }}" value="{{ $extra->id }}" id="extra{{ $extra->id }}">
                                        <label class="form-check-label fw-normal" for="extra{{ $extra->id }}">
                                            {{ $extra->name }} - @if($extra->type != 1) {{ $extra->price }} RON @else GRATIS @endif
                                        </label>
                                        <div class="quantity-group mt-3 d-none">
                                            <button data-type="deincrement" data-extra-id="{{ $extra->id }}" type="button" class="fw-bold">-</button>
                                            <input type="text" class="quantity-input" name="quantity_{{ $extra->id }}" id="extra_quantity_{{ $extra->id }}" value="0" min="0" readonly>
                                            <button data-type="increment" data-extra-id="{{ $extra->id }}" type="button" class="fw-bold">+</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                            <div class="quantity-group mt-3">
                                <button type="button" class="fw-bold" id="deincrement_quantity">-</button>
                                <input type="text" class="quantity-input" name="quantity" id="quantity-input" value="1" min="1" readonly>
                                <button type="button" class="fw-bold" id="increment_quantity">+</button>
                            </div>
                        </div>
                        <div class="item-bottom mt-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="hidden" name="total_price" id="total_input" value="{{ $item->price }}">
                                <h5 class="m-0">Total: <span id="total">{{ $item->price }}</span> RON</h5>
{{--                                @statusActive--}}
                                <button type="submit" class="btn btn-primary">Adaugă în coș</button>
{{--                                @endstatusActive--}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $('button[data-type="deincrement"]').click(function () {
                let id = $(this).data('extra-id');
                if(!id) {
                    return
                }
                var extraInput = $(`#extra_quantity_${id}`)
                if(extraInput) {
                    let increment = extraInput.val();
                    if(increment > 1) {
                        increment--
                        extraInput.val(increment);

                        let input = $(`input[name="extra_${id}"]`);
                        let original_price = input.data('extra-price-original');
                        input.data('extra-price', increment * original_price);

                        let item_price = {{ $item->price }};
                        let extras = $('input[type="checkbox"]:checked');
                        let quantity = $('#quantity-input').val();
                        var total = item_price * quantity;
                        extras.each(function () {
                            var value = $(this).data('extra-price');
                            total += value * quantity
                        });
                        $('#total').text(total.toFixed(2));
                        $('#total_input').val(total.toFixed(2));
                    }
                }
            });
            $('button[data-type="increment"]').click(function () {
                let id = $(this).data('extra-id');
                if(!id) {
                    return
                }
                var extraInput = $(`#extra_quantity_${id}`)
                if(extraInput) {
                    let increment = extraInput.val();
                    increment++
                    extraInput.val(increment);
                    let input = $(`input[name="extra_${id}"]`);
                    let original_price = input.data('extra-price-original');
                    input.data('extra-price', increment * original_price);

                    let item_price = {{ $item->price }};
                    let extras = $('input[type="checkbox"]:checked');
                    let quantity = $('#quantity-input').val();
                    var total = item_price * quantity;
                    extras.each(function () {
                        var value = $(this).data('extra-price');
                        total += value * quantity
                    });
                    $('#total').text(total.toFixed(2));
                    $('#total_input').val(total.toFixed(2));
                }
            });
            if($('#quantity-input').val() == 1) {
                $('#deincrement_quantity').attr("disabled", true);
            }
            $('#increment_quantity').click(function () {
                let item_price = {{ $item->price }};
                let extras = $('input[type="checkbox"]:checked');
                let quantity = $('#quantity-input').val();
                var qua = ++quantity;
                var total = item_price * qua;
                extras.each(function () {
                    var value = $(this).data('extra-price');
                    total += value * qua
                });
                $('#total').text(total.toFixed(2));
                $('#total_input').val(total.toFixed(2));
                $('#quantity-input').val(qua);
                if($('#quantity-input').val() > 1) {
                    $('#deincrement_quantity').attr("disabled", false);
                }
            });
            $('#deincrement_quantity').click(function () {
                let item_price = {{ $item->price }};
                let extras = $('input[type="checkbox"]:checked');
                let quantity = $('#quantity-input').val();
                var qua = --quantity;
                var total = item_price * qua;
                extras.each(function () {
                    var value = $(this).data('extra-price');
                    total += value * qua
                });
                $('#total').text(total.toFixed(2));
                $('#total_input').val(total.toFixed(2));
                $('#quantity-input').val(qua)
                if($('#quantity-input').val() == 1) {
                    $('#deincrement_quantity').attr("disabled", true);
                }
            });
            $('input[data-extra="true"]').change(function (e) {
                let item_price = {{ $item->price }};
                let extras = $('input[type="checkbox"]:checked');
                let qua = $('#quantity-input').val();
                var total = item_price * qua;
                extras.each(function () {
                    var value = $(this).data('extra-price');
                    total += value * qua
                });
                if(this.checked) {
                    $(this).next().next().removeClass('d-none');
                    $('#total').text(total.toFixed(2));
                    $('#total_input').val(total.toFixed(2));
                    $(this).next().next().children().val(1);
                } else {
                    $(this).next().next().addClass('d-none');
                    $('#total').text(total.toFixed(2));
                    $('#total_input').val(total.toFixed(2));
                    $(this).next().next().children().val(0);
                }
            });
        });
    </script>
@endsection
