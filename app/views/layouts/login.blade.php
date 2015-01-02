<!DOCTYPE html>
<html lang="es">

<head>
    @include('includes.head')
</head>

<body>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('includes.errores')
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        @yield('content')
    </div>


    <!-- Javascript includes -->
    @include('includes.js')
    <!-- /.Javascript includes -->
</body>

</html>
