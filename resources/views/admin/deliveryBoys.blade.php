@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3">
        <div class="d-flex mb-3 justify-content-between">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeliveryBoy">Adauga un livrator</button>
        </div>
        @if(count($boys) > 0)
            <div class="table-responsive">
                <table id="admin_categories" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nume</th>
                        <th>Placuta de inmatriculare</th>
                        <th>Comenzi livrate</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($boys as $boy)
                        <tr>
                            <td>{{ $boy->id }}</td>
                            <td>{{ $boy->name }}</td>
                            <td>{{ $boy->car_number_plate }}</td>
                            <td>0</td>
                            <td>
                                <div class="d-flex">
                                    <a href="" class="btn-square btn-danger me-2"><i class="fas fa-trash-alt"></i></a>
                                    <a href="" class="btn-square btn-secondary"><i class="fas fa-pen"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            Nu am gasit nici un livrator in baza noastra de date
        @endif
    </div>
    <div class="modal fade" id="addDeliveryBoy" tabindex="-1" aria-labelledby="addDeliveryBoyLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDeliveryBoyLabel">Adauga un livrator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('app.admin.delivery-boys.post') }}">
                    @csrf
                    <div class="modal-body">
                        <input name="name" type="text" class="form-control mb-3" placeholder="Nume Prenume">
                        <input name="phone_number" type="text" class="form-control mb-3" placeholder="Numar de telefon">
                        <input name="email" type="email" class="form-control mb-3" placeholder="Adresa de e-mail">
                        <input name="password" type="password" class="form-control mb-3" placeholder="Parola">
                        <input name="car_number_plate" type="text" class="form-control mb-3" placeholder="Placuta masina">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Aduaga un livrator</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
