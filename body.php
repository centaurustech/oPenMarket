<div class="oculto">

    <div class="bumex_login clearfix" id="bumex_login">
        <div class="form_login_wrap">
            <form id="loginForm" action="chk.php" method="post" class="formCv">
                <fieldset>
                    <h2>Ingresar en <?php echo $nCom ?></h2>
                    
                    <p>
                        <label>Email</label><br>
                        <input id="Jname" name="mail" class="inputMedium" validate="{required:true,messages:{required:'Ingrese su E-Mail'}}" tabindex="1" type="text">						
                    </p>                                        
                    
                    <div id="errorLoginAjaxPostulante" class="oculto warningBox"><p>Nombre de usuario o contraseña incorrecta.</p></div>                    
                    
                    <!--<p>-->
                    
                    <p>
                        <label>Contraseña</label>
                        <br>
                        <input name="pwd1" class="inputMedium" id="passLogin" validate="{required:true,messages:{required:'Ingrese su password'}}" tabindex="2" type="password">
                    </p>                    
                                                          
                        <input id="recordarme" name="type" value="1" type="hidden">                        
                                        
                    <p>
                        <button type="submit" id="loginButton" class="botonButton">
                        
                        <span class="boton btnAzul"><span>Iniciar Sesión</span></span>
                        
                        </button>
                                                
                    </p>
                                        
                </fieldset>
            </form>
        </div>        
        
        <div class="login_mas_opciones_wrap">
            <h2>Necesitas estar registrado para efectuar compras...</h2>
            
            <p>            
            <a href="#" class="registerModal">
            <strong>Crear una cuenta</strong>
            </a> en <?php echo $nCom ?> si no estás registrado.</p>
        </div>
        
    </div>

    <div class="bumex_login clearfix" id="bumex_register">
        <div class="form_login_wrap">
            <form id="form_registro_postulante" action="chk.php" method="post" class="formCv">
                <fieldset>
                    <h2>Crear una cuenta</h2>
                    
                    <p>
                        <label>E-Mail (será su nombre de usuario)</label><br>
                        <input id="email" name="mail" class="inputMedium" validate="{required:true,email:true,messages:{required:'Ingrese su Usuario o E-Mail'}}" type="text">
                    </p>
                    
                   <p id="okaccount" class="okBox oculto">Cuenta de usuario registrada correctamente</p>
                   <p id="noaccount" class="warningBox oculto">A ocurrido un error mail o cedula ya registrada</p>                    
                    
                    <p>
                        <label>Cedula de Identidad</label><br>
                        <input id="ced" name="ced" class="inputMedium" validate="{required:true,digits:true,messages:{required:'Ingrese su Cedula de identidad'}}" type="text">
                    </p>          
                    
                    <p>
                    <input name="type" value="1" type="hidden">
                    </p>          
                    
                    <p>
                        <label>Elija una contraseña</label><br> 
                        <input name="pwd1" class="inputMedium" id="passRegister" validate="{required:true,rangelength:[8, 20], messages:{required:'Ingrese su clave',rangelength:'La clave debe contener entre 8 y 20 caracteres'}}" type="password">
                    </p><p class="mensajeError oculto"></p>
                    <p>
                        <label>Repita la contraseña</label><br>
                        <input name="pwd2" class="inputMedium" id="password2" validate="{required:true,equalTo:'#form_registro_postulante input[id=passRegister]',rangelength:[8, 20],messages:{required:'', equalTo:'La contraseña y su confirmación no coinciden',rangelength:'La clave debe contener entre 8 y 20 caracteres'}}" type="password">
                    </p><p class="mensajeError oculto"></p>
                    <p></p>
                    <p>
                    </p>                   
                    
                    <p>
                        <button type="submit" id="registerButton" class="botonButton"><span class="boton btnVerde"><span>Registrarme</span></span></button>
                    </p>
                     <p class="letraChica">Al hacer clic en “Registrarme” acepto los <a href="condiciones.php" target="_blank">términos y condiciones</a> de <?php echo $nCom ?></p>
                </fieldset>
            </form>
        </div>
        <div class="login_mas_opciones_wrap">
            <h2>También puedes...</h2>
            <p><a href="#" class="loginModal"><strong>Ingresar</strong></a> a <?php echo $nCom ?> si ya estás registrado.</p>
        </div>
    </div>

    <div id="recuperarPassword">
        <div class="form_login_wrap">
            <form action="#" method="post" class="formCv">
                <fieldset>
                    <h2>Recuperar contraseña</h2>
                    <p>
                        <label>Nombre de usuario o E-mail</label><br>
                        <input name="username" validate="{required:true,messages:{required:'Ingrese su Usuario o E-Mail'}}" type="text">
                        </p>
                        <div id="recuperacionContrasena" class="oculto"><p></p></div>
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


    <div class="container_12 clearfix">
        <div class="grid_6">
            <h1><a href="#" class="logoBumeran"><span>ProductAdmin - VERSION DEMO</span></a></h1>


        <div style="margin-left:100%; margin-top:-18%;" class="grid_6">
            <ul class="menuHorizontal menuRight clearfix">

                    <li id="loginDropdown">
                <a id="btnLogin" class="boton btnAzul loginModal" onclick="javacript:login(1)"><span>Cargando...</span></a>
                    </li>
            </ul>
        </div>
        </div>

                <div style="margin-top:-2%; margin-right:10%" id="social">
                <p><i>Compartelo en tus redes sociales..</i></p>

        <a href="http://www.facebook.com/sharer.php?u=http://testing.servehttp.com/" title="Compartir en Facebook" class="fade facebook" target="_blank"><span>facebook</span></a>
        <!--<a href="#" class="fade googleplus" target="_blank"><span>googleplus</span></a>-->
        <a href="http://twitter.com/home?status=Visita+http://testing.servehttp.com/" title="" class="fade twitter" target="_blank"><span>twitter</span></a>

                </div>

    </div>

    <div class="zocaloMenuGeneral"></div>
</div>

<?php 

	if(isset($_COOKIE['pass']) && isset($_COOKIE['mail']))      
   include "banner2.php";      
   
   	else
   	include "banner1.php";   	   	   	
?>  

<div style="float:right; margin-right:16%; margin-top:1%;" class="dock" id="dock">

  <div class="dock-container">
  
  <a class="dock-item" href="index.php"><img src="img/home.png" alt="home" /><span>Home</span></a>  
  <a class="dock-item" href="quien.php"><img src="img/info.png" alt="quienes_somos" /><span>Quienes somos</span></a> 

  </div>
  
</div>


    <div class="container_12 clearfix">        
            
        <?php
        
        if(strlen(strstr($_SERVER['REQUEST_URI'], "fact.php?param=100"))>0)
        include "fnd.php";
        
        if(isset($_COOKIE['pass']) && isset($_COOKIE['mail']))
        {        
        	
        if(strlen(strstr($_SERVER['REQUEST_URI'], "quien.php"))==0)
        include "fnd.php";
            
        echo '<ul id="navigation">
            	<li class="home"><a href="cnt.php"><span>Mi Perfil</span></a></li>            	
				
				<li id="LIsale" class="about oculto">

				<a href="formu.php?type=5">Comprar</a>				
				
				</li> 							
            	
        		 </ul>';
        }
        
        ?>
        
