<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    @include('components.header-test')

    @yield('content')

    @include('components.footer')

    @yield('scripts')

</body>

</html>