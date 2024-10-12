<div class="page-header">
        <!--=============== Navbar ===============-->
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent" id="page-navigation">
            <div class="container">
                <!-- Navbar Brand -->
                <a href="index.html" class="navbar-brand">
                    <img src="{{asset('frontend/img/logo/logo.png')}}" alt="">
                </a>

                <!-- Toggle Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarcollapse">
                    <!-- Navbar Menu -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{route('products.shop')}}" class="nav-link">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('register')}}" class="nav-link">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar-header"><img src="{{asset('frontend/img/logo/avatar.jpg')}}"></div> John Doe
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('trans')}}">Transactions History</a>
                                <a class="dropdown-item" href="setting.html">Settings</a>
                            </div>
                          </li>
                        <li class="nav-item">
                            <a href="{{route('products.cart')}}" class="nav-link" data-toggle="" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-shopping-basket"></i> <span class="badge badge-primary">5</span>
                            </a>

                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
