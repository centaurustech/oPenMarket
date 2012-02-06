<?php			
			if(strlen($_POST['marka']))
			setcookie("mrk", $_POST['marka']);			
?>			

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
	     <title>
	     
<?php

	require_once(dirname(__FILE__).'/../../../usr/share/yii/framework/yii.php');
	defined('YII_DEBUG') or define('YII_DEBUG',true);

	$cnx = new CDbConnection('mysql:host=localhost;dbname=productAdmin', 'userdb', 'db5e65fb2af18937f7b24b787949866522a0c04f30b21fc9a8dd2979d6e1b866');
	$cnx->active = true;
	$dat = $cnx->createCommand("select * from compania")->query();
	$dat->bindColumn(1, $nCom);
	$dat->bindColumn(2, $RIF);	
	$dat->bindColumn(3, $dir);
	$dat->read();
	
	echo $nCom;

?>
	     
	      - oPenMarket [ALPHA] </title>
	     
        <meta name="keywords" content="medicina farmacia medicamentos ofertas">
        <meta name="description" content="medicamentos puerto la cruz">

			<!-- DOCKER -->			
		  <link href="css/style.css" rel="stylesheet" type="text/css" />
		  
		  <!-- parte de header -->		  		          		  
		  <link rel="stylesheet" type="text/css" href="css/base_bum_vb29b91ca9289855c7eb513fc116117.css">                		  		  

			<!-- BOTON -->
			<link href="css/styles.css" rel="stylesheet" type="text/css" />
		  
		  <!-- CARRITO -->
		  <link rel="stylesheet" href="css/p.css" type="text/css">		  		 		  											
		 	
			<!--NO FUNCIONA EL JQUERY-->		 	
		 	<script type="text/javascript" src="js/jquery_bum_v8ac3516d3dcf1d35d8ee98cbcb90229f.js"></script>
		 	
		 	<!--img transicion-->
		  <link rel="stylesheet" href="css/empresas_bum_v5f0837a56cd35db0310b1636dbbe4ea8.css" type="text/css">
		  <script type="text/javascript" src="js/bumex.js"></script>		  
		  <script type="text/javascript" src="js/home_bum_v7b9fa127f3b12ba5511c30b7adbce567.js"></script>
		  
		  			<!--INICIAR SESSION-->
			<script type="text/javascript" src="js/base.js"></script>
			<script type="text/javascript" src="js/jquery_bum_v8ac3516d3dcf1d35d8ee98cbcb90229f.js"></script>            			   					  		
					 		 	
		
	<!--docker-->
	<script type="text/javascript" src="js/interface.js"></script>		
	<script type="text/javascript">	
	$(document).ready(
		function()
		{

			$('.otherbutton,.homebutton,.downloadbutton,.donatebutton').append('<span class="hover"></span>').each(function () {
	  			var $span = $('> span.hover', this).css('opacity', 0);
	  			$(this).hover(function () {
	    			$span.stop().fadeTo(500, 1);
	 			}, function () {
	   			$span.stop().fadeTo(500, 0);
	  				});
				});			
			
			$('#dock').Fisheye(
				{
					maxWidth: 50,
					items: 'a',
					itemsText: 'span',
					container: '.dock-container',
					itemWidth: 40,
					proximity: 90,
					halign : 'center'
				}
				)
				}
			);
		</script>	

		 	
</head>

<body class="home" id="HomeAplicantes">

