@extends('layouts.app')
@section('main-container')
    <section class="account py-5">
        <div class="container">
            <div class="d-flex">
                <div class="account-sidebar p-4 rounded-3 shadow border">
                    <ul class="nav flex-column gap-3">
                        <li class="nav-item">
                            <a class="btn btn-secondary active w-100" data-bs-toggle="tab" href="#details">Detaliile mele</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary w-100" data-bs-toggle="tab" href="#orders">Istoric comenzi</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary w-100" data-bs-toggle="tab" href="#addresses">Securitate</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content w-100">
                    <div class="tab-pane show active" id="details">
                        <form method="POST" action="{{ route('app.account.post') }}" class="shadow p-4 rounded-3 border ms-4 w-100">
                            @csrf
                            <h4 class="m-0">Detaliile mele</h4>
                            <hr>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label for="nameLabel" class="fw-lighter">Numele tau</label>
                                    <input type="text" class="form-control py-3" name="name" id="nameLabel" placeholder="Numele dvs." value="{{ $details->name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 my-3">
                                    <label for="nameLabel" class="fw-lighter">Număr de telefon</label>
                                    <input type="text" class="form-control py-3" name="phone_number" id="nameLabel" placeholder="Numărul dvs. de telefon" value="{{ $details->phone_number }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label for="nameLabel" class="fw-lighter">Adresă de e-mail</label>
                                    <input type="email" class="form-control py-3" name="email" id="nameLabel" placeholder="Adresa dvs. de e-mail" value="{{ $details->email }}" disabled="disabled">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 my-3">
                                    <label for="address" class="fw-lighter">Adresă</label>
                                    <input type="text" class="form-control py-3" name="address" id="address" placeholder="Adresă" value="{{ $details->address }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label for="city" class="fw-lighter">Oraș</label>
                                    <input type="text" class="form-control py-3" name="city" id="city" placeholder="Oraș" value="{{ $details->city }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Actualizează</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="orders">
                        <div class="shadow p-4 rounded-3 border ms-4 w-100 table-responsive">
                            <table id="dataTable" class="table table-striped fw-normal" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Produse</th>
                                    <th>Tip Plată</th>
                                    <th>Notițe Adiționale</th>
                                    <th>Adresă</th>
                                    <th>Oraș</th>
                                    <th>Tip Livrare</th>
                                    <th>Preț</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($accountOrders as $order)
                                    <tr>
                                        <td>
                                            @foreach(json_decode($order->cart) as $cart)
                                                <p class="m-0">{{ \App\Models\Items::where('id', $cart->item)->select('name')->first()->name }}</p>
                                            @endforeach
                                        </td>
                                        <td>{{ $order->payment_type }}</td>
                                        @if($order->notes != 'NULL')
                                            <td>{{ $order->notes }}</td>
                                        @else
                                            <td>Fară notițe adiționale</td>
                                        @endif
                                        <td>{{ $order->user_address }}</td>
                                        <td>{{ $order->city }}</td>
                                        @if($order->shipping_type == 1)
                                            <td>Livrare Acasă</td>
                                        @else
                                            <td>Livrare Acasă</td>
                                        @endif
                                        <td>{{ $order->sub_total + $order->delivery_cost }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="addresses">
                        <form method="POST" action="{{ route('app.account.change-password') }}" class="shadow p-4 rounded-3 border ms-4 w-100">
                            @csrf
                            <h4 class="m-0">Securitate</h4>
                            <hr>
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label for="account_password" class="fw-lighter">Parola Actuală</label>
                                    <input type="password" class="form-control py-3" name="actual_password" id="account_password" placeholder="Parola Actuală">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label for="new_password" class="fw-lighter">Parola Nouă</label>
                                    <input type="password" class="form-control py-3" name="new_password" id="new_password" placeholder="Parola Nouă">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Actualizează</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "language": {
                    "url": "{{asset('assets/vendors/romanian.json')}}"
                }
            });
        } );
    </script>
@endsection
