<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- navigation nav-bar -->
    <nav class="nav-bar bg-body-tertiary shadow position-sticky top-0 w-100">
        <main class="container d-flex justify-content-between align-items-center py-2">
            <a class="navbar-brand fw-bold fs-3 text-uppercase" href="/">Employee System</a>

            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-houses fs-4 fw-bold "></i></a>
                </li>
                
            </ul>
        </main>
    </nav>

    <!-- main content -->
     @if($msg =Session::get('success'))
     <div class="container my-3">
         <div class="col-md-5 mx-auto  alert alert-success alert-dismissible fade show">
            <strong>Success</strong> {{$msg}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <button></button>
         </div>
     </div>
     @elseif($msg =Session::get('error'))
     <div class="container my-4">
         <div class="col-md-5 mx-auto  alert alert-danger alert-dismissible fade show">
            <strong>Success</strong> {{$msg}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <button></button>
         </div>
     </div>
     @endif
     @yield('main')

     <!-- footer section -->
      <footer class="master text-center bg-body-tertiary shadow">
        
            <p class="text-center text-capitalize p-2">&copy; all right reserved: 2026 employee maintenance</p>
        
      </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>