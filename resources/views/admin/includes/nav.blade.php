<div id="wrapper">
<nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
         @auth('admin')
                <ul class="navbar-nav side-nav" >
                <li class="nav-item">
                    <a class="nav-link text-white" style="margin-left: 20px;" href="{{route('admins.dashboard')}}">Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.alladmins')}}" style="margin-left: 20px;">Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.all')}}" style="margin-left: 20px;">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.all')}}" style="margin-left: 20px;">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('orders.all')}}" style="margin-left: 20px;">Orders</a>
                </li>

                </ul>
         @endauth

        <ul class="navbar-nav ml-md-auto d-md-flex">
            @auth('admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admins.dashboard')}}">Home
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::guard('admin')->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                </li>

            @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view.login')}}">login
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
            @endauth

        </ul>
      </div>
    </div>
    </nav>

