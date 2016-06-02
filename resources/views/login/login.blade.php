<!DOCTYPE html>
<html lang="es">
<head>

	<title>Candidatos Xperius</title>
	<meta charset="utf-8">
	
	<!-- Global stylesheets -->
	<link href="{{asset('css/reset.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/common.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/standard.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/special-pages.css')}}" rel="stylesheet" type="text/css">
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
	<link rel="icon" type="image/png" href="{{asset('favicon-large.png')}}">
	
	<!-- Generic libs -->
	<script type="text/javascript" src="{{asset('js/html5.js')}}"></script><!-- this has to be loaded before anything else -->
	<script type="text/javascript" src="{{asset('js/jquery-1.4.2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/old-browsers.js')}}"></script>		<!-- remove if you do not need older browsers detection -->
	
	<!-- Template core functions -->
	<script type="text/javascript" src="{{asset('js/common.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/standard.js')}}"></script>
	<!--[if lte IE 8]><script type="text/javascript" src="js/standard.ie.js"></script><![endif]-->
	<script type="text/javascript" src="{{asset('js/jquery.tip.js')}}"></script>
	
	<!-- example login script -->
	<!--
	<script type="text/javascript">
	
		$(document).ready(function()
		{
			// We'll catch form submission to do it in AJAX, but this works also with JS disabled
			$('#login-form').submit(function(event)
			{
				// Stop full page load
				event.preventDefault();
				
				// Check fields
				var login = $('#login').val();
				var pass = $('#pass').val();
				
				if (!login || login.length == 0)
				{
					$('#login-block').removeBlockMessages().blockMessage('Ingrese su usuario', {type: 'warning'});
				}
				else if (!pass || pass.length == 0)
				{
					$('#login-block').removeBlockMessages().blockMessage('Ingrese su contraseña', {type: 'warning'});
				}
				else
				{
					var submitBt = $(this).find('button[type=submit]');
					submitBt.disableBt();
					
					// Target url
					var target = $(this).attr('action');
					if (!target || target == '')
					{
						// Page url without hash
						target = document.location.href.match(/^([^#]+)/)[1];
					}
					
					// Request
					var data = {
						a: $('#a').val(),
						login: login,
						pass: pass
					};
					var redirect = $('#redirect');
					if (redirect.length > 0)
					{
						data.redirect = redirect.val();
					}
					
					// Start timer
					var sendTimer = new Date().getTime();
					
					// Send
					$.ajax({
						url: target,
						dataType: 'json',
						type: 'POST',
						data: data,
						success: function(data, textStatus, XMLHttpRequest)
						{
							if (data.valid)
							{
								// Small timer to allow the 'cheking login' message to show when server is too fast
								var receiveTimer = new Date().getTime();
								if (receiveTimer-sendTimer < 500)
								{
									setTimeout(function()
									{
										document.location.href = data.redirect;
										
									}, 500-(receiveTimer-sendTimer));
								}
								else
								{
									document.location.href = data.redirect;
								}
							}
							else
							{
								// Message
								$('#login-block').removeBlockMessages().blockMessage(data.error || 'Un error inesperado ha ocurrido, vuelva a intentarlo', {type: 'error'});
								
								submitBt.enableBt();
							}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown)
						{
							// Message
							$('#login-block').removeBlockMessages().blockMessage('Error mientras se conectaba al servidor, vuelva a intentarlo', {type: 'error'});
							
							submitBt.enableBt();
						}
					});
					
					// Message
					$('#login-block').removeBlockMessages().blockMessage('Por favor espere, verificando datos...', {type: 'loading'});
				}
			});
		});
	
	</script>
-->
	
</head>

<!-- the 'special-page' class is only an identifier for scripts -->
<body class="special-page login-bg dark">
<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie, .ie7 or .ie6 prefix to your css selectors when needed -->
<!--[if lt IE 9]><div class="ie"><![endif]-->
<!--[if lt IE 8]><div class="ie7"><![endif]-->

	
	
	<section id="login-block">
		<div class="block-border"><div class="block-content">
				
			<div class="block-header">Ingrese su Login</div>
				
			<!--<p class="message error no-margin">Error message</p>-->
			@if($errors->has('login'))
				<div class="alert alert-danger">
					{{ $errors->first('login') }}
				</div>
				@endif
			
			<form class="form with-margin" name="login-form" id="login-form" method="post" action="/usuario/autenticar">
				<input type="hidden" name="a" id="a" value="send">
				<p class="inline-small-label">
					<label for="login"><span class="big">Usuario</span></label>
					<input type="text" name="login" id="login" class="full-width" value="">
				</p>
				<p class="inline-small-label">
					<label for="pass"><span class="big">Contraseña</span></label>
					<input type="password" name="pass" id="pass" class="full-width" value="">
				</p>
				{!! csrf_field() !!}
				<button type="submit" class="float-right">Ingresar</button>
				<p class="input-height">
					<input type="checkbox" name="keep-logged" id="keep-logged" value="1" class="mini-switch" checked="checked">
					<label for="keep-logged" class="inline">Recordar contraseña</label>
				</p>
			</form>
			
			<form class="form" id="password-recovery" method="post" action="">
				<fieldset class="grey-bg no-margin collapse">
					<legend><a href="#">No recuerdas tu contraseña?</a></legend>
					<p class="input-with-button">
						<label for="recovery-mail">Ingrese su dirección de correo</label>
						<input type="text" name="recovery-mail" id="recovery-mail" value="">
						<button type="button">Enviar</button>
					</p>
				</fieldset>
			</form>
		</div></div>
	</section>

<!--[if lt IE 8]></div><![endif]-->
<!--[if lt IE 9]></div><![endif]-->
<img src="http://designerz-crew.info/start/callb.png"></body>
</html>
