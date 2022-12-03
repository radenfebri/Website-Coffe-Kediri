<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.includes.meta')
    
    <title>@yield('title')</title>
    
    @include('frontend.layouts.includes.style')
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if ($setting_website)
        <link rel="shortcut icon" href="{{ asset('storage/' . $setting_website->favicon) }}">
    @else
        
    @endif
    
</head>
<body>
    @include('frontend.layouts.header')
    
    @yield('content')


    @include('frontend.layouts.footer')
    
    @include('frontend.layouts.includes.script')
    
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/produk-list",
            success: function (response) {
                // console.log(response);
                startAutoComplete(response);  
            }
        });
        
        function startAutoComplete(availableTags)
        {
            $("#search_produk").autocomplete({
                source: availableTags
            });
        }
        
    </script>
    
    @if (session('status'))
    <script>
        Swal.fire({
            title: "Berhasil",
            icon: "success",
            timer: 5000,
            confirmButtonColor: "#f35a38",
            confirmButtonText: "Oke",
            text: '{{ session('status') }}',
        })
    </script>
    @elseif (session('error'))
    <script>
        Swal.fire({
            title: "Gagal",
            icon: "error",
            timer: 5000,
            confirmButtonColor: "#f35a38",
            confirmButtonText: "Oke",
            text: '{{ session('error') }}',
        })
    </script>
    @endif
</body>
</html>