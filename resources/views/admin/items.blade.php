@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3">
        <div class="d-flex mb-3 justify-content-between">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">Adauga un produs</button>
        </div>
        @if(count($items) > 0)
        <div class="table-responsive">
            <table id="app_dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>Categorie</th>
                    <th>Descriere</th>
                    <th>Pret</th>
                    <th>Imagine</th>
                    <th>Actiune</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }} RON</td>
                    <td><img src="{{ asset('items/'.$item->image) }}" style="width: 100px"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('app.admin.item.edit', ['itemId' => $item->id]) }}" class="btn-square btn-secondary me-2"><i class="fas fa-pen"></i></a>
                            <a href="{{ route('app.admin.item.delete', ['itemId' => $item->id]) }}" class="btn-square btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @else
            Nu am gasit nici un produs in baza noastra de date
        @endif
    </div>
    <div class="modal fade" id="addItem" tabindex="-1" aria-labelledby="addItemLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemLabel">Adauga un nou produs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('app.admin.item.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input name="name" type="text" class="form-control mb-3" placeholder="Numele produsului">
                        <textarea name="description" class="form-control mb-3" placeholder="Descriere"></textarea>
                        <div class="form-group mb-3">
                            <label for="imageLabel">Upload your image</label>
                            <input type="file" name="image" class="form-control-file" id="imageLabel">
                        </div>
                        <div class="input-group mb-3">
                            <input name="price" class="form-control" placeholder="Pret">
                            <span class="input-group-text">RON</span>
                        </div>
                        <select name="category" class="form-control">
                            <option selected>Selecteaza o categorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Creeaza produsul</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
