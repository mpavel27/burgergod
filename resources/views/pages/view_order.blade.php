@extends('layouts.app')
@section('main-container')
    <section class="view-order py-4">
        <div class="container">
            @if($order->status != 5)
            <div class="stepper" id="stepper">
                <div id="step_1" class="step {{ ($order->status > 1) ? 'complete' : 'active' }}">
                    <div class="stepIcon">
                        <i class="fas fa-check"></i>
                        <p class="my-2">Comandă plasată</p>
                        <p class="m-0 date" id="step_1_date">{{$order->placed_time}}</p>
                    </div>
                </div>
                <div id="step_2" class="step {{ ($order->status == 2) ? 'active' : ''}} {{($order->status > 2) ? 'complete' : ''}}">
                    <div class="stepIcon">
                        <i class="fas fa-check"></i>
                        <p class="my-2">Se prepară</p>
                        <p class="m-0 date" id="step_2_date">{{($order->preparing_date == "0000-00-00 00:00:00") ? 'In lucru' : $order->preparing_date}}</p>
                    </div>
                </div>
                <div id="step_3" class="step {{ ($order->status == 3) ? 'active' : ''}} {{($order->status > 3) ? 'complete' : ''}}">
                    <div class="stepIcon">
                        <i class="fas fa-check"></i>
                        @if($order->shipping_type == 2)
                            <p class="my-2">Gata pentru ridicare</p>
                        @else
                            <p class="my-2">In curs de livrare</p>
                        @endif
                        <p class="m-0 date" id="step_3_date">{{($order->dispatching_date == "0000-00-00 00:00:00") ? 'In lucru' : $order->dispatching_date}}</p>
                    </div>
                </div>
                <div id="step_4" class="step {{ ($order->status == 4) ? 'complete' : ''}}">
                     <div class="stepIcon">
                         <i class="fas fa-check"></i>
                         @if($order->shipping_type == 2)
                             <p class="my-2">Comanda a fost ridicată</p>
                         @else
                             <p class="my-2">Livrat</p>
                         @endif
                         <p class="m-0 date" id="step_4_date">{{($order->delivered_date == "0000-00-00 00:00:00") ? 'In lucru' : $order->delivered_date}}</p>
                    </div>
                </div>
            </div>
            @endif
            <h4 class="text-center mb-4 {{ ($order->status != 5) ? 'd-none' : ''}}" id="reject_order"><i class="fas fa-exclamation-triangle text-danger"></i> Comanda dvs. a fost refuzată, ne pare rău vă rugăm să reveniți mai târziu.</h4>
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="shadow border p-4 rounded-3">
                        <h4>Vezi detalii comandă</h4>
                        <hr>
                        <div class="border rounded-3 p-3 mb-3">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Produs</th>
                                    <th scope="col">Extra</th>
                                    <th scope="col">Pret</th>
                                    <th scope="col">Cantitate</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach(json_decode($order->cart) as $cart)
                                        <tr>
                                            <td class="align-middle"><img class="img-fluid cart-image" src="{{ asset('/items/'. \App\Models\Items::where('id', $cart->item)->select('image')->first()->image) }}"></td>
                                            <td class="align-middle">{{ \App\Models\Items::where('id', $cart->item)->select('name')->first()->name }}</td>
                                            <td class="align-middle">{{ implode(", ", array_map(function($n){ return \App\Models\Extras::where('id', $n)->select('name')->first()->name; }, (array)$cart->extra)) }}</td>
                                            <td class="align-middle">{{ \App\Models\Items::where('id', $cart->item)->select('price')->first()->price }} RON</td>
                                            <td class="align-middle">{{ $cart->quantity }} buc.</td>
                                            <td class="align-middle">{{ $cart->price }} RON</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="border p-4 rounded-3">
                        <h4>Date personale</h4>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Nume</h5>
                            <p class="m-0">{{ $order->user_name }}</p>
                        </div>
                        @if($order->shipping_type == 1)
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Oraș</h5>
                            <p class="m-0">{{ $order->city }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Adresă</h5>
                            <p class="m-0">{{ $order->user_address }}</p>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Payment Type</h5>
                            <p class="m-0 text-capitalize">{{ $order->payment_type }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Shipping Type</h5>
                            <p class="m-0">{{ ($order->shipping_type == 1) ? 'Home' : 'Local Pickup' }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Subtotal</h5>
                            <p class="m-0">{{ $order->sub_total }} RON</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="m-0">Taxa de livrare</h5>
                            <p class="m-0">{{ $order->delivery_cost }} RON</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-0">Total</h5>
                            <p class="m-0">{{ $order->sub_total + $order->delivery_cost }} RON</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var sound = new Audio('{{ asset("assets/sounds/status_update.wav") }}');
        $(document).ready(function() {
            Echo.channel("orderDetailsChannel-{{$order->id}}")
            .listen('OrderDetails', (e) => {
                var active = $('.active');
                active.removeClass('active');
                active.addClass('complete');
                if (e.update == 5) {
                    $('#stepper').hide();
                    $('#reject_order').removeClass('d-none');
                } else if(e.update == 4) {
                    $('#step_' + e.update).addClass('complete');
                } else {
                    $('#step_' + e.update).addClass('active');
                }
                $('#step_' + e.update + '_date').text(e.date);
                sound.play();
            });
        });
    </script>
@endsection
