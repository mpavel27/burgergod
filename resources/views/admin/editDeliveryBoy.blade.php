@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3 mb-4">
        <h5 class="mb-3">Acum editezi livratorul <strong>{{ $delivery->name }}</strong></h5>
        <form method="POST" action="{{ route('app.admin.delivery-boys.edit.post', ['deliveryId' => $delivery->id]) }}">
            @csrf
            <input name="name" type="text" class="form-control mb-3" placeholder="Nume Prenume" value="{{ $delivery->name }}">
            <input name="phone_number" type="text" class="form-control mb-3" placeholder="Număr de telefon" value="{{ $delivery->phone_number }}">
            <input name="email" type="email" class="form-control mb-3" placeholder="Adresă de e-mail" value="{{ $delivery->email }}">
            <input name="car_number_plate" type="text" class="form-control mb-3" placeholder="Număr mașină" value="{{ $delivery->car_number_plate }}">
            <button type="submit" class="btn btn-primary">Adaugă un livrator</button>
        </form>
    </div>
@endsection
