<!DOCTYPE html>
<html lang="en">
<head>
    
    {{-- <script src="https://accounts.google.com/gsi/client" async defer ></script>
    <script>
        window.onGoogleLibraryLoad = () => {
            google.accounts.id.initialize({
                client_id: '{{ env('GOOGLE_CLIENT_ID') }}',
                cancel_on_tap_outside: false,
                //callback: onOneTapSignedIn,
                prompt_parent_id: "oneTap",
                //intermediate_iframe_close_callback : close_callback1
            });
            google.accounts.id.prompt((notification) => {
                if (notification.isNotDisplayed()) {
                    console.log(notification.getNotDisplayedReason());
                } else if (notification.isSkippedMoment()) {
                    console.log(notification.getSkippedReason());
                } else if (notification.isDismissedMoment()) {
                    console.log(notification.getDismissedReason());
                } else {
                    
                }
            });
        }
    </script> --}}
    
    
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
    
    {{-- <script src="https://accounts.google.com/gsi/client" async defer></script>
    <div id="g_id_onload"
    data-client_id="{{ env('GOOGLE_CLIENT_ID') }}"
    data-login_uri="http://localhost:8000/auth/google/onetap"
    data-_token="{{ csrf_token() }}"
    data-method="post"
    data-cancel_on_tap_outside="false"
    data-skip_prompt_cookie="sid"
    data-context="signin">
</div> --}}


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