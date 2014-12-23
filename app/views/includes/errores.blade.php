
            <!-- Alertas de manuales -->
            @if(Session::has('mensaje_error'))
               <br>
                @if(Session::get('tipo_error')==="danger" )
                <div class="alert alert-danger" id="danger">
                @elseif (Session::get('tipo_error')==="success" )
                <div class="alert alert-success" id="error">
                @endif
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('mensaje_error') }}</strong>
                </div>
            @endif

            <!-- Errores de formularios -->
            @if ($errors->any())
            <br>
            <div class="alert alert-danger" id="error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Por favor corrige los siguentes errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
