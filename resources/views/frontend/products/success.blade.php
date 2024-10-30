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
                        You Paid For The Products sucessfully
                    </h1>
                    <a class="btn btn-primary" href="{{route('home')}}" >
                      Go Home
                    </a>

                </div>
            </div>
        </div>


        @endsection
