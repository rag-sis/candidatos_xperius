<?php
  $valor='';
?>
@if(Session::has('menu'))
      <?php
        $valor=Session::get('menu');
      ?>
@endif
<div class="sidebar-widget" style="margin: -1px 0 0 0;">
	<h5 class="title" style="margin-bottom:0">Navegación</h5>
</div><!-- End .sidenav-widget -->
@if($tipo === 'adm')
<div class="mainnav">
 <ul>
 <li><a href="/usuario/lista"><span class="icon16 silk-icon-list"></span>
@if($valor === 'usuario')
<em><b>Usuarios</b></em>
@else
  Usuarios
@endif
  </a></li>
 
 <li><a href="/vacante/lista"><span class="icon16 silk-icon-list"></span>
@if($valor === 'vacante')
<em><b>Vacantes</b></em>
@else
  Vacantes
@endif
  </a></li>
 <li><a href="/examen/lista"><span class="icon16 silk-icon-list"></span>Exámenes</a></li>
 <li><a href="/invitacion/lista"><span class="icon16 silk-icon-list"></span>Invitaciones</a></li>
  <li><a href="/postulacion/lista"><span class="icon16 silk-icon-list"></span>Postulaciones</a></li>
 <li><a href="/examen/calificaciones_pendientes"><span class="icon16 silk-icon-list"></span>Calificaciones Pendientes</a></li>
 <li><a href="/resultados/lista"><span class="icon16 silk-icon-list"></span>Resultados de Exámenes</a></li>
  <li><a href="/entrevista/lista"><span class="icon16 silk-icon-list"></span>Entrevistas Programadas</a></li>
  
  </ul>
 </div>
@elseif($tipo === 'pro')
<div class="mainnav">
 <ul>
  <li><a href="/vacante/lista"><span class="icon16 silk-icon-list"></span>
@if($valor === 'vacante')
<em><b>Vacantes</b></em>
@else
  Vacantes
@endif
  </a></li>
 <li><a href="/examen/lista"><span class="icon16 silk-icon-list"></span>Exámenes</a></li><li><a href="/invitacion/lista"><span class="icon16 silk-icon-list"></span>Invitaciones</a></li>
  <li><a href="/postulacion/lista"><span class="icon16 silk-icon-list"></span>Postulaciones</a></li>
 <li><a href="/examen/calificaciones_pendientes"><span class="icon16 silk-icon-list"></span>Calificaciones Pendientes</a></li>
 <li><a href="/resultados/lista"><span class="icon16 silk-icon-list"></span>Resultados de Exámenes</a></li>
  <li><a href="/entrevista/lista"><span class="icon16 silk-icon-list"></span>Entrevistas Programadas</a></li>
  </ul>
 </div>
@elseif($tipo === 'can')
<div class="mainnav">
 <ul>
 <li><a href="/candidato"><span class="icon16 silk-icon-list"></span>Inicio</a></li> 
  <li><a href="/vacante/lista_vac"><span class="icon16 silk-icon-list"></span>
@if($valor === 'vacante')
<em><b>Vacantes</b></em>
@else
  Vacantes
@endif
  </a></li>

 <li><a href="/examen/lista_ex"><span class="icon16 silk-icon-list"></span>Exámenes</a></li>
 <li><a href="/postulacion/lista"><span class="icon16 silk-icon-list"></span>Postulaciones</a></li>
 <li><a href="/entrevista/lista_en"><span class="icon16 silk-icon-list"></span>Entrevistas Programadas</a></li>
 </ul>
 </div>
@endif
