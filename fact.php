<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<style type="text/css" title="currentStyle">

		@import "css/jquery.toastmessage.css";
		@import "css/demo_page.css";
		@import "css/demo_table_jui.css";
		
		<?php
		
		if(isset($_GET['param']) && $_GET['param']>0)
		{
		
			echo '@import "css/demo.css";
			@import "css/osx.css"';			
		}
		
		?>
		
</style>		        
                
	     <title>
	     
<?php	

	$consult1='select users.fname,users.sname,users.dni from users where id="' . $_COOKIE['pass'] . '"';	 

	require_once(dirname(__FILE__).'/../../../usr/share/yii/framework/yii.php');
	defined('YII_DEBUG') or define('YII_DEBUG',true);

	$cnx = new CDbConnection('mysql:host=localhost;dbname=productAdmin', 'userdb', 'db5e65fb2af18937f7b24b787949866522a0c04f30b21fc9a8dd2979d6e1b866');
	$cnx->active = true;
	$dat = $cnx->createCommand($consult1)->query();
	$dat->bindColumn(1, $Snam);
	$dat->bindColumn(2, $Pnam);
	$dat->bindColumn(3, $dni);
							
	$dat->read();
	
	if($Snam=="" Or $Pnam=="")
	$Nusr="No disponible";

		else
		$Nusr= $Pnam . " " . $Snam;
		
	$consult1="select compania.name,compania.rif,compania.dir,compania.keywords from compania";
	
	$dat = $cnx->createCommand($consult1)->query();
	$dat->bindColumn(1, $nCom);
	$dat->bindColumn(2, $RIF);	
	$dat->bindColumn(3, $dir);
	$dat->bindColumn(4, $keywords);
	$dat->read();
	
	echo $nCom;

?>
	     
	      - oPenMarket [ALPHA] </title>
	     
        <meta name="keywords" content= <?php echo '"' . $keywords . '"'; ?> >
        <meta name="description" content="medicamentos puerto la cruz">
        
<?php 

include "head.php"; 

if(isset($_GET['param']) && $_GET['param']>0)
{
	echo "<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/osx.js'></script>";
}

?>

<script src="js/jquery.dataTables.js"></script>

<script type="text/javascript">

function hahahaha()
{		
	$('#osx-modal-title').html('Datos para tu presupuesto');
	$('#osx-modal-data').html('<h2>Necesitas rellenar el formulario para poder continuar</h2> <p><b>Nombre: </b> <input id="JPname" class="inputMedium" value="" type="text"></p> <p><b>Direccion: </b> <input id="JPdir" class="inputMedium" value="" type="text"></p> <p><b>Razon Social: </b> <input id="JPDNI" class="inputMedium" value="" type="text"></p> <p><button class="simplemodal-close">Close</button> <span>(Presiona ESC para cerrar)</span></p>');
}

function guests()
{
	$('#osx-modal-title').html("Buscador de productos para Invitados");
        $('#osx-modal-data').html("Esta es  una lista de los productos disponibles en nuestra tienda..<br><br>");
	consulta(2);
}

$(document).ready(function()
{

	$('#example').dataTable(
	{
		"sScrollY": 200,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
	});	
});

</script>
        
</head>

<body>

<?php			

	include "body.php"; 

	if(isset($_COOKIE['mail'])==false || isset($_COOKIE['pass'])==false)
        echo '<div class="warningbox">Aun no estas logeado, para efectuar compras debes registrarte</div><br><br>';
				
?>				

<table>
	<thead>
		
		<tr>
			<td id="Jtname" align="left"><b>Nombre:</b> <?php echo $Nusr; ?> </td>
			<td align="left" width="1%"><b>Fecha: </b>
			
			<?php
			
			if(isset($_GET['flag'])==true && $_GET['flag']>0)
			{
				$dat=$cnx->createCommand("select ventas.fcompra from ventas where ventas.iduser='" . $_COOKIE['pass'] . "' and transid=" . $_GET['flag'])->query();
				$dat->bindColumn(1, $ahah);			
				$dat->read();
									
			echo $ahah;
			}
			
				else
				echo date("d/m/Y - h:m:s"); 
			
			?>
			
			</td>			
		</tr>		
		
		<tr>
			<td id="JtDNI"  align="left" width="2%"><b>Documento identidad:</b>  <?php echo $dni ?> </td>
			<td align="left"><b>Emisor:</b> <?php echo $nCom ?> </td>
		</tr>
		
		<tr>

<?php

if(isset($_GET['flag'])==true && $_GET['flag']>0)
{
	$dat=$cnx->createCommand("select ventas.dirEnv,ventas.paisEnv,ventas.city from ventas where ventas.iduser='" . $_COOKIE['pass'] . "' and transid=" . $_GET['flag'])->query();
	$dat->bindColumn(1, $tmp1);
	$dat->bindColumn(2, $tmp2);	
	$dat->bindColumn(3, $tmp3);
	$dat->read();

	$cnx=new CDbConnection('mysql:host=localhost;dbname=world', 'userdb', 'db5e65fb2af18937f7b24b787949866522a0c04f30b21fc9a8dd2979d6e1b866');
	$cnx->active = true;
	$tmp2=$cnx->createCommand("select name from Country where code='" . $tmp2 . "'")->queryScalar();


	$Dusr=$tmp1 . " (" . $tmp3 . " - " . $tmp2 . ")";	 
	
	
}