<div class="oculto">

    <div class="bumex_login clearfix" id="bumex_login">
        <div class="form_login_wrap">
            <form id="loginForm" action="register.php" method="post" class="formCv">
                <fieldset>
                    <h2>Ingresar en <?php echo $nCom ?></h2>
                    <p>
                        <label>Email o Nombre de usuario</label><br>
                        <input name="username" class="inputMedium" validate="{required:true,messages:{required:'Ingrese su Usuario o E-Mail'}}" tabindex="1" type="text">
                    </p>
                    <p>
                        <label>Contraseña</label>
                        <a href="#" id="recuperarPass" style="float: right;">Recuperar contraseña</a>
                        <br>
                        <input name="password" class="inputMedium" id="passLogin" validate="{required:true,messages:{required:'Ingrese su clave'}}" tabindex="2" type="password">
                    </p>
                    <div id="errorLoginAjaxPostulante" class="warningBox oculto"><p></p></div>
                    <p>
                        <label><input id="recordarme" name="seguir_conectado" checked="checked" type="checkbox">Seguir Conectado</label>
                    </p>
                    <p>
                        <button type="submit" id="loginButton" class="botonButton">
                        
                        <span class="boton btnAzul">
                        <span>Iniciar Sesión</span>
                        </span>
                        
                        </button>
                    </p>
                </fieldset>
            </form>
        </div>
        
        <div class="login_mas_opciones_wrap">
            <h2>También puedes...</h2>
            
            <p>
            <a href="#" class="registerModal">
            <strong>Crear una cuenta</strong>
            </a> en <?php echo $nCom ?> si no estás registrado.</p>
        </div>
        
    </div>

    <div class="bumex_login clearfix" id="bumex_register">
        <div class="form_login_wrap">
            <form id="form_registro_postulante" action="/postulantes/registro.bum" method="post" class="formCv">
                <fieldset>
                    <h2>Crear una cuenta</h2>
                    <p>
                        <label>E-Mail (será su nombre de usuario)</label><br>
                        <input id="email" name="email" class="inputMedium" validate="{required:true,messages:{required:'Ingrese su Usuario o E-Mail'}}" type="text">
                        <input value="0" name="emailOK" id="emailOK" validate="{required:true,min:1,messages:{min:''}}" type="hidden">
                    </p><div id="validacionemail" class="oculto"><p></p></div>
                    <p></p>
                    <p>
                        <label>Elija una contraseña</label><br> 
                        <input name="password1" class="inputMedium" id="passRegister" validate="{required:true,rangelength:[3, 10], messages:{required:'Ingrese su clave',rangelength:'La clave debe contener entre 3 y 10 caracteres'}}" type="password">
                    </p><p class="mensajeError oculto"></p>
                    <p>
                        <label>Repita la contraseña</label><br>
                        <input name="password2" class="inputMedium" id="password2" validate="{required:true,equalTo:'#form_registro_postulante input[id=passRegister]',rangelength:[3, 10],messages:{required:'', equalTo:'La contraseña y su confirmación no coinciden',rangelength:'La clave debe contener entre 3 y 10 caracteres'}}" type="password">
                    </p><p class="mensajeError oculto"></p>
                    <p></p>
                    <p>
                    </p><div id="mensajeErrorRegistro" class="warningBox oculto"><p></p></div>
                    <p></p>
                    <p>
                        <button type="submit" id="registerButton" class="botonButton"><span class="boton btnVerde"><span>Registrarme</span></span></button>
                    </p>
                     <p class="letraChica">Al hacer clic en “Registrarme” acepto los <a href="http://www.bumeran.com.ve/postulantes/terminos_y_condiciones.bum" target="_blank">términos y condiciones</a> de <?php echo $nCom ?></p>
                </fieldset>
            </form>
        </div>
        <div class="login_mas_opciones_wrap">
            <h2>También puedes...</h2>
            <p><a href="#" class="loginModal"><strong>Ingresar</strong></a> a bumeran.com si ya estás registrado.</p>
        </div>
    </div>              

    <table>
        <tbody><tr class="dataRowTemplate postulanteRepetidoRow">
            <td>
                <input name="idPostulante" id="rowCol1" type="radio">
                <input class="oculto" name="token" id="rowCol8" type="radio">
            </td>
            <td>
                <img class="avatarChico" id="rowCol0" height="20" width="20">
            </td>
            <td id="rowCol2">
            </td>
            <td id="rowCol3">
            </td>
            <td id="rowCol4">
            </td>
            <td>
                <div class="cvProgress">
                    <div class="cvProgressBar cvProgressBarAlta" style="width:80%" id="rowCol7"></div>
                </div>
                <span id="rowCol5"></span>
            </td>
            <td>
                <input name="id_postulante_baja" id="rowCol6" type="hidden">
            </td>
        </tr>
    </tbody></table>

    <div id="recuperarPassword">
        <div class="form_login_wrap">
            <form action="#" method="post" class="formCv">
                <fieldset>
                    <h2>Recuperar contraseña</h2>
                    <p>
                        <label>Nombre de usuario o E-mail</label><br>
                        <input name="username" validate="{required:true,messages:{required:'Ingrese su Usuario o E-Mail'}}" type="text">
                        </p><div id="recuperacionContrasena" class="oculto"><p></p></div>
                    <p></p>
                    <br>
                        <button type="submit" class="recuperarContrasena botonButton"><span class="boton btnAzul"><span>Enviar e-mail</span></span></button>
                        <a class="cerrarDialog" href="#" style="margin: 8px;">Cancelar</a>
                </fieldset>
            </form>
        </div>
    </div>	
</div>

<div class="header headerConMenu" id="headerHome">
<div id="oreja_div" style="margin-top: 0px !important; display: none;"></div>


    <div class="container_12 clearfix">
        <div class="grid_6">
            <h1><a href="#" class="logoBumeran"><span>ProductAdmin - VERSION DEMO</span></a></h1>
            <form method="post" action="#" id="formSearchHeader" class="formSearchChico">
                <fieldset>
                    <span class="inputWrap submitHorizontal"><span><input class="ve searchInput" name="keyword" id="searchHome" placeholder="Medicamentos" type="text"></span></span>
                    <button class="botonButton submitHorizontal" type="submit"><span class="boton btnVerdeGrande"><span>Buscar</span></span></button>
                    <input id="pathToSearch" value="vermas.php" type="hidden">
                </fieldset>
            </form>
        </div>
        <div class="grid_6">
            <ul class="menuHorizontal menuRight clearfix">
                
                    <li id="loginDropdown">
                    	<a class="boton btnAzul loginModal" href="#"><span>Iniciar Sesión</span></a>
                    </li>	                
            </ul>
        </div>

        
    </div>
    <div class="zocaloMenuGeneral"></div>
</div>

