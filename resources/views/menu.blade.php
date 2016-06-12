<div class="sidebar-widget" style="margin: -1px 0 0 0;">
	<h5 class="title" style="margin-bottom:0">Navegación</h5>
</div><!-- End .sidenav-widget -->
@if($tipo === 'adm')
<div class="mainnav">
 <ul>
 <li><a href="/vacante/lista"><span class="icon16 entypo-icon-grid"></span>Vacantes</a></li>
 <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Examenes</a></li>
 <li><a href="/usuario/lista"><span class="icon16 entypo-icon-grid"></span>Candidatos</a></li>
 <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Postulaciones</a></li>
 <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Resultados</a></li>
 </ul>
 </div>
 <div class="sidebar-widget" style="margin: -1px 0 0 0;">
 <h5 class="title" style="margin-bottom:0">Navegación</h5>
 </div><!-- End .sidenav-widget -->
 <div class="mainnav">
  <ul>
  	<!--<li><a href="#"><span class="icon16 entypo-icon-grid"></span>Datos</a></li>-->
  <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Programación de Entrevistas</a></li>
  <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Entrevistas</a></li>
  </ul>
 </div>
@elseif($tipo === 'pro')
<div class="mainnav">
 <ul>
 <li><a href="/vacante/lista"><span class="icon16 entypo-icon-grid"></span>Examenes</a></li>
 <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Resultados</a></li>
 </ul>
 </div>
 <div class="sidebar-widget" style="margin: -1px 0 0 0;">
 <h5 class="title" style="margin-bottom:0">Navegación</h5>
 </div><!-- End .sidenav-widget -->
 <div class="mainnav">
  <ul>
  <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Programación de Entrevistas</a></li>
  <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Entrevistas</a></li>
  </ul>
 </div>
@elseif($tipo === 'can')
<div class="mainnav">
 <ul>
  <li><a href="/vacante/lista"><span class="icon16 entypo-icon-grid"></span>Vacantes</a></li>
 <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Examenes</a></li>
 <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Postulaciones</a></li>
 <li><a href="#"><span class="icon16 entypo-icon-grid"></span>Resultados</a></li>
 </ul>
 </div>
@endif
