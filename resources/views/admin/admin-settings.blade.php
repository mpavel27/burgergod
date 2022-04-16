@extends('admin.layouts.main')
@section('admin-container')
    <h4>Setări Magazin</h4>
    <div class="shadow p-4">
        <div class="row">
            <form method="POST" action="{{ route('app.admin.shop-settings.validate') }}" class="col-md-6">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="delivery-tax">Taxă de livrare</span>
                    <input type="number" class="form-control" name="delivery_tax" placeholder="Taxă de livrare" aria-label="Username" aria-describedby="delivery-tax" value="{{ $delivery_tax }}">
                </div>
                <div class="form-check form-switch mb-3">
                    @if($store_online == 'true')
                        <input class="form-check-input" name="store_online" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    @else
                        <input class="form-check-input" name="store_online" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    @endif
                    <label class="form-check-label" for="flexSwitchCheckChecked">Magazin deschis</label>
                </div>
                <button class="btn btn-primary w-100">Salvează setările</button>
            </form>
        </div>
    </div>
@endsection