<div class="dock" id="dock">

  <div class="dock-container">
  
  <a class="dock-item" href="index.php"><img src="img/home.png" alt="home" /><span>Home</span></a> 
  <a class="dock-item" href="#"><img src="img/email.png" alt="contact" /><span>Contacto</span></a> 
  <a class="dock-item" href="#"><img src="img/portfolio.png" alt="portfolio" /><span>Quienes somos</span></a> 

  </div>
  
</div>


    <div class="container_12 clearfix">	    	 	    
        
        <div class="grid_12 searchBox" id="searchBox">
			      
<form method="post" action="vermas.php" id="formSearchHome" class="formSearchGrande">
                <span class="formInlineInputs">
                    <label for="keywords">¿Qué marca?</label>
                    <br>
                    <span class="inputWrap submitHorizontal"><span><input class="ve" name="marka" id="keywords" placeholder="Bayer, Genven" type="text"></span></span>
                </span>
                <span class="formInlineInputs">
                 <input value="false" id="verdaderoFalso" type="hidden">
                    <label for="location">¿Que medicamento?</label>
                    <br>


                    <input id="codigoPaisLC" value="ve" type="hidden">
 <span class="inputWrap submitHorizontal">
 	<span>
 												<select style="display: none;" id="provincia">   

 													 
 												</select>
 												<input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="on" class="ve ui-autocomplete-input" id="location" name="mediNom" placeholder=
 												
<?php 

if(strlen($_COOKIE['marka']))
echo $_COOKIE['mediNom'];

	else
	echo '"Calox, Muproban"';

?>
 												
 												><button aria-disabled="false" role="button" class="ui-button ui-widget ui-state-default ui-button-icon-only" title="Mostrar todo" tabindex="-1"><span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span><span class="ui-button-text"> </span></button> 
 <!--<![endif]-->
 	</span> 
 </span> 

						</span>

                <button class="botonButton submitHorizontal" type="submit" id="botonSearch"><span class="boton btnVerdeGrande"><span>Buscar</span></span></button>
            </form>                  

