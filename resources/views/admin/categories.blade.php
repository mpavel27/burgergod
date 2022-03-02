@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3">
        <div class="d-flex mb-3 justify-content-between">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Adauga o categorie</button>
        </div>
        <table id="app_dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nume</th>
            </tr>
            </thead>
            <tbody>
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>Nu am gasit nici o categorie in baza noastra de date</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryLabel">Adauga o categorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('app.admin.categories.create') }}">
                    @csrf
                    <div class="modal-body">
                        <input name="name" type="text" class="form-control" placeholder="Numele categoriei">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Creeaza categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
