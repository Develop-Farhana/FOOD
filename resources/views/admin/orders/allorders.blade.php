@extends('admin.main')
@section('style')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                <div class="container">
                @if (session('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session('success') }}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <h5 class="card-title mb-4 d-inline">Orders</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Country</th>
                                <th scope="col">Status</th>
                                <th scope="col">Price</th>
                                <th scope="col">Address</th>
                                <th scope="col">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allOrders as $index => $orders)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $orders->name }}</td>
                                    <td>{{ $orders->last_name }}</td>
                                    <td>{{ $orders->email }}</td>
                                    <td>{{ $orders->country }}</td>
                                    <td>{{ $orders->status }}</td>
                                    <td>${{ $orders->price }}</td>
                                    <td>{{ $orders->address }}</td>
                                    <td>
                                        <a href="{{ route('orders.edit', $orders->id) }}" class="btn btn-warning text-white mb-4 text-center">Update</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