<div class="oculto">

    <div class="bumex_login clearfix" id="bumex_login">
        <div class="form_login_wrap">
            <form id="loginForm" action="/postulantes/login.bum" method="post" class="formCv">
                <fieldset>
                    <h2>Ingresar a bumeran.com</h2>
                    <p>
                        <label>Email o Nombre de usuario</label><br>
                        <input name="username" class="inputMedium" validate="{required:true,messages:{required:'Ingrese su Usuario o E-Mail'}}" tabindex="1" type="text">
                    </p>
                    <p>
                        <label>Contraseña</label>
                        <a href="#" id="recuperarPass" style="float: right;">Recuperar contraseña</a>
                        <br>
                        <input name="password" class="inputMedium" id="passLogin" validate="{required:true,messages:{required:'Ingrese su clave'}}" tabindex="2" type="password">
                    </p>
                    <div id="errorLoginAjaxPostulante" class="warningBox oculto"><p></p></div>
                    <p>
                        <label><input id="recordarme" name="seguir_conectado" checked="checked" type="checkbox">Seguir Conectado</label>
                    </p>
                </fieldset>
            </form>
        </div>
        <div class="login_mas_opciones_wrap">
            <h2>También puedes...</h2>
            <div><a href="#" class="boton_facebook_login nuevo_feature" id="loginFacebookButton"><span>Ingresar con Facebook</span> <em class="label_nuevo">Nuevo!</em></a></div>
            <div class="infoBox">
            	<p><strong>Ni las empresas ni otros postulantes</strong> verán tus datos de Facebook.</p>
            </div>
            <p><a href="#" class="registerModal"><strong>Crear una cuenta</strong></a> en bumeran.com si no estás registrado.</p>
        </div>
    </div>

    <div class="bumex_login clearfix" id="bumex_register">
        <div class="form_login_wrap">
            <form id="form_registro_postulante" action="/postulantes/registro.bum" method="post" class="formCv">
                <fieldset>
                    <h2>Crear una cuenta</h2>
                    <p>
                        <label>E-Mail (será su nombre de usuario)</label><br>
                        <input id="email" name="email" class="inputMedium" validate="{required:true,messages:{required:'Ingrese su Usuario o E-Mail'}}" type="text">
                        <input value="0" name="emailOK" id="emailOK" validate="{required:true,min:1,messages:{min:''}}" type="hidden">
                    </p><div id="validacionemail" class="oculto"><p></p></div>
                    <p></p>
                    <p>
                        <label>Elija una contraseña</label><br> 
                        <input name="password1" class="inputMedium" id="passRegister" validate="{required:true,minlength:6,maxlength:25, messages:{required:'Ingrese su clave',minlength:'La contraseña es demasiado corta, debe tener por lo menos 6 letras',maxlength:'La contraseña es demasiado larga, debe tener 25 letras como máximo'}}" type="password">
                    </p><p class="mensajeError oculto"></p>
                    <p></p>
                    <p>
                        <label>Repita la contraseña</label><br>
                        <input name="password2" class="inputMedium" id="password2" validate="{required:true,equalTo:'#form_registro_postulante input[id=passRegister]',messages:{required:'', equalTo:'La contraseña y su confirmación no coinciden'}}" type="password">
                    </p><p class="mensajeError oculto"></p>
                    <p></p>
                    <p>
                    </p><div id="mensajeErrorRegistro" class="warningBox oculto"><p></p></div>
                    <p></p>
                    <p>
                        <button type="submit" id="registerButton" class="botonButton"><span class="boton btnVerde"><span>Registrarme</span></span></button>
                    </p>
                     <p class="letraChica">Al hacer clic en “Registrarme” acepto los <a href="http://www.bumeran.com.ve/postulantes/terminos_y_condiciones.bum" target="_blank">términos y condiciones</a> de Bumeran.com</p>
                </fieldset>
            </form>
        </div>
        <div class="login_mas_opciones_wrap">
            <h2>También puedes...</h2>
            <div><a href="#" class="boton_facebook_login nuevo_feature" id="registerFacebookButton"><span>Ingresar con Facebook</span> <em class="label_nuevo">Nuevo!</em></a></div>
            <div class="infoBox">
            	<p><strong>Ni las empresas ni otros postulantes</strong> verán tus datos de Facebook.</p>
            </div>
            <p><a href="#" class="loginModal"><strong>Ingresar</strong></a> a bumeran.com si ya estás registrado.</p>
        </div>
    </div>              

    <div class="fbkDialogTemplate" id="facebook_usuarios_repetidos">
        <div class="form_login_wrap">
	        <h3>Existe más de una cuenta en bumeran.com con e-mail <strong id="msjTemplate"></strong></h3>
	        <p>Seleccione la cuenta que desea vincular con Facebook:</p>
	        <form class="fbkRepetidosForm" method="post" action="#">
	            <table id="repetidosTable">
	                <thead>
	                    <tr>
	                        <th></th>
	                        <th></th>
	                        <th>Nombre</th>
	                        <th>Última actividad</th>
	                        <th>Última postulación</th>
	                        <th>Porcentaje CV</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody id="tableBodyTemplate">
	                </tbody>
	            </table>
	            <div id="errorLoginAjaxPostulante" class=" warningBox oculto"><p></p></div>
	            <button type="submit" class="botonButton" id="vinculacionRepetidos"><span class="boton btnAzul"><span>Vincular</span></span></button>
	        	<a class="cerrarDialog" href="#" style="margin: 8px;">Cancelar</a><br><br>
	        	 <p><label><input name="elmininarNoSelccionados" id="elmininarNoSelccionados" type="checkbox"> Eliminar las demás cuentas de bumeran</label></p>
	        </form>
        </div>
    </div>

    <table>
        <tbody><tr class="dataRowTemplate postulanteRepetidoRow">
            <td>
                <input name="idPostulante" id="rowCol1" type="radio">
                <input class="oculto" name="token" id="rowCol8" type="radio">
            </td>
            <td>
                <img class="avatarChico" id="rowCol0" height="20" width="20">
            </td>
            <td id="rowCol2">
            </td>
            <td id="rowCol3">
            </td>
            <td id="rowCol4">
            </td>
            <td>
                <div class="cvProgress">
                    <div class="cvProgressBar cvProgressBarAlta" style="width:80%" id="rowCol7"></div>
                </div>
                <span id="rowCol5"></span>
            </td>
            <td>
                <input name="id_postulante_baja" id="rowCol6" type="hidden">
            </td>
        </tr>
    </tbody></table>

    <div id="recuperarPassword">
        <div class="form_login_wrap">
            <form action="#" method="post" class="formCv">
                <fieldset>
                    <h2>Recuperar contraseña</h2>
                    <p>
                        <label>Nombre de usuario o E-mail</label><br>
                        <input name="username" validate="{required:true,messages:{required:'Ingrese su Usuario o E-Mail'}}" type="text">
                        </p><div id="recuperacionContrasena" class="oculto"><p></p></div>
                    <p></p>
                    <br>
                        <button type="submit" class="recuperarContrasena botonButton"><span class="boton btnAzul"><span>Enviar e-mail</span></span></button>
                        <a class="cerrarDialog" href="#" style="margin: 8px;">Cancelar</a>
                </fieldset>
            </form>
        </div>
    </div>
    
    <div id="loadingModal" style="padding:20px"><img style="margin-right: 15px; vertical-align: middle;" src="detalles_files/loader_grande.gif"><span style="font-size:16px;vertical-align:middle">Conectando con Facebook ...</span></div>

	<div id="opcionFBRegistracionVinculacion">
		<div class="form_login_wrap">
			<h3>No existe una cuenta en bumeran.com con e-mail <strong id="msjTemplate"></strong></h3>
			<p>Usted podrá:</p>
			<form id="formFBRegistracionVinculacion" action="" class="formCv">
				<fieldset>
					<p>
						<input id="radioNuevaCuenta" name="opcion" value="reg" checked="checked" type="radio"><span>Crear una nueva cuenta</span><br>
		                <input id="radioLogVin" name="opcion" value="logvin" type="radio"><span>Vincular con facebook una cuenta existente</span>
			            </p><p class="inputMailPass oculto">
		                	<label>Email o Nombre de usuario</label><br>
		                	<input name="username" class="inputMedium" validate="{required:true,messages:{required:'Ingrese su Usuario o E-Mail'}}" type="text"><br>
		                	<label>Contraseña</label><br>
		                	<input name="password" class="inputMedium" id="passLogin" validate="{required:true,messages:{required:'Ingrese su clave'}}" type="password">
		                </p>
		                <div id="errorLoginAjaxPostulante" class="warningBox oculto"><p></p></div>              
		            <p></p>
		            <br>
				   <button id="loginButton" type="submit" class="botonButton"><span class="boton btnAzul"><span>Aceptar</span></span></button>
	               <a class="cerrarDialog" href="#" style="margin: 8px;">Cancelar</a>
				</fieldset>
			</form>
		</div>	
	</div>
	
	<div id="formVinculacionFbkTemplate">
        	<p>a bumeran.com e ingresa mucho más fácilmente.</p>
            <p><strong>Ni las empresas ni otros postulantes</strong> verán tus datos de Facebook.</p>
        <p>
          	<button class="botonButton" id="botonMonigoteVinculaFbk"><span class="boton btnAzul"><span>Vincular</span></span></button>
        </p>
    </div>
	
	
	
	
