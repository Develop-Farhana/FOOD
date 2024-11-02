@extends('frontend.main')
@section('title', 'home')

@section('style')
@endsection

@section('content')

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('../frontend/img/bg-header.jpg');">
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
        <div class="container mt-5">
            @if (\Session::has('delete'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('delete') !!}</li>
                    </ul>
                </div>
            @endif
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

                                        <th>Subtotal</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartProducts as  $product)
                                    <tr>
                                        <td>
                                            <img src="{{asset('frontend/img/'.$product->image.'')}}" width="60">
                                        </td>
                                        <td>
                                           {{$product->name}}
                                        </td>
                                        <td>
                                            {{$product->price}}
                                        </td>
                                        <td>
                                        {{$product->qty}}
                                        </td>

                                        <td>
                                            Rp {{$product->price * $product->qty}}
                                        </td>
                                        <td>
                                        <a href="{{ route('products.cart.delete', $product->id) }}" class="text-danger" onclick="return confirm('Are you sure you want to delete this product from the cart?');">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>

                                </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col">
                        <a href="{{route('products.shop')}}" class="btn btn-default">Continue Shopping</a>
                    </div>
                    <div class="col text-right">

                        <div class="clearfix"></div>
                        <h6 class="mt-3">Total: Rp{{$subtotal}}</h6>
                        @if($subtotal > 0)
                            <form action="{{route('products.prepare.chekout')}}" method="POST">
                                @csrf
                                <input type="hidden" name="" value="{{$subtotal}}">
                                <button type="submit"  class="btn btn-lg btn-primary">Checkout <i class="fa fa-long-arrow-right"></i></button>
                            </form>

                           @else
                           <p class="alert alert-success">
                            You Have No Prodcuts In cart You Can't Checkout Yet
                           </p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
