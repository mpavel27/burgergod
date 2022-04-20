<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title><?=__('messages.site_name')?></title>
</head>
<body>
<style>
    * {
        font-size: 12px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.description,
    th.description {
        width: 75px;
        max-width: 75px;
    }

    td.quantity,
    th.quantity {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    td.price,
    th.price {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    .centered {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 155px;
        max-width: 155px;
    }

    img {
        max-width: inherit;
        width: inherit;
    }

    @media print {
        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }

    .tabletitle {
        font-size: .5em;
        background: #EEE;
    }

    .costs {
        font-weight: 400;
        margin: 0;
    }

    .total {
        font-size: 20px !important;
        text-align: center;
        margin-top: 10px;
    }

    .total strong {
        font-size: 20px !important;
    }
</style>
<div class="ticket">
    <center><img src="https://cdn.discordapp.com/attachments/680500119007002700/948390229755195452/loard-spin.png" style="width:150px;"></img></center>
    <div id="mid">
        <div class="info">
            <h2>Informații Client</h2>
            <p>NUME : <br><strong>{{ $order->user_name }}</strong></p>
            <p>TELEFON : <br><strong>{{ $order->user_phone_number }}</strong></p>
            @if($order->shipping_type != 2)
            <p>ADRESĂ : <br><strong>{{ $order->city }}, {{ $order->user_address }}</strong></p>
            @endif
            <p style="border-bottom: 1px dashed black; padding-bottom: 10px">METODĂ DE PLATĂ : <br><strong>{{ $order->payment_type }}</strong></p>
        </div>
    </div>
    @foreach(json_decode($order->cart) as $cart)
    <div class="item">
        <p>{{ $cart->quantity }}x {{ \App\Models\Items::where('id', $cart->item)->first()->name }}
            @foreach($cart->extra as $extra)
            <br>
            <span style="margin-left: 10px;"> > {{ \App\Models\Extras::where('id', $extra)->first()->name }}</span>
            @endforeach
        </p>
    </div>
    @endforeach
    <div style="border-top: 1px dashed black; padding-top: 15px;">
        <h6 class="costs">SUB TOTAL: <strong>{{ $order->sub_total }}</strong></h6>
        <h6 class="costs">LIVRARE: <strong>{{ $order->delivery_cost }}</strong></h6>
        <h4 class="costs total">TOTAL: <strong>{{ $order->sub_total + $order->delivery_cost }}</strong></h4>
    </div>
{{--    <table>--}}
{{--        <thead>--}}
{{--        <tr class="tabletitle">--}}
{{--            <th class="quantity">Cant.</th>--}}
{{--            <th class="description">Produse</th>--}}
{{--            <th class="extra">Extra</th>--}}
{{--            <th class="price">Preț</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach(json_decode($order->cart) as $cart)--}}
{{--        <tr>--}}
{{--            <td class="quantity">{{ $cart->quantity }}x</td>--}}
{{--            <td class="description">{{ \App\Models\Items::where('id', $cart->item)->first()->name }}</td>--}}
{{--            <td class="extra"></td>--}}
{{--            <td class="price">{{ \App\Models\Items::where('id', $cart->item)->first()->price }}<br>lei</td>--}}
{{--        </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--        <tr class="tabletitle">--}}
{{--            <td></td>--}}
{{--            <td class="Rate"><h2>Total</h2></td>--}}
{{--            <td class="payment"><h2>{{ $cart->price }} lei</h2></td>--}}
{{--        </tr>--}}
{{--    </table>--}}
    <p class="centered">
        @if($order->notes != 'NULL')
        <p style="border-top: 1px dashed black; padding-top: 10px;">Detalii : <br><strong>{{ $order->notes }}</strong></p>
        @else
        <p style="border-top: 1px dashed black; padding-top: 10px;">Detalii : <br><strong>Nu sunt detalii adaugate</strong></p>
        @endif
        <center><h2 style="border-top: 1px dashed black; padding-top: 10px;">Comandă plasată la</h2></center>
    <center>{{ $order->placed_time }}</p></center>
</div>
<script>
    // window.print();
    // window.onafterprint = (event) => {
    //     setTimeout(function () {
    //         window.location = "{{ route('app.admin.dashboard') }}"
    //     }, 5000)
    // };
</script>
</body>
</html>
