@extends('frontend.main')
@section('title', 'Menu')

@section('style')
<style>
    .menu-section {
        background-color: #f9f9f9;
        padding: 50px 0;
    }

    .menu-heading {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
        color: #333;
    }

    .menu-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-item {
        display: flex;
        align-items: center;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        padding: 15px;
        transition: box-shadow 0.3s ease;
    }

    .menu-item:hover {
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    }

    .menu-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 20px;
    }

    .menu-info {
        flex: 1;
    }

    .menu-title {
        font-size: 1.6rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .menu-description {
        font-size: 1rem;
        color: #555;
        margin-bottom: 10px;
    }

    .menu-price {
        font-size: 1.2rem;
        color: #28a745;
        font-weight: bold;
    }

    .btn-order-now {
        background-color: #ff5722;
        color: white;
        padding: 12px 20px;
        border-radius: 30px;
        font-weight: 600;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
        margin-top: 15px;
        display: inline-block;
    }

    .btn-order-now:hover {
        background-color: #d94e1e;
        color: #fff;
    }

    .no-items {
        text-align: center;
        font-size: 1.2rem;
        color: #6c757d;
        font-style: italic;
    }

    @media (max-width: 768px) {
        .menu-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .menu-img {
            margin-right: 0;
            margin-bottom: 15px;
        }
    }
</style>
@endsection

@section('content')
    <div id="page-content" class="page-content">

        <!-- Banner Section -->
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset('Frontend/img/bg-header.jpg') }}');">
                <div class="container">
                    <h1 class="pt-5">Menu</h1>
                    <p class="lead">Delicious dishes, just for you.</p>
                </div>
            </div>
        </div>

        <!-- Menu Section -->
        <section id="menu" class="menu-section">
            <h2 class="menu-heading">Product For This Category</h2>
            @if ($products->count() > 0)
                <div class="container">
                    <ul class="menu-list">
                        @foreach ($products as $product)
                            <li class="menu-item">
                                <img src="{{ asset('frontend/img/'.$product->image) }}" class="menu-img" alt="{{ $product->name }}">
                                <div class="menu-info">
                                    <h5 class="menu-title">{{ $product->name }}</h5>
                                    <p class="menu-description">{{ Str::limit($product->description, 100) }}</p>
                                    <p class="menu-price">${{ $product->price }}</p>
                                    <a href="#" class="btn-order-now">Order Now</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p class="no-items">No items available on the menu at the moment.</p>
            @endif
        </section>

    </div>
@endsection
