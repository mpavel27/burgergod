@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3">
        <div class="d-flex mb-3 justify-content-between">
            <button class="btn btn-primary">Adauga un produs</button>
        </div>
        <table id="app_dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nume</th>
                <th>Categorie</th>
                <th>Descriere</th>
                <th>Pret</th>
            </tr>
            </thead>
            <tbody>
            @if(count($items) > 0)
            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}</td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td>Nu am gasit nici un produs in baza noastra de date</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
