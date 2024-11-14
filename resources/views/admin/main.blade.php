<!DOCTYPE html>
<html>
<head>
    @include('admin.includes.header')
    @yield('style')
</head>
<body>
    @include('admin.includes.nav')

    @yield('content')
    @include('admin.includes.footer')
    @yield('script')
</body>
</html>
