@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3">
        <div class="d-flex mb-3 justify-content-between">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Adauga o categorie</button>
        </div>
        @if(count($categories) > 0)
        <div class="table-responsive">
            <table id="admin_categories" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>Acțiune</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('app.admin.category.delete', ['categoryId' => $category->id]) }}" class="btn-square btn-danger me-2"><i class="fas fa-trash-alt"></i></a>
                                    <a href="{{ route('app.admin.category.edit', ['categoryId' => $category->id]) }}" class="btn-square btn-secondary"><i class="fas fa-pen"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            Nu s-a găsit nici o categorie în baza noastra de date
        @endif
    </div>
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryLabel">Adaugă o categorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('app.admin.categories.create') }}">
                    @csrf
                    <div class="modal-body">
                        <input name="name" type="text" class="form-control" placeholder="Numele categoriei">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Creează categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
