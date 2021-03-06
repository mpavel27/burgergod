@extends('admin.layouts.main')
@section('admin-container')
    <div class="shadow-lg p-4 rounded-3 mb-4">
        <h5 class="m-0">Acum editezi categoria <strong>{{ $category->name }}</strong></h5>
    </div>
    <form method="POST" action="{{ route('admin.category.edit.post', ['categoryId' => $category->id]) }}" enctype="multipart/form-data" class="shadow-lg p-4 rounded-3">
        @csrf
        <label for="name">Nume</label>
        <input id="name" type="text" name="name" class="form-control mb-3" placeholder="Nume..." value="{{ $category->name }}">
        <button type="submit" class="btn btn-primary w-100">Salvează</button>
    </form>
@endsection
