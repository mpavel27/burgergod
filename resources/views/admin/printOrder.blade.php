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
</style>
<div class="ticket">
    <center><img src="https://cdn.discordapp.com/attachments/680500119007002700/948390229755195452/loard-spin.png" style="width:150px;"></img></center>
    <div id="mid">
        <div class="info">
            <center><h2>Informații Client</h2></center>
            <p class="centered">
                Nume : <strong>{{ $order->user_name }}</strong></br>
                Telefon : <strong>{{ $order->user_phone_number }}</strong></br>
                @if($order->shipping_type != 2)
                Adresă : <strong>{{ $order->user_address }}</strong></br>
                Oraș   : <strong>{{ $order->user_city }}</strong></br>
                @endif
            </p>
        </div>
    </div>
    <table>
        <thead>
        <tr class="tabletitle">
            <th class="quantity">Cant.</th>
            <th class="description">Produse</th>
            <th class="price">Preț</th>
        </tr>
        </thead>
        <tbody>
        @foreach(json_decode($order->cart) as $cart)
        <tr>
            <td class="quantity">{{ $cart->quantity }}x</td>
            <td class="description">{{ \App\Models\Items::where('id', $cart->item)->first()->name }}</td>
            <td class="price">{{ \App\Models\Items::where('id', $cart->item)->first()->price }}<br>lei</td>
        </tr>
        @endforeach
        </tbody>
        <tr class="tabletitle">
            <td></td>
            <td class="Rate"><h2>Total</h2></td>
            <td class="payment"><h2>{{ $cart->price }} lei</h2></td>
        </tr>
    </table>
    <p class="centered">
        <center><h2>Comandă plasată la</h2></center>
    <center>{{ $order->placed_time }}</p></center>
</div>
<script>
    window.print();
    window.onafterprint = (event) => {
        window.location = "{{ route('app.admin.dashboard') }}"
    };
</script>
</body>
</html>