</div>



<div class="header headerCompacto headerSearch headerConMenu" id="headerHome">
<div id="oreja_div" style="margin-top: 0px !important; display: none;"></div>


    <div class="container_12 clearfix">
        <div class="grid_6">
            
            <form method="post" action="#" id="formSearchHeader" class="formSearchChico">
                <fieldset>
                    
                    <button class="botonButton submitHorizontal" type="submit"><span class="boton btnVerdeGrande"><span>Buscar</span></span></button>
                    <input id="pathToSearch" value="/trabajos-en-venezuela.html" type="hidden">
                </fieldset>
            </form>
        </div>
        <div class="grid_6">
            <ul class="menuHorizontal menuRight clearfix">
                
                    
	                <li>
	                	<a id="loginDropdownEmpresas" class="boton btnAzulDropdown" href="#"><span>Iniciar sesión empresas</span></a>
	                    <div id="loginBoxHomeEmpresas" class="dropDownBox dropDownBoxRight loginBox oculto">
	                        

<form method="post" id="form_login" action="/empresas/login.bum" class="formStandard">
    <fieldset>
    	<input name="redirectToken" id="redirectToken" value="0" type="hidden">
        <label for="username">Nombre de usuario</label>
        <input name="username" id="username" class="username" validate="{required:true,messages:{required:'Ingrese su username/email'}}" type="text">
        
        <label for="password">Contraseña</label>
        <input name="password" id="passLogin" validate="{required:true,messages:{required:'Ingrese su clave'}}" type="password">
        <div id="warningLoginEmpresa" class="warningBox oculto">
            <p></p>
        </div>
        <div id="errorLoginAjaxEmpresa" class="warningBox oculto"><p></p></div>
        <div class="infoBox oculto" id="infoLoginAjaxEmpresa">
        	<p>
        		Está intentando ingresar como empresa. Si es un postulante inicie sesión desde <a href="http://www.bumeran.com.ve/postulantes/panel.bum">aquí</a>.
		    </p>
		</div>
        <p>
            <button class="botonButton" id="loginButton" type="submit"><span class="boton btnAzul"><span>Iniciar Sesión</span></span></button>
            <span id="seguir_conectado"><input name="seguir_conectado" id="recordarme" type="checkbox">Seguir Conectado</span>
        </p>
        <p><a href="http://www.bumeran.com.ve/empresas/recuperarcontrasena.bum" class="recuperarContrasenaUsuarioEmpresa">Recuperar contraseña</a></p>
    </fieldset>
