@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3 mb-4">
        <h5 class="m-0">Acum editezi produsul <strong>{{ $item[0]->name }}</strong></h5>
    </div>
    <div class="shadow-lg p-4 rounded-3">
        <label for="name">Nume</label>
        <input id="name" type="text" class="form-control mb-3" placeholder="Nume..." value="{{ $item[0]->name }}">
        <label for="description">Descriere</label>
        <textarea id="description" class="form-control mb-3" placeholder="Descriere...">{{ $item[0]->description }}</textarea>
        <div class="form-group mb-3 d-flex flex-column">
            <label for="imageLabel">Upload your image</label>
            <input type="file" name="image" class="form-control-file" id="imageLabel">
        </div>
        <label for="price">Pret</label>
        <div class="input-group mb-3" id="price">
            <input name="price" class="form-control" placeholder="Pret..." value="{{ $item[0]->price }}">
            <span class="input-group-text">RON</span>
        </div>
    </div>
@endsection
