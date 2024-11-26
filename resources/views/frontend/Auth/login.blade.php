@extends('frontend.main')
@section('title', 'Login')

@section('style')
    <!-- Add custom styles here if needed -->
@endsection

@section('content')
<div id="page-content" class="page-content">
    <div class="banner">
        <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('../frontend/img/bg-header.jpg');">
            <div class="container">
                <h1 class="pt-5">
                    Login Page
                </h1>
                <p class="lead">
                    Save time and leave the groceries to us.
                </p>

                <!-- Display the success message if present -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-login mb-5">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            @csrf <!-- Laravel CSRF Protection -->
                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" required placeholder="Email" aria-label="Email" autofocus>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" type="password" name="password" required placeholder="Password" aria-label="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label for="checkbox0" class="mb-0">New to our platform? <a href="{{ route('register') }}" class="text-light">Create an Account</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row text-center mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Log In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
