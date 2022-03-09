@extends('admin.layouts.main')
@section('admin-container')
    <h4>Dashboard</h4>
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="bg-primary p-4 rounded-3">
                <div class="d-flex flex-column justify-content-start text-white">
                    <h3 class="m-0">0</h3>
                    <p class="m-0">Comenzi astazi</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="bg-secondary p-4 rounded-3">
                <div class="d-flex flex-column justify-content-start text-white">
                    <h3 class="m-0">0</h3>
                    <p class="m-0">Comenzi totale</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="bg-success p-4 rounded-3">
                <div class="d-flex flex-column justify-content-start text-white">
                    <h3 class="m-0">0</h3>
                    <p class="m-0">Comenzi acceptate</p>
                </div>
            </div>
        </div>
    </div>
    <h4>Ultimele Comenzi</h4>
    <div class="shadow-lg p-4 rounded-3">
    <table id="app_dataTable" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>More Details</th>
            <th>Print</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_name }}</td>
                @if($order->user_address == null)
                <td>Ridicare de la restaurant</td>
                @else
                <td>{{ $order->user_address }}</td>
                @endif
                <td><button class="btn btn-primary">Vezi mai multe</button></td>
                <td><a href="" class="btn btn-secondary"><i class="fas fa-print"></i></a></td>
                @if($order->status == 1)
                <td>Placed</td>
                @elseif($order->status == 2)
                <td>Preparing</td>
                @elseif($order->status == 3)
                <td>Dispatching</td>
                @else
                <td>Delivered</td>
                @endif
                <td>
                    <div class="d-flex">
                        @if($order->status == 1)
                        <form method="POST" action="{{ route('app.admin.order.action', ['id' => $order->id, 'type' => 2]) }}">
                            @csrf
                            <button type='submit' class="btn btn-success">Accept</button>
                        </form>
                        <button class="btn btn-warning mx-3">Reject</button>
                        <button class="btn btn-danger">Delete</button>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
