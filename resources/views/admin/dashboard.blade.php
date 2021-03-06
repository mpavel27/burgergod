@extends('admin.layouts.main')
@section('admin-container')
@if(Auth::user()->type == 2)
{{--    <h4>Dashboard</h4>--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-4 mb-4">--}}
{{--            <div class="bg-primary p-4 rounded-3">--}}
{{--                <div class="d-flex flex-column justify-content-start text-white">--}}
{{--                    <h3 class="m-0">0</h3>--}}
{{--                    <p class="m-0">Comenzi astazi</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4 mb-4">--}}
{{--            <div class="bg-secondary p-4 rounded-3">--}}
{{--                <div class="d-flex flex-column justify-content-start text-white">--}}
{{--                    <h3 class="m-0">0</h3>--}}
{{--                    <p class="m-0">Comenzi totale</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4 mb-4">--}}
{{--            <div class="bg-success p-4 rounded-3">--}}
{{--                <div class="d-flex flex-column justify-content-start text-white">--}}
{{--                    <h3 class="m-0">0</h3>--}}
{{--                    <p class="m-0">Comenzi acceptate</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <h4>Comenzi Noi</h4>
    <div class="shadow-lg p-4 rounded-3 table-responsive">
    <table class="table table-striped" style="width:100%">
        <thead>
        <tr>
{{--            <th>#</th>--}}
{{--            <th>Name</th>--}}
{{--            <th>Address</th>--}}
            <th></th>
{{--            @if(Auth::user()->type == 2)--}}
{{--            <th>Printează</th>--}}
{{--            @endif--}}
{{--            <th>Status</th>--}}
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
{{--                <td class="align-middle">{{ $order->id }}</td>--}}
{{--                <td class="align-middle">{{ $order->user_name }}</td>--}}
{{--                @if($order->user_address == null)--}}
{{--                    <td class="align-middle">Ridicare de la restaurant</td>--}}
{{--                @else--}}
{{--                <td class="align-middle">{{ $order->user_address }}</td>--}}
{{--                @endif--}}
                @php
                    $cart = $order->cart;
                    $cart = json_decode($cart);
                    $products = "";
                    foreach ($cart as $cartData) {
                        $cartData->name = \App\Http\Controllers\AdminController::getProductNameById($cartData->item);
                        $extras = implode(", ", array_map(function($n, $item){ return \App\Models\Extras::where('id', $n)->select('name')->first()->name .' x'.$item; }, (array)$cartData->extra, (array)$cartData->extraQuantity));
                        $products .= $cartData->name." ".$extras."<br>";
                    }
                @endphp
                <td class="align-middle"><button type="button" onclick="viewDetails('{{ $order->id }}', '{{ $order->user_name }}', '{{ $order->user_phone_number }}', '{{ $order->user_address }}', '{{ $order->user_email }}', '{{ $order->payment_type }}', '{{ $order->city }}', '{{ $order->shipping_type }}', '{{ $order->sub_total }}', '{{ $order->delivery_cost }}', '{{ $order->placed_time }}', '{{ $order->preparing_date }}', '{{ $order->dispatching_date }}', '{{ $order->delivered_date }}', '{{ $products }}')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewDetails">Vezi mai multe</button></td>
{{--                @if(Auth::user()->type == 2)--}}
{{--                <td class="align-middle"><a href="{{ route('app.admin.print', ['id' => $order->id]) }}" class="btn btn-secondary"><i class="fas fa-print"></i></a></td>--}}
{{--                @endif--}}
{{--                @if($order->status == 1)--}}
{{--                <td class="align-middle">Placed</td>--}}
{{--                @elseif($order->status == 2)--}}
{{--                <td class="align-middle">Preparing</td>--}}
{{--                @elseif($order->status == 3)--}}
{{--                <td class="align-middle">Dispatching</td>--}}
{{--                @else--}}
{{--                <td class="align-middle">Delivered</td>--}}
{{--                @endif--}}
                <td class="align-middle">
                    <div class="d-flex">
                        @if($order->status == 1)
                        <form method="POST" action="{{ route('app.admin.order.action', ['id' => $order->id, 'type' => 2]) }}">
                            @csrf
                            <button type='submit' class="btn btn-success">Acceptă</button>
                        </form>
                        <form method="POST" action="{{ route('app.admin.order.action', ['id' => $order->id, 'type' => 5]) }}">
                            @csrf
                            <button class="btn btn-warning mx-3">Respinge</button>
                        </form>
                        @elseif($order->status == 2)
                            @if($order->shipping_type == 2)
                                <button onclick="finishOrder({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#finishOrder">Se poate ridica</button>
                            @else
                                <button onclick="assignOrder({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignOrder">Atribuie un livrator</button>
                            @endif
                        @elseif($order->status == 3 && $order->assigned_to != 0)
                            @if($order->assigned_to == Auth::user()->id)
                                <button onclick="markAsDelivered({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#markAsDelivered">Marcheaza ca livrat</button>
                            @else
                                În curs de livrare - {{ $order->delivery_name }} <button onclick="assignOrder({{ $order->id }})" type="button" class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#assignOrder">Schimbă livrator</button>
                            @endif
                        @elseif($order->status == 3)
                            <button onclick="markFinishedOrder({{ $order->id }})" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#markedAsFinishedOrder">Marchează ca ridicat</button>
                        @elseif($order->status == 4)
                            Comanda a fost ridicată/livrată.
                        @else
                            Comanda a fost refuzată.
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <h4 class="my-4">Comenzi in lucru</h4>
    <div class="shadow-lg p-4 rounded-3 table-responsive">
        <table id="app_dataTable2" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Mai multe detalii</th>
                @if(Auth::user()->type == 2)
                    <th>Printează</th>
                @endif
                <th>Acțiune</th>
            </tr>
            </thead>
            <tbody>
                @foreach($workOrders as $order)
                    <tr>
                        @php
                            $cart = $order->cart;
                            $cart = json_decode($cart);
                            $products = "";
                            foreach ($cart as $cartData) {
                                $cartData->name = \App\Http\Controllers\AdminController::getProductNameById($cartData->item);
                                $extras = implode(", ", array_map(function($n, $item){ return \App\Models\Extras::where('id', $n)->select('name')->first()->name .' x'.$item; }, (array)$cartData->extra, (array)$cartData->extraQuantity));
                                $products .= $cartData->name." ".$extras."<br>";
                            }
                        @endphp
                        <td class="align-middle"><button type="button" onclick="viewDetails('{{ $order->id }}', '{{ $order->user_name }}', '{{ $order->user_phone_number }}', '{{ $order->user_address }}', '{{ $order->user_email }}', '{{ $order->payment_type }}', '{{ $order->city }}', '{{ $order->shipping_type }}', '{{ $order->sub_total }}', '{{ $order->delivery_cost }}', '{{ $order->placed_time }}', '{{ $order->preparing_date }}', '{{ $order->dispatching_date }}', '{{ $order->delivered_date }}', '{{ $products }}')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewDetails">Vezi mai multe</button></td>
                        @if(Auth::user()->type == 2)
                        <td class="align-middle"><a href="{{ route('app.admin.print', ['id' => $order->id]) }}" class="btn btn-secondary"><i class="fas fa-print"></i></a></td>
                        @endif
                        <td>
                            @if($order->status == 1)
                                <form method="POST" action="{{ route('app.admin.order.action', ['id' => $order->id, 'type' => 2]) }}">
                                    @csrf
                                    <button type='submit' class="btn btn-success">Acceptă</button>
                                </form>
                                <form method="POST" action="{{ route('app.admin.order.action', ['id' => $order->id, 'type' => 5]) }}">
                                    @csrf
                                    <button class="btn btn-warning mx-3">Respinge</button>
                                </form>
                            @elseif($order->status == 2)
                                @if($order->shipping_type == 2)
                                    <button onclick="finishOrder({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#finishOrder">Se poate ridica</button>
                                @else
                                    <button onclick="assignOrder({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignOrder">Atribuie un livrator</button>
                                @endif
                            @elseif($order->status == 3 && $order->assigned_to != 0)
                                @if($order->assigned_to == Auth::user()->id)
                                    <button onclick="markAsDelivered({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#markAsDelivered">Marcheaza ca livrat</button>
                                @else
                                    În curs de livrare - {{ $order->delivery_name }} <button onclick="assignOrder({{ $order->id }})" type="button" class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#assignOrder">Schimbă livrator</button>
                                @endif
                            @elseif($order->status == 3)
                                <button onclick="markFinishedOrder({{ $order->id }})" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#markedAsFinishedOrder">Marchează ca ridicat</button>
                            @elseif($order->status == 4)
                                Comanda a fost ridicată/livrată.
                            @else
                                Comanda a fost refuzată.
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h4 class="my-4">Comenzi finalizate</h4>
    <div class="shadow-lg p-4 rounded-3 table-responsive">
        <table id="app_dataTable" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Mai multe detalii</th>
                <th>Acțiune</th>
            </tr>
            </thead>
            <tbody>
            @foreach($finishedOrders as $order)
                <tr>
                    @php
                        $cart = $order->cart;
                        $cart = json_decode($cart);
                        $products = "";
                        foreach ($cart as $cartData) {
                            $cartData->name = \App\Http\Controllers\AdminController::getProductNameById($cartData->item);
                            $extras = implode(", ", array_map(function($n, $item){ return \App\Models\Extras::where('id', $n)->select('name')->first()->name .' x'.$item; }, (array)$cartData->extra, (array)$cartData->extraQuantity));
                            $products .= $cartData->name." ".$extras."<br>";
                        }
                    @endphp
                    <td class="align-middle"><button type="button" onclick="viewDetails('{{ $order->id }}', '{{ $order->user_name }}', '{{ $order->user_phone_number }}', '{{ $order->user_address }}', '{{ $order->user_email }}', '{{ $order->payment_type }}', '{{ $order->city }}', '{{ $order->shipping_type }}', '{{ $order->sub_total }}', '{{ $order->delivery_cost }}', '{{ $order->placed_time }}', '{{ $order->preparing_date }}', '{{ $order->dispatching_date }}', '{{ $order->delivered_date }}', '{{ $products }}')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewDetails">Vezi mai multe</button></td>
                    <td>
                        @if($order->status == 1)
                            <form method="POST" action="{{ route('app.admin.order.action', ['id' => $order->id, 'type' => 2]) }}">
                                @csrf
                                <button type='submit' class="btn btn-success">Acceptă</button>
                            </form>
                            <form method="POST" action="{{ route('app.admin.order.action', ['id' => $order->id, 'type' => 5]) }}">
                                @csrf
                                <button class="btn btn-warning mx-3">Respinge</button>
                            </form>
                        @elseif($order->status == 2)
                            @if($order->shipping_type == 2)
                                <button onclick="finishOrder({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#finishOrder">Se poate ridica</button>
                            @else
                                <button onclick="assignOrder({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignOrder">Atribuie un livrator</button>
                            @endif
                        @elseif($order->status == 3 && $order->assigned_to != 0)
                            @if($order->assigned_to == Auth::user()->id)
                                <button onclick="markAsDelivered({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#markAsDelivered">Marcheaza ca livrat</button>
                            @else
                                În curs de livrare - {{ $order->delivery_name }} <button onclick="assignOrder({{ $order->id }})" type="button" class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#assignOrder">Schimbă livrator</button>
                            @endif
                        @elseif($order->status == 3)
                            <button onclick="markFinishedOrder({{ $order->id }})" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#markedAsFinishedOrder">Marchează ca ridicat</button>
                        @elseif($order->status == 4)
                            Comanda a fost ridicată/livrată.
                        @else
                            Comanda a fost refuzată.
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @if(Auth::user()->type == 1)
    <h4 class="my-4">Comenzi atribuite</h4>
    <div class="shadow-lg p-4 rounded-3 table-responsive">
        <table id="app_dataTable2" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Mai multe detalii</th>
                <th>Acțiune</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orderAssigned as $order)
                <tr>
                    @php
                        $cart = $order->cart;
                        $cart = json_decode($cart);
                        $products = "";
                        foreach ($cart as $cartData) {
                            $cartData->name = \App\Http\Controllers\AdminController::getProductNameById($cartData->item);
                            $extras = implode(", ", array_map(function($n, $item){ return \App\Models\Extras::where('id', $n)->select('name')->first()->name .' x'.$item; }, (array)$cartData->extra, (array)$cartData->extraQuantity));
                            $products .= $cartData->name." ".$extras."<br>";
                        }
                    @endphp
                    <td class="align-middle"><button type="button" onclick="viewDetails('{{ $order->id }}', '{{ $order->user_name }}', '{{ $order->user_phone_number }}', '{{ $order->user_address }}', '{{ $order->user_email }}', '{{ $order->payment_type }}', '{{ $order->city }}', '{{ $order->shipping_type }}', '{{ $order->sub_total }}', '{{ $order->delivery_cost }}', '{{ $order->placed_time }}', '{{ $order->preparing_date }}', '{{ $order->dispatching_date }}', '{{ $order->delivered_date }}', '{{ $products }}')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewDetails">Vezi mai multe</button></td>
                    <td>
                        @if($order->status == 3 && $order->assigned_to != 0)
                            @if($order->assigned_to == Auth::user()->id)
                                <button onclick="markAsDelivered({{ $order->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#markAsDelivered">Marcheaza ca livrat</button>
                            @else
                                În curs de livrare - {{ $order->delivery_name }} <button onclick="assignOrder({{ $order->id }})" type="button" class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#assignOrder">Schimbă livrator</button>
                            @endif
                        @elseif($order->status == 3)
                            <button onclick="markFinishedOrder({{ $order->id }})" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#markedAsFinishedOrder">Marchează ca ridicat</button>
                        @elseif($order->status == 4)
                            Comanda a fost ridicată/livrată.
                        @else
                            Comanda a fost refuzată.
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif
    <div class="modal fade" id="viewDetails" tabindex="-1" aria-labelledby="viewDetailsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDetailsLabel">Detalii comandă</h5>
                    <button type="button" class="btn-close details_close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="details_form">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary details_close" data-bs-dismiss="modal" aria-label="Close">Închide</button>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->type == 1)
    <div class="modal fade" id="markAsDelivered" tabindex="-1" aria-labelledby="markedAsDeliveredLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="markedAsDeliveredLabel">Marchează ca livrat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('app.admin.mark.picked-up') }}">
                    @csrf
                    <div class="modal-body">
                        <input id="mark_delivered_order_id" type="hidden" name="id_order">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Marchează ca livrat</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    <div class="modal fade" id="markedAsFinishedOrder" tabindex="-1" aria-labelledby="markedAsFinishedOrderLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="markedAsFinishedOrderLabel">Marchează ca ridicat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('app.admin.mark.picked-up') }}">
                    @csrf
                    <div class="modal-body">
                        <input id="mark_finish_order_id" type="hidden" name="id_order">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Marchează ca ridicat</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="finishOrder" tabindex="-1" aria-labelledby="finishOrderLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="finishOrderLabel">Se poate ridica</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('app.admin.mark.pick-up') }}">
                    @csrf
                    <div class="modal-body">
                        <input id="finish_order_id" type="hidden" name="id_order">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Se poate ridica</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="assignOrder" tabindex="-1" aria-labelledby="assignOrderLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignOrderLabel">Atribuie livratorul</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('app.admin.assign.order') }}">
                    @csrf
                    <div class="modal-body">
                        <input id="order_id" name="id_order" type="hidden">
                        <select name="delivery_boy" class="form-control mb-3" id="product">
                            <option selected>Selectează livratorul</option>
                            @foreach($deliveryBoys as $deliveryBoy)
                                <option value="{{ $deliveryBoy->id }}">{{ $deliveryBoy->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Atribute livratorul</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
