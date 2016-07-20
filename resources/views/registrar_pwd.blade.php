<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sistema de Selección de Candidatos</title>
    <meta name="author" content="Guido Alcon" />
    <meta name="description" content="Sistema de Selección de candidatos" />
    <meta name="keywords" content="candidatos sistema " />
    <meta name="application-name" content="Sistema de Candidatos" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css">

    <!-- Le styles -->
    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <!-- Headings -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />  -->
    <!-- Text -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> --> 
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!--El siguiente codigo corrresponde al template constelation-->
	<!-- Generic libs -->
	
	<!-- Global stylesheets -->
	<!-- Comment/uncomment one of these files to toggle between fixed and fluid layout -->
	<!--<link href="css/960.gs.css" rel="stylesheet" type="text/css">-->
	<!--<link href="{{ asset('css/960.gs.fluid.css') }}" rel="stylesheet" type="text/css"> cm30-06-->
	<!-- Generic libs -->			<!-- this has to be loaded before anything else -->
	<!--<script type="text/javascript" src="{{ asset('js/jquery-1.4.2.min.js') }}"></script> cm30-06-->
	<!--<script type="text/javascript" src="{{ asset('js/old-browsers.js') }}"></script>		<!- remove if you do not need older browsers detection -->
	<!-- Template libs -->
	
	<!-- FIN -->
    <!-- Core stylesheets do not remove -->
    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap/bootstrap-responsive.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/supr-theme/jquery.ui.supr.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />

    <!-- Plugin stylesheets -->
    <link href="{{ asset('plugins/misc/qtip/jquery.qtip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/forms/uniform/uniform.default.css') }}" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <!--<link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" /> -->

    <!-- Custom stylesheets ( Put your own changes here ) -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    
    <script type="text/javascript">
        //adding load class to body and hide page
        //document.documentElement.className += 'loadstate';
    </script>
 	 <!-- Le javascript
    ================================================== -->
    <link href="{{ asset('plugins/forms/ibutton/jquery.ibutton.css') }}" type="text/css" rel="stylesheet" />
    
    <!-- Important plugins put in all pages -->
    <script type="text/javascript" src="{{ asset('/js/jquery/1.7.2/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>  
  



                     

    </head>
    <body>
{!! Form::open(['url' => '/registrar_pwd/almacenar', 'files' => true]) !!}
		@include('form_val')
{!! Form::close() !!}
</body>