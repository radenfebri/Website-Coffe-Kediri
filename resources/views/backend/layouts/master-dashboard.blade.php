
<!DOCTYPE html>
<html lang="en">


@include('backend.layouts.head')

<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    @include('backend.layouts.navbar')


    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('backend.layouts.sidebar')


        @yield('content')


    </div>
    <!-- END MAIN CONTAINER -->

@include('backend.layouts.script')

</body>
</html>