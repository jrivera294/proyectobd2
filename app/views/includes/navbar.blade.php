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
            <a class="navbar-brand" href="{{URL::to('/profesorHome')}}">Asistencias3000</a>
            @elseif(Auth::user()->role==3)
            <a class="navbar-brand" href="{{URL::to('/directorHome')}}">Asistencias3000</a>
            @endif

          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Inicio</a></li>
              <li><a href="#">Pag 1</a></li>
              <li><a href="#">Pag 2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <p class="navbar-text" >Bienvenido {{Auth::user()->nombre}} {{Auth::user()->apellido}}</p>
              <li><a href="{{URL::to('/logout')}}">Desconectar</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
