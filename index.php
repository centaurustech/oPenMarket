<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
<style type="text/css" title="currentStyle">

		@import "css/jquery.toastmessage.css";
		
</style>											
        
        
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
	$dat->bindColumn(5, $keywords);
	$dat->read();
	
	echo $nCom;

?>
	     
	      - oPenMarket [ALPHA] </title>
	     
        <meta name="keywords" content= <?php echo '"' . $keywords . '"' ?> >
        <meta name="description" content="medicamentos puerto la cruz">
        
<?php include "head.php" ?>

<script type="text/javascript" src="js/jquery.toastmessage.js"></script>

<script type="text/javascript">

$(document).ready(function()
{
	
	consulta(1);
	
	<?php
				
	if(isset($_COOKIE['pass']) && isset($_COOKIE['mail']))
	echo 'userinfo()';
	
	?>
		
		$('.otherbutton,.homebutton,.downloadbutton,.donatebutton').append('<span class="hover"></span>').each(function ()
		{
	  		var $span = $('> span.hover', this).css('opacity', 0);
	  		
	  		$(this).hover(function ()
	  		{
	    		$span.stop().fadeTo(500, 1);
	 		}, 
	 		
	 		function ()
	 		{
	   			$span.stop().fadeTo(500, 0);
	  		});
		});				
});

</script>        
        
</head>

<body>

<?php

	include "body.php";		 
 
	if(isset($_COOKIE['pass']) && isset($_COOKIE['mail']))
	include "mark.php";
	
		else
		{	
			include "pres.php";
			include "oferta.php";			
		}			

$cant=1;

?>	
        
<div align="center" class="grid_6">                                         						
            
            <div id="Gprd0" class="roundBox avisoHome oculto">
                <a href="detalles.php">
					<img class="logoEmpresaAviso" id="Pimg0" src="" height="95" width="150">
					</a>                
                
                <div class="datosAvisoHome">
						<h2>
						                                                           
						<a id="Nprd0" href="#" onclick="document.frm.submit()"></a>
                    
						<form action="detalles.php" method="POST" name="frm">
							<input id="Iprd0" type="hidden" name="ident" value="">
						</form> 
                                       
                  </h2>
                    <h3 id="Dprd0"></h3>
                    <h4 id="Pprd0" class="zonaAvisoHome"></h4>
                    
                    <span class="cuandoAvisoHome">

                  <div id="content">
			
						<p>
						
						<a id="Lprd0" href="#"
						
						<?php
						
						if(isset($_COOKIE['mail'])==false || isset($_COOKIE['pass'])==false)
						echo ' class="homebutton loginModal"';
						
							else
							echo ' class="homebutton"';							
						
						?>

						>						
						</a>
								
																								
								<a id="ultimo0" href="formu.php?type=5"
								
								<?php

								if(isset($_COOKIE['mail'])==false || isset($_COOKIE['pass'])==false)
								echo " class='loginModal";
								
									else
									echo " class='";								
								
								?> 
								
								downloadbutton oculto'>
								
								</a>								
						</p>
						</div>                    
                    
                    </span>
                    
                </div>
            </div>
            
            <div id="Gprd1" class="roundBox avisoHome oculto">
            
					<a href="detalles.php">
                <img class="logoEmpresaAviso" id="Pimg1" src="" height="95" width="150">
                </a>
                
                <div class="datosAvisoHome">
                    <h2>
                    <a id="Nprd1" href="#" onclick="document.frm1.submit()"></a>

						<form action="detalles.php" method="POST" name="frm1">
							<input id="Iprd1" type="hidden" type="hidden" name="ident" value="">
						</form>                    
                    
                    </h2>                    
                    <h3 id="Dprd1"></h3>
                    <span id="Pprd1" class="zonaAvisoHome"></span>
                    <h4><span class="cuandoAvisoHome">                 
                    
                  <div id="content">
			
						<p>
						
						
						<a id="Lprd1" href="#"
								
								
						<?php
						
						if(isset($_COOKIE['mail'])==false || isset($_COOKIE['pass'])==false)
						echo ' class="homebutton loginModal"';
						
							else
							echo ' class="homebutton"';
						
						?>
																														
						>										
								</a>
																								
								<a id="ultimo1" href='formu.php?type=5'
								
								<?php

								if(isset($_COOKIE['mail'])==false || isset($_COOKIE['pass'])==false)
								echo " class='loginModal";
								
									else
									echo " class='";								
								
								?> 
								
								downloadbutton oculto'>
								
								</a>																				
								
						</p>
						</div>						

					</span>
					</h4>
                </div>
            </div>
            
            <div id="Gprd2" class="roundBox avisoHome oculto">
            
                <a href="detalles.php">
                <img class="logoEmpresaAviso" id="Pimg2" src="" height="95" width="150">
                </a>
                
                <div class="datosAvisoHome">
					 <a href="detalles.php"</a>
                    
                    <h2>                    
                    <a id="Nprd2" href="#" onclick="document.frm2.submit()"></a>

						<form action="detalles.php" method="POST" name="frm2">
							<input id="Iprd2" type="hidden" type="hidden" name="ident" value="">
						</form>                    
                    
						  </h2>
						  
						  <h3 id="Gprd2"></h3>
						  
                    <h4 class="zonaAvisoHome" id="Pprd2">asdasdasd</h4>
							<div id="content">
			
							<p>
							
						<a id="Lprd2" href="#"
								
						<?php
						
						if(isset($_COOKIE['mail'])==false || isset($_COOKIE['pass'])==false)
						echo ' class="homebutton loginModal"';
						
							else
							echo ' class="homebutton"';
							
						
						?>																								
						>								
						</a>							
								
								<a id="ultimo2" href="formu.php?type=5"
								
								<?php

								if(isset($_COOKIE['mail'])==false || isset($_COOKIE['pass'])==false)
								echo " class='loginModal";
								
									else
									echo " class='";								
								
								?> 
								
								downloadbutton oculto'>
								
								</a>								
							</p>
							
							</div>
                </div>
            </div>

        </div>
                           
            <!--<p class="alignRight">
            <a id="btnVerMasAvisos" class="boton btnAzul oculto" href="#"><span>Ver más productos</span>
            </a>
            </p>-->              			

	<?php
		
	include "foother.php";	
	 
	?>	

</body>
</html>
