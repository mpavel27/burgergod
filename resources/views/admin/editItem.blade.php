@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3 mb-4">
        <h5 class="m-0">Acum editezi produsul <strong>{{ $item[0]->name }}</strong></h5>
    </div>
    <form method="POST" action="{{ route('app.admin.item.edit.post', ['itemId' => $item[0]->id]) }}" enctype="multipart/form-data" class="shadow-lg p-4 rounded-3">
        @csrf
        <label for="name">Nume</label>
        <input id="name" type="text" name="name" class="form-control mb-3" placeholder="Nume..." value="{{ $item[0]->name }}">
        <label for="description">Descriere</label>
        <textarea id="description" name="description" class="form-control mb-3" placeholder="Descriere...">{{ $item[0]->description }}</textarea>
        <div class="form-group mb-3 d-flex flex-column">
            <label for="imageLabel">Upload your image</label>
            <input type="file" name="image" class="form-control-file" id="imageLabel">
        </div>
        <label for="price">Pret</label>
        <div class="input-group mb-3" id="price">
            <input name="price" class="form-control" placeholder="Pret..." value="{{ $item[0]->price }}">
            <span class="input-group-text">RON</span>
        </div>
        <select class="form-control mb-3" name="category">
            <option>Selecteaza o categorie</option>
            @foreach($categories as $category)
                <option @if($category->id == $item[0]->category) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary w-100">Salveaza</button>
    </form>
@endsection
