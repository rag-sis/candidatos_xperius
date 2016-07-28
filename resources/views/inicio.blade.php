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
	<link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/standard.css') }}" rel="stylesheet" type="text/css">
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
    <script type="text/javascript" src="{{ asset('js/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.mousewheel.js') }}"></script>

    <!-- Charts plugins -->
    <script type="text/javascript" src="{{ asset('plugins/charts/sparkline/jquery.sparkline.min.js') }}"></script><!-- Sparkline plugin -->

    <!-- Misc plugins -->
    <script type="text/javascript" src="{{ asset('plugins/misc/qtip/jquery.qtip.min.js') }}"></script><!-- Custom tooltip plugin -->
    <script type="text/javascript" src="{{ asset('plugins/misc/totop/jquery.ui.totop.min.js') }}"></script> 
    
    <!-- Search plugin -->
    <script type="text/javascript" src="{{ asset('plugins/misc/search/tipuesearch_set.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/misc/search/tipuesearch_data.js') }}"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="{{ asset('plugins/misc/search/tipuesearch.js') }}"></script>


    <!-- Form plugins -->
    <script type="text/javascript" src="{{ asset('plugins/forms/watermark/jquery.watermark.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/forms/uniform/jquery.uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/forms/ibutton/jquery.ibutton.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/forms/select/select2.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('plugins/forms/elastic/jquery.elastic.js')}}"></script>
    <script type="text/javascript" src="{{ asset('plugins/forms/inputlimiter/jquery.inputlimiter.1.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('plugins/forms/maskedinput/jquery.maskedinput-1.3.min.js')}}"></script>
    <!--<script type="text/javascript" src="{{ asset('plugins/forms/togglebutton/jquery.toggle.buttons.js')}}"></script>-->
    <!--<script type="text/javascript" src="{{ asset('plugins/forms/globalize/globalize.js')}}"></script>-->
    <script type="text/javascript" src="{{ asset('plugins/forms/timeentry/jquery.timeentry.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('plugins/forms/dualselect/jquery.dualListBox-1.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('plugins/forms/tiny_mce/jquery.tinymce.js')}}"></script>
    <script type="text/javascript" src="{{ asset('plugins/forms/smartWizzard/jquery.smartWizard-2.0.min.js')}}"></script>

    <!-- Fix plugins -->
    <script type="text/javascript" src="{{ asset('plugins/fix/ios-fix/ios-orientationchange-fix.js') }}"></script>

    <!-- Important Place before main.js  -->
    <script type="text/javascript" src="{{ asset('js/jquery/1.9.2/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('plugins/fix/touch-punch/jquery.ui.touch-punch.min.js') }}"></script><!-- Unable touch for JQueryUI -->

    <!-- Init plugins -->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script><!-- Core js functions -->
    <script type="text/javascript" src="{{ asset('js/empty.js') }}"></script><!-- Init plugins only for page -->
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>



<!--Otros-->

    <!--<script type="text/javascript" src="{{ asset('js/common.js') }}"></script>-->
    <!--<script type="text/javascript" src="{{ asset('js/standard.js') }}"></script>-->
    <!--[if lte IE 8]><script type="text/javascript" src="js/standard.ie.js"></script><![endif]-->
    <script type="text/javascript" src="{{ asset('js/jquery.tip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scripts_buttons.js') }}"></script>
    
    <!-- Example context menu -->
    <script type="text/javascript">
    
        $(document).ready(function()
        {
            // Context menu for all favorites
            $('.favorites li').bind('contextMenu', function(event, list)
            {
                var li = $(this);
                
                // Add links to the menu
                if (li.prev().length > 0)
                {
                    list.push({ text: 'Move up', link:'#', icon:'up' });
                }
                if (li.next().length > 0)
                {
                    list.push({ text: 'Move down', link:'#', icon:'down' });
                }
                list.push(false);   // Separator
                list.push({ text: 'Delete', link:'#', icon:'delete' });
                list.push({ text: 'Edit', link:'#', icon:'edit' });
            });
            
            // Extra options for the first one
            $('.favorites li:first').bind('contextMenu', function(event, list)
            {
                list.push(false);   // Separator
                list.push({ text: 'Settings', icon:'terminal', link:'#', subs:[
                    { text: 'General settings', link: '#', icon: 'blog' },
                    { text: 'System settings', link: '#', icon: 'server' },
                    { text: 'Website settings', link: '#', icon: 'network' }
                ] });
            });
        });
    
    </script>

