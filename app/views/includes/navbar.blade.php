<?php $path = Request::path(); ?>
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            @if(Auth::user()->role==2)
            <a class="navbar-brand" href="{{URL::to('/profesor/materias')}}">Asistencias3000</a>
            @elseif(Auth::user()->role==3)
            <a class="navbar-brand" href="{{URL::to('/director/materias')}}">Asistencias3000</a>
            @endif

          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @if(Auth::user()->role==2)
                <li class="{{$path === 'profesor/materias' ? 'active' : '';}}">
                    <a href="{{URL::to('profesor/materias')}}">Materias</a>
                </li>
                @elseif(Auth::user()->role==3)
                </li>
                <li class="{{$path === 'director/materias' ? 'active' : '';}}">
                    <a href="{{URL::to('director/materias')}}">Materias</a>
                </li>
                <li class="{{$path === 'director/asistencias' ? 'active' : '';}}">
                    <a href="{{URL::to('director/asistencias')}}">Asistencias</a>
                </li>
                </li>
                <li class="{{$path === 'director/alertas' ? 'active' : '';}}">
                    <a href="{{URL::to('director/alertas')}}">Alertas</a>
                </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <p class="navbar-text" >Bienvenido {{Auth::user()->nombre}} {{Auth::user()->apellido}}</p>
              <li><a href="{{URL::to('/')}}">Desconectar</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
