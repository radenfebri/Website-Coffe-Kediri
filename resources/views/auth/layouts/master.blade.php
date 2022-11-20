
<!DOCTYPE html>
<html lang="en">

@include('auth.layouts.head')

<body class="form">
    
    <div id="load_screen"> 
        <div class="loader"> 
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    
    <div class="auth-container d-flex">
        
        <div class="container mx-auto align-self-center">
            
            <div class="row">
                
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            
                            @yield('content')
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    
    @include('auth.layouts.script')


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