@if(!Auth::check())
<script type="text/javascript">
    cerrar_sesion();
</script>                            
@else
                            

    </head>
      
    <body>
    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>

    
    <div id="header">
    	<!--<div id="header-shadow"></div>-->
    <div id="control-bar" class="grey-bg clearfix"><div class="container_12">
	
		<div class="float-left">
			
        <div class="navbar">
            <div class="navbar-inner">
              
               <a class="brand" href="/">Xperius<span class="slogan">Sistema de selección de candidatos.</span></a> 
               
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 

        </div>
		
		<div class="float-right"> 

			<ul id="status-infos">
            <li class="spaced">Usuario: <strong>{{ Auth::user()->usuario }}</strong></li>
            <!--
            <li>
                
                <button class="boton_nuevo" title="5 messages" onClick="boton_nuevo_click()" type="button"> <img src="{{asset('images/icons/fugue/mail.png')}}" width="16" height="16"> 5 </button>
                <div id="messages-list" class="result-block">
                    <span class="arrow"><span></span></span>
                    
                    <ul class="small-files-list icon-mail">
                        <li>
                            <a href="#"><strong>10:15</strong> Please update...<br>
                            <small>From: System</small></a>
                        </li>
                        
                    </ul>
                    
                    <p id="messages-info" class="result-info"><a href="#">Go to inbox &raquo;</a></p>
                </div>
            </li>
            <li>
                
                <button class="boton_nuevo" title="25 comments" onClick="boton_nuevo_click()" type="button"><img src="{{asset('images/icons/fugue/balloon.png')}}" width="16" height="16"> 25 </button>
                <div id="comments-list" class="result-block">
                    <span class="arrow"><span></span></span>
                    
                    <ul class="small-files-list icon-comment">
                        <li>
                            <a href="#"><strong>Jane</strong>: I don't think so<br>
                            <small>On <strong>Post title</strong></small></a>
                        </li>
                        
                    </ul>
                    
                    <p id="comments-info" class="result-info"><a href="#">Manage comments &raquo;</a></p>
                </div>
            </li>-->
            <li>

                
                <button class="boton_nuevo" title="Logout" onClick="cerrar_sesion()" type="button"><img src="{{ asset('img/hr.gif') }}" width="16" height="16"> Cerrar Sesión </button>
            </li>
        </ul>
        <h6 class="float-right">Versión 1.08</H6>
		</div>

			
	</div></div>


        
    </div><!-- End #header -->

    <div id="wrapper" class="container">
        <div class="row">

            <!--Sidebar area -->
            <div class="span3">

                <!--Responsive navigation button-->  
                <div class="resBtn">
                    <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
                </div>

                <!--Sidebar background-->
                <div id="sidebarbg"></div>
                <!--Sidebar content-->
                <div id="sidebar">    
                    <div class="sidenav">
                        @include('menu', ['tipo' => Auth::user()->tipo])
                    </div><!-- End sidenav -->
                </div><!-- End #sidebar -->
            </div><!-- End .span3 -->

            <!--content area -->
            <div class="span9">

                <!--Body content-->
                <div id="content" class="clearfix">
                    <!-- Build page from here: -->
                   
                   @yield('contenido')

					<!-- Page end here -->
                </div>

            </div><!-- End .span9 -->
                
        </div><!-- End #wrapper .row -->

    </div><!-- End .container -->

   
    </body>
</html>
@endif
