<!DOCTYPE html>
<html>
<head>
    @include('frontend.layouts.header')
    @yield('style')
</head>
<body>
    @include('frontend.layouts.nav')

    @yield('content')
    @include('frontend.layouts.footer')
    @yield('script')
</body>
</html>
