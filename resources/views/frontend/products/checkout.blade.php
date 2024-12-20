@extends('frontend.main')
@section('title', 'Checkout')

@section('style')
<!-- Add your custom styles if needed -->
@endsection

@section('content')
<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('../frontend/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Checkout
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>
            </div>
        </div>
    </div>

    <section id="checkout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <h5 class="mb-3">BILLING DETAILS</h5>
                    <form action="{{ route('products.process.checkout') }}" method="POST" class="bill-detail">
                            @csrf
                            <div class="form-group row">
                                <div class="col">
                                    <input class="form-control" name="name" placeholder="Name" type="text" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" name="last_name" placeholder="Last Name" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="address" placeholder="Address" required></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="town" placeholder="Town / City" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="state" placeholder="State / Country" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="zip_code" placeholder="Postcode / Zip" type="text" required>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input class="form-control" name="email" placeholder="Email Address" type="email" required>
                                </div>
                                <div class="col">
                                    <input class="form-control" name="phone_number" placeholder="Phone Number" type="tel" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input class="form-control" name="user_id" value="{{ Auth::user()->id }}" placeholder="user_id" type="text" readonly>
                                </div>
                                <div class="col">
                                    <input class="form-control" name="price" value="{{ $checkoutSubtotal + 20 }}" placeholder="Total Price" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="order_notes" placeholder="Order Notes"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                            </div>
                        </form>

                    <!-- Bill Detail of the Page end -->
                </div>

                <div class="col-xs-12 col-sm-5">
                    <div class="holder">
                        <h5 class="mb-3">YOUR ORDER</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Products</th>
                                        <th class="text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $product)
                                        <tr>
                                            <td>
                                                {{ $product->name }} x{{ $product->qty }}
                                            </td>
                                            <td class="text-right">
                                                Rp {{ number_format($product->subtotal, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Cart Subtotal</strong></td>
                                        <td class="text-right">Rp {{ number_format($checkoutSubtotal, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Shipping</strong></td>
                                        <td class="text-right">Rp 20.000</td>
                                    </tr>
                                    <tr>
                                        <td><strong>ORDER TOTAL</strong></td>
                                        <td class="text-right">
                                            <strong>Rp {{ number_format($checkoutSubtotal + 20, 0, ',', '.') }}</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <p class="text-right mt-3">
                        <input checked type="checkbox"> I’ve read &amp; accept the <a href="#">terms &amp; conditions</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
