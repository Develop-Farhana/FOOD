<div class="page-header">
    <!--=============== Navbar ===============-->
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent" id="page-navigation">
        <div class="container">
            <!-- Navbar Brand -->
            <a href="{{route('home')}}" class="navbar-brand">
                <img src="{{ asset('frontend/img/logo/logo.png') }}" alt="Logo">
            </a>

            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarcollapse">
                <!-- Navbar Menu -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('products.shop') }}" class="nav-link">Shop</a>
                    </li>

                    <!-- Show "Login" and "Register" if the user is not logged in -->
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                    @else
                        <!-- Show user dropdown if the user is logged in -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar-header">
                                    <img src="{{ asset('frontend/user_images/' . Auth::user()->image) }}" alt="User Avatar">
                                </div>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.orders') }}">Transactions History</a>
                                <a class="dropdown-item" href="{{ route('users.settings') }}">Settings</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                            </div>
                        </li>
                    @endguest

                    <li class="nav-item">
                        <a href="{{ route('products.cart') }}" class="nav-link" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-shopping-basket"></i> <span class="badge badge-primary">5</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
