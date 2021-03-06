@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3">
        <div class="d-flex mb-3 justify-content-between">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExtra">Adaugă un extra</button>
        </div>
        @if(count($extras) > 0)
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
                    @foreach($extras as $extra)
                        <tr>
                            <td>{{ $extra->id }}</td>
                            <td>{{ $extra->name }}</td>
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
            Nu am găsit nici un extra în baza noastră de date
        @endif
    </div>
    <div class="modal fade" id="addExtra" tabindex="-1" aria-labelledby="addExtraLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExtraLabel">Adaugă un extra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('app.admin.extras.create') }}">
                    @csrf
                    <div class="modal-body">
                        <input name="name" type="text" class="form-control mb-3" placeholder="Nume extra">
                        <select name="product" class="form-control mb-3" id="product">
                            <option selected>Selectează produsul</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="value" value="1" id="valueId1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Gratis
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="value" value="2" id="valueId2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Pret
                            </label>
                        </div>
                        <div class="input-group mt-3" id="price">
                            <input name="price" class="form-control" id="priceInput" placeholder="Preț">
                            <span class="input-group-text">RON</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Creează extra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
