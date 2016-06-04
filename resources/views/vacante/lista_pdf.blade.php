<html>
<head>
  <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/bootstrap/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />
    
  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 160px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
  </style>
<body>
  <header>
    <h1>Lista de Vacantes</h1>
    <h4>XPERIUS</h4>
  </header>
  <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              Sistema de selección de candidatos
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>
  <div id="content">
    
    <table class="table table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0" >
          <thead>
          <tr>
        
            <th class="first">Titulo</th>
            <th class="first">Descripción</th>
            <th class="first">Estado</th>
          </tr>
          </thead>
          <tbody>
          @forelse($vacantes as $vacante)

          <tr>
            <td>{{ $vacante->titulo_v }}</td>
            <td>{{ $vacante->descripcion_v }}</td>
            <td>{{ $vacante->estado_v }}</td>
          </tr>
          @empty
        <tr class="text-center">
          <td colspan="5">No exiten Vacantes</td>
        </tr>
        @endforelse
          </tbody>
        </table>
  </div>
</body>
</html>