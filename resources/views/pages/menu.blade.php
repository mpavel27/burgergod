@extends('layouts.app')
@section('main-container')
<section class="menu-page">
    <div class="container">
        <div class="nav-breadcrumb my-4">
            <ul class="list-unstyled m-0 d-flex flex-row gap-4">
                <li>
                    <a class="page" href="{{ route('app.home') }}">Acasă</a>
                </li>
                <li class="d-flex align-items-center">
                    <i class="fas fa-circle separator"></i>
                </li>
                <li>
                    <a class="current-page" href="{{ Request::url() }}">Meniu</a>
                </li>
            </ul>
        </div>
        @foreach($categories as $category)
        <h3 class="fw-bold my-4">{{ $category->name }}</h3>
        <div class="row">
            @foreach($category->items as $item)
            <div class="col-md-6 mb-3">
                <div class="menu_product_bg position-relative">
                    <div class="d-flex align-items-center gap-4">
                        <img src="{{ asset('items/'.$item->image) }}" height="100">
                        <div class="product-desc">
                            <div>
                                <h3 class="fw-bold">{{ $item->name }}</h3>
                                <p class="fw-normal mb-1">{{ $item->description }}</p>
                            </div>
                            <h3 class="m-0">{{ explode(".", strval(number_format($item->price, 2)))[0] }}<sup>.{{ explode(".", strval(number_format($item->price, 2)))[1] }}</sup> RON</h3>
                        </div>
                    </div>
                    @if($item->calories != 0 && $item->grams != 0)
                    <div type="button" class="item-info" data-tooltip="Grame: {{ $item->grams }} | Calorii: {{ $item->calories }}"><i class="fas fa-info"></i></div>
                    @elseif($item->calories > 0)
                        <div type="button" class="item-info" data-tooltip="Calorii: {{ $item->calories }}"><i class="fas fa-info"></i></div>
                    @elseif($item->grams > 0)
                        <div type="button" class="item-info" data-tooltip="Grame: {{ $item->grams }}"><i class="fas fa-info"></i></div>
                    @endif
                    <a href="{{ route('app.item', ['id' => $item->id]) }}" class="btn-square btn-primary buy-now"><i class="fad fa-shopping-cart"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
@endsection