</form>

      

	                    </div>
	                    
	                </li>
                
                
                <li id="registroEmpresas">
                    
                       <a class="registerDropdown boton btnVerdeDropdown" href="#"><span>Registrar empresa</span></a>
                    
                    <div class="registerBox loginBox dropDownBox dropDownBoxRight nuevoUsuarioBox oculto">
                     
                        <form method="post" id="form_registro_empresa" action="/empresas/formregistro.bum" class="formStandard formderegistro">
                            <fieldset>
                            	<label for="nombreUsuario">Nombre de usuario</label>
                                <input name="nombreUsuario" id="nombreUsuario" validate="{required:true}" type="text">
                                <input value="0" name="usernameOK" id="usernameOK" validate="{required:true,min:1,messages:{min:''}}" type="hidden">
                                <div id="validacionUsername" class="oculto"><p></p></div>
                                <label for="email">E-mail</label>
                                <input name="email" id="emailEmpresa" validate="{required:true,email:true,messages:{email:'Ingrese un email válido.'}}" type="text">
                                <label for="password">Elija una contraseña</label>
                                <input name="passwordEmpresa" id="passRegister" validate="{required:true,rangelength:[3, 10],messages:{required:'Ingrese su clave',rangelength:'La clave debe contener entre 3 y 10 caracteres'}}" type="password">
                                <p class="mensajeError oculto"></p>
                                <label for="password2">Repita la contraseña</label>
                                <input name="password2Empresa" id="password2" validate="{required:true,equalTo:'#form_registro_empresa input[id=passRegister]',rangelength:[3, 10],messages:{required:'', equalTo:'La contraseña y su confirmación no coinciden',rangelength:'La clave debe contener entre 3 y 10 caracteres'}}" type="password">
                                <p class="letraChica">Al hacer clic en “Registrarme” acepto los <a href="http://www.bumeran.com.ve/postulantes/terminos_y_condiciones.bum" target="_blank">términos y condiciones</a> de Bumeran.com</p>
                                <p>
                                    <button class="botonButton" id="registerButton" type="submit"><span class="boton btnVerde"><span>Registrar empresa</span></span></button>
                                </p>
                            </fieldset>
                        </form>
                    </div>
                    
                </li>
                
                 

                <li><a href="#" class="boton btnGris botonRelieve botonDropdown nuevos oculto" id="btNofif"><span><em class="icon16 iconNotif"></em>&nbsp;<strong>5</strong></span></a>
               
                <div class="dropDownBox dropDownBoxRight notifBox oculto">
						<h4>Notificaciones</h4>
						
							<ul class="listoadoNotif">
							
								<li>
									<p>
										<img src="detalles_files/psMainPic_61517860.jpg" height="35" width="35">
										<span><a href="#">Cholito Cholez</a> comentó tu tolki <a href="#">"Un amigo tuvo un brote psicótico cua..."</a></span>
									</p>
									
								</li>
							
								<li>
									<p>
										<img src="detalles_files/psMainPic_43518220.jpg" height="35" width="35">
										<span><a href="#">Juan Correa</a> y <a href="#">8 personas más</a> comentaron tu tolki <a href="#">"Un amigo tuvo un brote psicótico cua..."</a></span>
									</p>
								</li>
							
								<li>
									<p>
										<img src="detalles_files/psMainPic_61517860.jpg" height="35" width="35">
										<span><a href="#">Cholito Cholez</a> comentó tu tolki <a href="#">"Un amigo tuvo un brote psicótico cua..."</a></span>
									</p>
								</li>
								<li>
									<p>
										<img src="detalles_files/psMainPic_43518220.jpg" height="35" width="35">
										<span><a href="#">Juan Correa</a> y <a href="#">8 personas más</a> comentaron tu tolki <a href="#">"Un amigo tuvo un brote psicótico cua..."</a></span>
									</p>
								</li>
								<li>
										<a href="http://www.bumeran.com.ve/postulantes/notificaciones.bum" class="verTodas">Ver todas las notificaciones</a>
								</li>
							</ul>
						
					</div>
					</li>
            </ul>
        </div>

        
    </div>
    <div class="zocaloMenuGeneral"></div>
</div>
<div class="ie6NoSupport">
    <a href="#" id="cerrarIE6NoSupport"></a>
    <p><strong>Su navegador dejó de ser soportado a partir del 1° de Noviembre de 2010</strong>, le sugerimos utilizar un navegador más moderno:</p>
    <a target="_blank" href="http://www.getfirefox.com/" id="getFirefox"></a>
    <a target="_blank" href="http://www.google.com/chrome" id="getChrome"></a>
    <a target="_blank" href="http://www.apple.com/safari" id="getSafari"></a>
    <a target="_blank" href="http://www.microsoft.com/windows/internet-explorer/worldwide-sites.aspx" id="getIE8"></a>
</div>

	<!-- INICIO Aviso personalizado por empresas -->
	
	 <!-- FIN Aviso personalizado por empresas -->
	 <div class="bannerGrandeEmpresa"></div>
    <div class="container_12">
    
        <?php         
                
			$dat=$cnx->createCommand("select name,vendedor,descr,cant,limitCmp,dsc,pathimg,price,keywords,recipe from products where id=" . "9")->query();
						
			$dat->bindColumn(1, $nomb);
			$dat->bindColumn(2, $vend);
			$dat->bindColumn(3, $descr);
			$dat->bindColumn(4, $cant);			
			$dat->bindColumn(5, $limit);
			$dat->bindColumn(6, $dsc);
			$dat->bindColumn(7, $pathimg);
			$dat->bindColumn(8, $price);
			$dat->bindColumn(9, $keywords);
			$dat->bindColumn(10, $recipe);
			
			$dat->read();
			
			?>		
 

        <div class="grid_8" id="avisoContenido">

<ul class="avisosBreadcrumbs clearfix">

            <h4 class="separador">
                <a href="#">Información sobre del producto</a>
            </h4>

