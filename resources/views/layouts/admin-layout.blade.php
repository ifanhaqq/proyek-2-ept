<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.head')
</head>
<body>

    @include('components.header-admin')

    @include('components.nav-admin')

    @yield('content')

    @include('components.footer-admin')

    
</body>
</html>

