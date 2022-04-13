@extends('layouts.app')
@section('main-container')
<section class="menu-page">
    <div class="container">
        @foreach($categories as $category)
        <h3 class="fw-bold my-4">{{ $category->name }}</h3>
        <div class="row">
            @foreach($category->items as $item)
            <div class="col-md-6 mb-3">
                <div class="menu_product_bg position-relative">
                    <div class="d-flex align-items-center gap-4">
                        <img src="{{ asset('items/'.$item->image) }}" height="100">
                        <div>
                            <h3 class="fw-bold">{{ $item->name }}</h3>
                            <p class="fw-normal mb-1">{{ $item->description }}</p>
                            <h3 class="m-0">{{ $item->price }} RON</h3>
                        </div>
                    </div>
                    <a href="{{ route('app.item', ['id' => $item->id]) }}" class="btn-square btn-primary buy-now"><i class="fad fa-shopping-cart"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
@endsection
{{--@section('main-container')--}}
{{--    <section class="about">--}}
{{--        @foreach($categories as $category)--}}
{{--            <div class="container">--}}
{{--                <div class="text-center mt-5 mb-5">--}}
{{--                    <h4 class="mb-3">{{ $category->name }}</h4>--}}
{{--                    <h5 class="text-uppercase fw-bold mt-3">Preparatele noastre</h5>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    @foreach($category->items as $item)--}}
{{--                        <div class="col-lg-3 mb-4">--}}
{{--                            <div class="burger-image">--}}
{{--                                <a href="{{ route('app.item', ['id' => $item->id]) }}" class="btn btn-primary">COMANDĂ</a>--}}
{{--                                <img src="{{ asset('items/'.$item->image) }}" height="250">--}}
{{--                            </div>--}}
{{--                            <p class="burger-title text-center mt-2">{{ $item->name }}</p>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </section>--}}
{{--@endsection--}}
