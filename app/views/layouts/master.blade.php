<!DOCTYPE html>
<html lang="es">

<head>
    @include('includes.head')
</head>

<body>

    @include('includes.navbar')

    <div class="col-md-2"></div>
    <div class="col-md-8">
        @include('includes.errores')
    </div>
    <div class="col-md-2"></div>


    @yield('content')

    <!-- Javascript includes -->
    @include('includes.js')
    <!-- /.Javascript includes -->

    <!-- Javascripts on page -->
    @yield('page_scripts')
    <!-- Javascripts on page -->
</body>

</html>
