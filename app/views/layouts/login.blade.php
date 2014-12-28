<!DOCTYPE html>
<html lang="es">

<head>
    @include('includes.head')
</head>

<body>

    <div class="col-md-2"></div>
    <div class="col-md-8">
        @include('includes.errores')
    </div>
    <div class="col-md-2"></div>


    @yield('content')

    <!-- Javascript includes -->
    @include('includes.js')
    <!-- /.Javascript includes -->
</body>

</html>
