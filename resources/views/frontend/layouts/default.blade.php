<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.includes.meta')
    <title>@yield('title')</title>
    @include('frontend.layouts.includes.style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite([])

</head>
<body>
    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')
    
    @include('frontend.layouts.includes.script')
</body>
</html>