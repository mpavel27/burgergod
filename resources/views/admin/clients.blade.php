@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3">
        <div class="table-responsive">
            <table id="app_dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>E-mail</th>
                    <th>Număr de telefon</th>
                    <th>Adresă</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone_number }}</td>
                        <td>{{ $client->city }}, {{ $client->address }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
