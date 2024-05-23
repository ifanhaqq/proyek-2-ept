<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.head')
</head>
<body>

    @include('components.header')

    @include('components.nav')

    @yield('content')

    @include('components.footer')

    @yield('scripts')

    
</body>
</html>