</ul>
			
            <h2><?php echo $name; ?></h2>

            <div class="logoEmpresaAviso">
                
                <a href="http://www.bumeran.com.ve/perfiles/empresa_bumeran.com_449490.html"><img src="detalles_files/logoMainPic_449490.jpg" alt="Empleos | Trabajos para Bumeran.com" title="Empleos | Trabajos para Bumeran.com"></a>
                
            </div>
            
            <h3><a href="http://www.bumeran.com.ve/perfiles/trabajos-bumeran.com-449490.html" title="Trabajar en Bumeran.com"><?php echo $nomb ?></a></h3>
          
                       	
                	
            <table class="infoAviso" >
                <tbody>
                                	
                    <tr>
                        <th>Proevedor</th>
                        
                        <td>

								<?php echo $vend ?>						                        
                        
                        </td>
                    </tr>

                    <tr>
                        <th>Necesita recipe</th>
                        <td>
                        
                        <?php
                        
                        	if($recipe)
                        	echo "Si";
                        	                        	
                        		else
                        		echo "No";
                        ?>                        
                        </td>
                    </tr>
                    <tr>
                        <th>Disponibles</th>
                        <td><?php echo $cant ?></td>
                    </tr>
                    <tr>
                        <th>Precio</th>
                        <td>
                            <?php echo $price ?>
                        </td>
                        
                    </tr>
                    
                </tbody>
            </table>
            <p><?php echo $descr?></p>
            <div class="enviarCvCompartirAviso clearfix">
			
            
                <div class="grid_5 alpha">
                	<div id="avisoCvRecibido" class="okBox oculto" style="width:235px;"><p>La empresa ha recibido tu CV para este aviso.</p>
                	
                	 
                	<p><strong>Habla sobre esta postulación con otros usuarios y elimina todas tus dudas.</strong> <a class="irAlTolki" href="http://www.bumeran.com.ve/postulantes/mispostulaciones.bum?seccion=tolki&amp;idAviso=1000189525"> Ir al Tolki →</a></p>
                	
                	</div>
                    
                    <input id="hayUsuario" name="hayUsuario" value="0" type="hidden">
                    <div class="objetoDinamicoLoading oculto" id="btnEnviarMiCvEnviando">
                  	  <div class="infoBox"><p><span>Enviando...</span></p></div>
                	</div>
                	<div id="divErrores" class="oculto warningBox">
                	</div>
                    <p><a id="btnEnviarMiCv" class="boton btnAzul" href="http://www.bumeran.com.ve/postulantes/avisos/postularme.bum?idAviso=1000189525"><span>Comprar articulo</span></a></p>
                    
                </div>                                                
            </div>        	            
            
            <h4 class="separador">
                <a href="#">Preguntas de nuestros clientes</a>
            </h4>

            <div class="collapsableContainer">
                
                <form class="formPreguntaAviso" method="post" action="#">
                    <input name="pregunta.idAviso" value="1000189525" type="hidden">
                    <label for="pregunta">Pregunta</label>
                    <p class="preguntaTextareaWrap"><textarea id="pregunta" validate="{required:true}" name="pregunta.textoPregunta"></textarea></p>
                    <p><button class="botonButton" id="enviarPregunta" type="submit"><span class="boton btnAzul"><span>Enviar pregunta</span></span></button></p>
                </form>
                <div id="okPregunta" class="okBox oculto"><p>La pregunta
 se envió correctamente, en caso que la empresa conteste la pregunta 
podras ver la respuesta aquí y se te enviará una notificación.</p></div>
                                
            </div>
            
        </div>

        <div class="grid_4">
                
            <div class="adblock">            
                <iframe marginwidth="0" marginheight="0" id="publicidad36fa7971d14067f8" src="detalles_files/iframeSource.htm" style="width: 300px; height: 250px; margin-bottom: 15px;" frameborder="0" height="0" scrolling="no" width="0"></iframe> 
            </div>
		            
        </div>
    </div>
    
    <input id="hayPreguntas" name="hayPreguntas" value="0" type="hidden">
    
    
    
    
	<form method="post" class="formCv" style="display:none" id="formEnviarDenunciaAviso">
		<label for="motivoFraude">Seleccione el motivo de la denuncia:</label><br>
		<select name="motivoFraude" id="motivoFraude">
			<option selected="selected" value="NO_ES_UN_TRABAJO">No es una oferta de trabajo</option>
			<option value="PRACTICAS_FRAUDULENTAS">Solicitan dinero / prácticas fraudulentas</option>
			<option value="DISCRIMINACION">Requerimientos discriminatorios</option>
			<option value="ACTIVIDADES_ILEGALES">Aviso sospechoso de actividades ilegales</option>
			<option value="NO_ME_CONTRATAN">No fui contactado por esta empresa</option>
			<option value="OTRA_RAZON">Otra razón</option>
		</select>
		<br><br>
	    <label for="cuerpoMensaje">Describa porque cree que este aviso es fraudulento</label><br>
	    <textarea name="cuerpoMensaje" id="cuerpoMensaje"></textarea>
	</form>
    
    

<script type="text/javascript">
	$(document).ready(function(){
		$('#abrirContactenos').click(function(e){
			e.preventDefault();
			$('.ventanaModalOver').removeClass('oculto');
			$('#ventanaModal').removeClass('oculto');
		});
		$('.cerrarContactenos').click(function(){
			$('.ventanaModalOver').addClass('oculto');
			$('#ventanaModal').addClass('oculto');
		});
		$('.ventanaModalOver').click(function(){
			$(this).addClass('oculto');
			$('#ventanaModal').addClass('oculto');
		});
	});
