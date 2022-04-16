@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3 mb-4">
        <h5 class="m-0">Acum editezi produsul <strong>{{ $item->name }}</strong></h5>
    </div>
    <form method="POST" action="{{ route('app.admin.item.edit.post', ['itemId' => $item->id]) }}" enctype="multipart/form-data" class="shadow-lg p-4 rounded-3">
        @csrf
        <div class="form-check form-switch">
            @if($item->visible == 0)
                <input class="form-check-input" name="visible" type="checkbox" role="switch" id="flexSwitchCheckChecked">
            @else
                <input class="form-check-input" name="visible" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
            @endif
            <label class="form-check-label" for="flexSwitchCheckChecked">Produs vizibil pe site</label>
        </div>
        <label for="name">Nume</label>
        <input id="name" type="text" name="name" class="form-control mb-3" placeholder="Nume..." value="{{ $item->name }}">
        <label for="description">Descriere</label>
        <textarea id="description" name="description" class="form-control mb-3" placeholder="Descriere...">{{ $item->description }}</textarea>
        <label for="grams">Grame</label>
        <input id="grams" type="number" name="grams" class="form-control mb-3" placeholder="Grame..." value="{{ $item->grams }}">
        <label for="calories">Grame</label>
        <input id="calories" type="number" name="calories" class="form-control mb-3" placeholder="Calorii..." value="{{ $item->calories }}">
        <div class="form-group mb-3 d-flex flex-column">
            <label for="imageLabel">Încarcă o imagine</label>
            <input type="file" name="image" class="form-control-file" id="imageLabel">
        </div>
        <label for="price">Preț</label>
        <div class="input-group mb-3" id="price">
            <input name="price" class="form-control" placeholder="Preț..." value="{{ $item->price }}">
            <span class="input-group-text">RON</span>
        </div>
        <select class="form-control mb-3" name="category">
            <option>Selectează o categorie</option>
            @foreach($categories as $category)
                <option @if($category->id == $item->category) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary w-100">Salvează</button>
    </form>
@endsection