echo '<td style="align:center" id="JtDir" align="left" width="2%"><b>Dirección:</b> ' . $Dusr . '</td> <br> <td align="left"><b>Factura ID:</b>';

			if(isset($_GET['flag']) && $_GET['flag']>0)
			echo $_GET['flag'];
			
				else
				echo " No disponible";


?>
			
			 </td>						
		</tr>					
				
	</thead>
	
</table>

<div id="container" style="text-align:center;">

	<div class="container_12 clearfix">
        <div class="grid_12">
            <h2>Previsualización de 

				<?php            
            
            if(isset($_GET['param']) && $_GET['param']=="100")
            echo "Presupuesto";
            
            	else
            	echo "Factura";
            
            ?>
            
            </h2>
        </div>
    </div>
    
    <img src="img/notes.png" alt="question" align="left" hspace="7px"><p>Este es una previsualizacion de tu 
    
    <?php
    
    if(isset($_GET['param']) && $_GET['param']=="100")
    echo "presupuesto";
    
	    else
   	 echo "factura"; 
    
    ?>
    <!--, Aqui podras realizar consultas sobre los precios y descuentos de todos nuestros productos-->
    , Aqui podras ver los detalles de la selección de productos <br><br>
    
    <?php 

		if(isset($_GET['param']) && $_GET['param']>0)
                echo "Si deseas un presupuesto personalizado <a href='#' onclick='hahahaha()' class='osx'>Haz click aqui</a>";
		
		?>

                <br>
                <p>Si desea imprimir este reporte <a href="#" onclick="window.print()">Haga click aqui</a></p>
			
			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Producto</th>
			<th width="1%">Cantidad</th>
			<th width="1%">Descuento</th>
			<th width="1%">IVA</th>
			<th width="19%">Precio Und</th>
			<th>Total</th>
		</tr>		
	</thead>
		
	<tbody id="Jtabla">
	
	<?php
	
	$cnx = new CDbConnection('mysql:host=localhost;dbname=productAdmin', 'userdb', 'db5e65fb2af18937f7b24b787949866522a0c04f30b21fc9a8dd2979d6e1b866');
	
	if(isset($_GET['flag']) && $_GET['flag']>0)
	{
		$dat = $cnx->createCommand("select
		idproduct,
		precio,
		cant,
		iva,
		dsc from transacciones where idcompra=" . $_GET['flag'])->query();
		
			$dat->bindColumn(1, $Pid);
			$dat->bindColumn(2, $Pprice);
			$dat->bindColumn(3, $Pcant);
			$dat->bindColumn(4, $Piva);
			$dat->bindColumn(5, $Pdsc);			

		while($dat->read())
		{			
		
			if(!$Pdsc)
			echo '<tr class="odd gradeA">';
						
				else
				echo '<tr class="odd gradeB">';
				
				
			echo '<td>' . $cnx->createCommand("select name from products where id=" . $Pid)->queryScalar() . "</td>";
			echo '<td class="center">' . $Pcant . "</td>";
			echo '<td class="center">' . $Pdsc . "%</td>";		
			echo '<td class="center">' . $Piva . "%</td>";
			echo '<td>' . $Pprice . "</td>";
			echo '<td>' . $Pprice * $cont . '</td>';
			echo '</tr>';
		}
	}
	
	else
	{
					
	foreach($_COOKIE as $nom=>$cont)
	{
		if(strstr($nom, "product"))
		{						
		
			$dat = $cnx->createCommand("select products.name,products.price,products.iva,products.dsc from products where id=" . substr($nom, 7))->query();

			$dat->bindColumn(1, $Pname);
			$dat->bindColumn(2, $Pprice);
			$dat->bindColumn(3, $Piva);
			$dat->bindColumn(4, $Pdsc);

			$dat->read();			
		
			if(!$Pdsc)
			echo '<tr class="odd gradeA">';
						
				else
				echo '<tr class="odd gradeB">';
				
				
			echo '<td>' . $Pname . "</td>";
			echo '<td class="center">' . $cont . "</td>";
			echo '<td class="center">' . $Pdsc . "%</td>";		
			echo '<td class="center">' . $Piva . "%</td>";
			echo '<td>' . $Pprice . "</td>";
			echo '<td>' . "jajaj" . '</td>';
			echo '</tr>';					 			
		}	
	}
	}
	
	?>

	</tbody>
</table>
			</div>
				</div>
				
				<p style="font-weight: bold; font-size: 17pt;" id="muestra"></p>				
				
												
				
<?php

if(isset($_GET['param']) && $_GET['param']>0)
include "msg.php"; 

include "foother.php";

?>			

</body>
</html>