</script>
<div class="ventanaModalOver oculto"></div>
<div id="ventanaModal" class="ventanaModal oculto">
<span class="icon16 iconCerrar cerrarContactenos" title="Cerrar esta ventana"></span>
<form id="formContactenos" class="formCv" method="post" action="#">
                    <fieldset>
                        <p>
                            <label for="datosPersonales_unica.nombre">Nombre(s)</label><br>
                            <input maxlength="50" type="text">
                        </p>
                        <p>
                            <label for="datosPersonales_unica.apellido">Apellido(s)</label><br>
                            <input maxlength="50" type="text">
                        </p>
                        <p>
                            <label for="datosPersonales_unica.email">E-mail</label><br>
                            <input maxlength="255" type="text">
                        </p>
                        <p class="formInlineInputs">
                            <label for="datosPersonales_unica.idPaisResidencia">País de residencia</label><br>
                            <select class="testing" validate="{required:true}" name="datosPersonales.idPaisResidencia" id="datosPersonales_unica.idPaisResidencia">
                             
                                <option value="1" selected="selected">Argentina</option>   
                            
                                <option value="2">Brasil</option>   
                            
                                <option value="7">Chile</option>   
                            
                                <option value="8">Colombia</option>   
                            
                                <option value="14">Costa Rica</option>   
                            
                                <option value="9">Ecuador</option>   
                            
                                <option value="24">Estados Unidos</option>   
                            
                                <option value="1000">Internacional</option>   
                            
                                <option value="18">Mexico</option>   
                            
                                <option value="20">Panama</option>   
                            
                                <option value="11">Peru</option>   
                            
                                <option value="28">Republica Dominicana</option>   
                            
                                <option value="12">Uruguay</option>   
                            
                                <option value="13">Venezuela</option>   
                            
                            				<optgroup label="---------------------"></optgroup>
                            
                                <option value="34">Alemania</option>   
                            
                                <option value="30">Australia</option>   
                            
                                <option value="31">Austria</option>   
                            
                                <option value="5">Bolivia</option>   
                            
                                <option value="54">Bulgaria</option>   
                            
                                <option value="53">Bélgica</option>   
                            
                                <option value="23">Canada</option>   
                            
                                <option value="52">China</option>   
                            
                                <option value="68">Corea</option>   
                            
                                <option value="56">Croacia</option>   
                            
                                <option value="29">Cuba</option>   
                            
                                <option value="33">Dinamarca</option>   
                            
                                <option value="15">El Salvador</option>   
                            
                                <option value="75">Emiratos Arabes</option>   
                            
                                <option value="71">Escocia</option>   
                            
                                <option value="57">Eslovaquia</option>   
                            
                                <option value="58">Eslovenia</option>   
                            
                                <option value="21">Espana</option>   
                            
                                <option value="59">Estonia</option>   
                            
                                <option value="60">Finlandia</option>   
                            
                                <option value="25">Francia</option>   
                            
                                <option value="35">Grecia</option>   
                            
                                <option value="16">Guatemala</option>   
                            
                                <option value="370">Haiti</option>   
                            
                                <option value="38">Holanda</option>   
                            
                                <option value="17">Honduras</option>   
                            
                                <option value="61">Hungria</option>   
                            
                                <option value="62">India</option>   
                            
                                <option value="32">Inglaterra</option>   
                            
                                <option value="74">Irak</option>   
                            
                                <option value="63">Irlanda</option>   
                            
                                <option value="40">Israel</option>   
                            
                                <option value="26">Italia</option>   
                            
                                <option value="39">Japon</option>   
                            
                                <option value="64">Letonia</option>   
                            
                                <option value="65">Lituania</option>   
                            
                                <option value="380">Malasia</option>   
                            
                                <option value="19">Nicaragua</option>   
                            
                                <option value="66">Noruega</option>   
                            
                                <option value="67">Nueva Zelanda</option>   
                            
                                <option value="10">Paraguay</option>   
                            
                                <option value="50">Polonia</option>   
                            
                                <option value="22">Portugal</option>   
                            
                                <option value="27">Puerto Rico</option>   
                            
                                <option value="200">Republica Checa</option>   
                            
                                <option value="69">Rumania</option>   
                            
                                <option value="37">Rusia</option>   
                            
                                <option value="70">Singapur</option>   
                            
                                <option value="73">Suecia</option>   
                            
                                <option value="36">Suiza</option>   
                                           
                            </select>
                        </p>
                        <p>
                            <label for="consultaMensaje">Consulta / Sugerencia: </label><br>
                            <textarea style="width: 99%;" name="consultaMensaje" placeholder="Escribe aquí tu consulta o sugerencia."></textarea>
                        </p>
                       
                        <p class="formSubmitButton">
                            <button type="submit" class="botonButton"><span class="boton btnAzul"><span>Eviar consulta</span></span></button>
                            &nbsp;<a href="#" id="datosPersonales_cancelar_unica" class="btnCancelarEditarCv" style="visibility: hidden;">Cancelar</a>
                        </p>
                    </fieldset>
</form>
</div>

<?php include "foother.php" ?>	
		   
</body>
</html>