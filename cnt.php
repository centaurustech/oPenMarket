<?php

	if(isset($_COOKIE['pass'])==false || isset($_COOKIE['mail'])==false)
	{				
		header( "HTTP/1.1 301 Moved Permanently");				
		header( "Location: index.php");
				
	return 0;						
	}

	require_once(dirname(__FILE__).'/../../../usr/share/yii/framework/yii.php');
	defined('YII_DEBUG') or define('YII_DEBUG',true);
	
	echo '<!DOCTYPE html>';
	echo '<html xmlns="http://www.w3.org/1999/xhtml>"';
	echo '<head>';	
   echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
   echo '<title>';	     	     
	     

	$cnx = new CDbConnection('mysql:host=localhost;dbname=productAdmin', 'userdb', 'db5e65fb2af18937f7b24b787949866522a0c04f30b21fc9a8dd2979d6e1b866');
	$cnx->active = true;
	$dat = $cnx->createCommand('select compania.name,compania.dir,compania.rif,users.fname,users.sname,compania.moneda,compania.keywords from compania,users where users.id="' . $_COOKIE['pass'] .  '"')->query();
	
	$dat->bindColumn(1, $nCom);
	$dat->bindColumn(2, $dir);
	$dat->bindColumn(3, $RIF);
	$dat->bindColumn(4, $Pname);
	$dat->bindColumn(5, $Sname);
	$dat->bindColumn(8, $mon);
	$dat->bindColumn(9, $keywords);	
	
	$dat->read();
	
	echo $nCom;

?>
	     
	      - oPenMarket [ALPHA] </title>
	     
        <meta name="keywords" content= <?php echo '"' . $keywords . '"'; ?>>
        <meta name="description" content="medicamentos puerto la cruz">
        
<?php include "head.php" ?>

<script type="text/javascript" >

$(document).ready(function()
{
	userinfo();
});

</script>
        
        
</head>
<body>

<?php include "body.php" ?>
   	
    <div class="container_12 clearfix">
        
        <div class="grid_8">
                  
            <h4 class="tituloDivisor">Tus compras</h4>
            <div class="feedWrap"><!--grid_8 alpha omega-->
                
                <div class="feedEntry clearfix ">
                                                                                                     
	<?php
	
	$dat=$cnx->createCommand('select ventas.fcompra,ventas.totalcmp,ventas.typPago,ventas.transid from ventas where iduser="' . $_COOKIE['pass'] . '" order by ventas.transid desc')->query();

	$dat->bindColumn(1, $fech);
	$dat->bindColumn(2, $total);
	$dat->bindColumn(3, $tyPag);
	$dat->bindColumn(4, $tranID);
	$dat->read();

	if($dat->rowCount)
	{
		
	do
	{			
		
		$tmp=$cnx->createCommand('select transacciones.idproduct,transacciones.cant from transacciones where idcompra=' . $tranID)->query();
		$tmp->bindColumn(1, $IDprd);
		$tmp->bindColumn(2, $CTprd);
		
		$cntprd=0;
		
		while($tmp->read())
		$cntprd=$cntprd+$CTprd;
		
		$cntprd--;
		
		switch($tyPag)
		{
			case 1:
			$Tpago="tarjeta de credito <b>VISA</b>";
			$dstimg="1.png";
			break;                            	
                            	
			case 2:
			$Tpago="tarjeta de credito <b>Master Card</b>";
			$dstimg="2.png";
			break;
                            	
			case 3:
			$Tpago="<b>Paypal</b>";
			$dstimg="3.png";
			break;
                            	
			case 4:
      	$Tpago="una <b>Transferencia Bancaria</b>";
      	$dstimg="4.png";
			break;                            	                            	                            	
		}					
			
		echo '<div class="feedIcon feedIconInfo"><img src="img/pago' . $dstimg . '" height="48" width="48"></div><div class="feedData"><p><span class="feedTipoActividad">Compra realizada</span><span class="feedCuando"> Hace ' . $cnx->CreateCommand("SELECT DATEDIFF(now(),'" . $fech . "')")->queryScalar() . ' días</span></p><div class="feedAvisoRecomendado"><h2><a href="fact.php?flag=' . $tranID . '">' . $cnx->createCommand("select name from products where id=" . $IDprd)->queryScalar() . ' y otros '  . $cntprd  . ' productos mas</a></h2><p class="feedAvisoDonde">Compra efectuada: ' . $fech . '</p><p class="feedAvisoDescripcion">La compra fue realizada por un monto total de <b>' . $mon . ' ' . $total . '</b> y fue cancelada con ' . $Tpago;	
		echo '</p></div></div><br>';
	
	}while($dat->read());
	
	}
	
		else       	      
      echo '<p align="center"><b><img src="img/cestica.png">   Hasta ahora.. No haz efectuados compras</b></p>';
              
	?>
	
	</div>
	                                                                                                                                                                                                                                                                                                                                                                                                          
                <a href="#" class="verMasResultados oculto"><span>Ver actividades anteriores</span></a>
            </div>
        </div>

        <div class="grid_4 sidebar">                        
            <div class="simpleBox">
                <h4>Tu Perfil</h4>
                <div class="simpleBoxContent">

                 <!-- Fin Menu -->
                 
                	<div class="cvOverview"> 
                		<p class=""><a class="cvNombrePostulante" href="#"> <?php echo $Pname . " " . $Sname; ?> </a></p>
                        
                        <div class="cvProgress">
                            <div class="cvProgressBar cvProgressBarAlta" style="width: 85%"></div>
                        </div>
                    </div>
                    <ul class="cvPendingActions">
                    	
                    	<!--<li class=""><a class="recomendaciones" id="empleo_actual" href="formu.php">Editar tu informacion</a>
                    	</li>
                    	
                    	<li class="recomendaciones" onclick="javascript:window.print()"><a href="#">Imprimir formulario</a></li>-->                    	                    	
                    	
                    </ul>
                    
                </div>
            </div>

<div class="simpleBox">
    <h4>Compras</h4>
    <div class="simpleBoxContent">
	<p class="yoConseguiCuanto">

<?php
	
	echo $dat->rowCount;			
?>	
	
	</p>
	<p class="yoConseguiDetalle"><img src="img/cesta.png" hspace="2px" align="left">Es el total de tus compras en <b><?php echo $nCom; ?> </b><br><br><a href="#">Ver historial de compras</a></p>
    </div>
</div>

	<?php

	include "mark.php";	
	
	?>


        </div>                
    </div>
    


<!-- INICIO MODAL PARA CONSULTAS 
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
FIN MODAL PARA CONSULTAS -->

<?php include "foother.php" ?>

</body>
</html>