@extends('frontend.main')
@section('title', 'home')

@section('style')
@endsection

@section('content')
<div id="page-content" class="page-content">
        <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset('Frontend/img/bg-header.jpg') }}');">

                <div class="container">
                    <h1 class="pt-5">
                       {{$product->name}}
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">

                        <div class="slider-zoom">
                            <a href="{{asset('frontend/img/'.$product->image.'')}}" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                                <img alt="Detail Zoom thumbs image" src="{{asset('frontend/img/'.$product->image.'')}}" style="width: 100%;">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p>
                            <strong>Overview</strong><br>
                            {{$product->description}}
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <strong>Price</strong> (/Pack)<br>
                                    <span class="price">Rp {{$product->price}}</span>
                                    <!-- <span class="old-price">Rp 150.000</span> -->
                                </p>
                            </div>

                        </div>
                        <p class="mb-1">
                            <strong>Quantity</strong>
                        </p>
                        <form method="POST" action="{{route('products.add.cart')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                    <input name="qty"  class="form-control" type="number" min="1" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="1" name="vertical-spin">
                                </div>
                                <div class="col-sm-6"><span class="pt-1 d-inline-block">Pack (1000 gram)</span></div>
                            </div>

                                <input name="name" value="{{$product->name}}" type="hidden">
                                <input name="price" value="{{$product->price}}" type="hidden">
                                <input name="pro_id" value="{{$product->id}}" type="hidden">
                                <input name="image" value="{{$product->image}}" type="hidden">

                            @if ($checkInCart > 0 )
                                    <button disabled  name="submit"  class="mt-3 btn btn-primary btn-lg">
                                            <i class="fa fa-shopping-basket"></i> Added to Cart
                                        </button>
                                 @else
                                    <button  type="submit" name="submit"  class="mt-3 btn btn-primary btn-lg">
                                            <i class="fa fa-shopping-basket"></i> Add to Cart
                                        </button>
                             @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section id="related-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Related Products</h2>
                        @if ( $relatedProducts->count() > 0)
                        <div class="product-carousel owl-carousel">
                           <div class="item">
                            @foreach ( $relatedProducts as $relatedProduct )
                                <div class="card card-product">
                                    <div class="card-ribbon">

                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until {{$relatedProduct->exp_date}}
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="{{asset('frontend/img/'.$relatedProduct->image.'')}}" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">{{$relatedProduct->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <!-- <span class="discount">Rp. 300.000</span> -->
                                            <span class="reguler">Rp.{{$relatedProduct->price}} </span>
                                        </div>
                                        <a href="detail-product.html" class="btn btn-block btn-primary">
                                           Product Details
                                        </a>

                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @else
                            <p class="alert alert-success">
                                There are No Related Products in this Category Just Now
                            </p>

                    </div>
                    @endif
                    </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
