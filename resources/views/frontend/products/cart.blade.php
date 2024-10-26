@extends('frontend.main')
@section('title', 'home')

@section('style')
@endsection

@section('content')

<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="margin-top:-25px;background-image: url('{{ asset('frontend/img/bg-header.jpg') }}');">
            <div class="container">
                <h1 class="pt-5">
                    Your Cart
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>
            </div>
        </div>
    </div>

    <section id="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="10%"></th>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th width="15%">Quantity</th>
                                    <th width="15%">Subtotal</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0; // Initialize total variable
                                @endphp
                                @foreach ($cartProducts as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('frontend/img/'.$product->image) }}" width="60">
                                        </td>
                                        <td>
                                            {{ $product->name }}<br>
                                        </td>
                                        <td>
                                            Rp {{ number_format($product->price, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            {{ $product->qty }}
                                        </td>
                                        <td>
                                            @php
                                                $subtotal = $product->price * $product->qty; // Calculate subtotal for the product
                                                $total += $subtotal; // Add to total
                                            @endphp
                                            Rp {{ number_format($subtotal, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="text-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <a href="shop.html" class="btn btn-default">Continue Shopping</a>
                </div>
                <div class="col text-right">
                    <div class="clearfix"></div>
                    <h6 class="mt-3">Total: Rp {{ number_format($total, 2, ',', '.') }}</h6>
                    <a href="{{ route('checkout') }}" class="btn btn-lg btn-primary">Checkout <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
