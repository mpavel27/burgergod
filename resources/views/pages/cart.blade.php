@extends('layouts.app')
@section('main-container')
    <section class="cart my-5">
        <div class="container">
            <h4 class="mb-3">Coș cu cumpărături</h4>
            <div class="row">
                <div class="col-lg-8">
                    <div class="shadow border rounded-3 p-3 mb-3">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Produs</th>
                                    <th scope="col">Extra</th>
                                    <th scope="col">Pret</th>
                                    <th scope="col">Cantitate</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(is_array($items) && count($items) > 0)
                                @foreach($items as $key => $item)
                                    <tr>
                                        <th scope="row" class="align-middle">
                                            <form method="POST" action="{{ route('app.cart.remove', ['index' => $key]) }}">
                                                @csrf
                                                <button type="submit" class="delete-product"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </th>
                                        <td class="align-middle"><img class="img-fluid cart-image" src="{{ asset('/items/'. \App\Models\Items::where('id', $item->item)->select('image')->first()->image) }}"></td>
                                        <td class="align-middle">{{ \App\Models\Items::where('id', $item->item)->select('name')->first()->name }}</td>
{{--                                        {{ dd(array_map(function($n){ return \App\Models\Extras::where('id', $n)->select('name')->first(); }, (array)$item->extra)) }}--}}
                                        <td class="align-middle">{{ implode(", ", array_map(function($n){ return \App\Models\Extras::where('id', $n)->select('name')->first()->name; }, (array)$item->extra)) }}</td>
                                        <td class="align-middle">{{ \App\Models\Items::where('id', $item->item)->select('price')->first()->price }} RON</td>
                                        <td class="align-middle">{{ $item->quantity }} buc.</td>
                                        <td class="align-middle">{{ $item->price }} RON</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">Nu ai nici un produs in cosul tau de cumparaturi</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="rounded-2 border p-4">
                        <h4>Detalii Cumpărături</h4>
                        <hr>
                        @if(is_array($items) && count($items) > 0)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="m-0">Subtotal</h5>
                                <p class="m-0">{{ array_sum(array_map(function ($e) { return $e->price; }, $items)) }} RON</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0">Total</h5>
                                <p class="m-0">{{ array_sum(array_map(function ($e) { return $e->price; }, $items)) }} RON</p>
                            </div>
                        @else
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="m-0">Subtotal</h5>
                                <p class="m-0">0 RON</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0">Total</h5>
                                <p class="m-0">0 RON</p>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('app.cart.post') }}">
                            @csrf
                            <div class="border rounded-2 p-3 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipment" value="1" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="shipment">
                                        Livrare Acasă
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipment" value="2" id="flexRadioDefault2">
                                    <label class="form-check-label" for="shipment">
                                        Ridicare de la noi
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-3" @if(!is_array($items) || (is_array($items) && count($items) == 0)) disabled="true" @endif>Finalizare comandă</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
