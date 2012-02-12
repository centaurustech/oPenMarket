<?php

	require_once(dirname(__FILE__).'/../../../usr/share/yii/framework/yii.php');
	defined('YII_DEBUG') or define('YII_DEBUG',true);
	
	if(isset($_COOKIE['mail'])==false || $_COOKIE['pass']==false)
	{				
		header( "HTTP/1.1 301 Moved Permanently");
		header( "Location: index.php");
				
	return 0;						
	}
	
	echo '<!DOCTYPE html>';
	echo '<html xmlns="http://www.w3.org/1999/xhtml>"';
	echo '<head>';	
   echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
   echo '<title>';	     	     
	     

	$cnx = new CDbConnection('mysql:host=localhost;dbname=productAdmin', 'userdb', 'db5e65fb2af18937f7b24b787949866522a0c04f30b21fc9a8dd2979d6e1b866');
	$cnx->active = true;
	$dat = $cnx->createCommand("select compania.name,compania.dir,compania.rif,users.fname,users.sname,users.mail,users.id,compania.keywords, users.dni from compania,users where users.id='" . $_COOKIE['pass'] . "' limit 1")->query();
	
	$dat->bindColumn(1, $nCom);
	$dat->bindColumn(2, $dir);
	$dat->bindColumn(3, $RIF);
	$dat->bindColumn(4, $fName);
	$dat->bindColumn(5, $sName);
	$dat->bindColumn(6, $mail);
	$dat->bindColumn(9, $id);
	$dat->read();
	
	$dat = $cnx->createCommand("select
	ventas.paisEnv,
	ventas.city,
	ventas.dirEnv,
	ventas.codCel,
	ventas.codNum,
	ventas.codTel,
	ventas.numTel,
	ventas.codPago,
	ventas.typPago,
	ventas.prov,
	ventas.extraPago
	from ventas where ventas.iduser='" . $_COOKIE['pass'] . "' order by transid DESC limit 1")->query();	
	$dat->bindColumn(1, $paisEnv);
	$dat->bindColumn(2, $cityEnv);
	$dat->bindColumn(3, $dirEnv);
	$dat->bindColumn(4, $codCel);
	$dat->bindColumn(5, $numCel);
	$dat->bindColumn(6, $codTel);
	$dat->bindColumn(7, $numTel);
	$dat->bindColumn(8, $codTarj);
	$dat->bindColumn(9, $numCreditCard);
	$dat->bindColumn(10, $prov);
	$dat->bindColumn(11, $extrapago);			
	$dat->read();
	
	echo $nCom;

?>
	     
	      - oPenMarket [ALPHA] </title>
	     
        <meta name="keywords" content=<?php echo $keywords; ?> >
        <meta name="description" content="tiendas virtuales puerto la cruz">

<?php

include "head.php";

if(isset($_GET['type']) && $_GET['type']==5)
{
	echo "<script type='text/javascript' src='js/jquery.simplemodal.js'></script> <script type='text/javascript' src='js/osx.js'></script>";
}

?>


<script type="text/javascript">



function guests()
{
	$('#osx-modal-title').html("Buscador de Productos");
	$('#osx-modal-data').html("Esta es  una lista de los productos disponibles en nuestra tienda..<br><br>");
	consulta(2);
}

function cerrarbox()
{
	$('#ventanaModal0').addClass('oculto');
	$('#ventanaModal1').addClass('oculto');
	
	if(result>=0)
	{
		$('#asd').addClass('oculto');
		$('#asd1').addClass('oculto');
	}
}

function selectpago()
{	
	
	switch(parseInt($('#Jpago').val()))
	{
		case 1:		
		case 2:
		$('#Ppago').html('<b>Numero Tarjeta:</b>');
		$('#Ipago').attr("src", 'img/pago1.png');
		$('#Ipago').attr("width", '32');
		$('#Ipago').attr("height", '32');
		$('#PcodTarj').removeClass('oculto');
		$('#JcodTarj').removeClass('oculto');
		$('#LTarj').removeClass('oculto');
		$('#PTarjMes').removeClass('oculto');
		$('#JmesTarj').removeClass('oculto');
		$('#JTarjano').removeClass('oculto');
		$('#anoTarj').removeClass('oculto');
		$('#JTarimgn').removeClass('oculto');
		$('#JTarimg0').removeClass('oculto');
		break;
		
		case 3:
		$('#Ppago').html('<b>Correo paypal:</b>');
		$('#Ipago').attr("src", 'img/pago3.png');
		$('#Ipago').attr("width", '32');
		$('#Ipago').attr("height", '32');
		$('#Ipago').removeClass('oculto');
		$('#PcodTarj').addClass('oculto');
		$('#JcodTarj').addClass('oculto');
		$('#LTarj').addClass('oculto');
		$('#PTarjMes').addClass('oculto');
		$('#JmesTarj').addClass('oculto');
		$('#JTarjano').addClass('oculto');
		$('#anoTarj').addClass('oculto');
		$('#JTarimg').removeClass('oculto');
		$('#JTarimgn').addClass('oculto');
		$('#JTarimg0').addClass('oculto');
		break;		
		
		case 4:
		$('#Ppago').html('<b>Numero Cuenta:</b>');
		$('#PcodTarj').html('<b>Documento identidad:</b>');
		$('#Ipago').removeClass('oculto');
		$('#Ipago').attr("src", 'img/pago4.png');
		$('#Ipago').attr("width", '32');
		$('#Ipago').attr("height", '32');				
		$('#PcodTarj').removeClass('oculto');
		$('#JcodTarj').addClass('oculto');
		$('#LTarj').addClass('oculto');
		$('#PTarjMes').addClass('oculto');
		$('#JmesTarj').addClass('oculto');
		$('#JTarjano').addClass('oculto');
		$('#anoTarj').addClass('oculto');
		$('#JcodTarj').removeClass('oculto');
		$('#JcodTarj').attr('maxlength', "12");		
		$('#JTarimg0').addClass('oculto');
		break;														
	}		
}

function where(flag)
{	
	
	switch(flag)
	{
		case 1:
		que=$('#Jpais');
		break;
		
		case 2:
		que=$('#Jedo');
		break;
	}
	
	que.html('<option value="" selected="selected">Cargando..</option>');
	
	datos="";
	
	$.ajax(
	{				
		data:"where=" + flag + "&code=" + $('#Jpais').val(),
		type:"POST",
		dataType:"json",
		url:"chk.php",
		
		success:
		
		function(data)
		{							
			$.each(data, function(indx1, vlr1)
			{				
				datos=datos+'<option value="' + data[indx1].Code + '" selected="selected">' + data[indx1].name + '</option>';												
				que.html(datos);
			});			
		}			
	});
}

function isChar(prm)
{
	for(i=0;i<prm.length;i++)
	{
	a=97;
	flag=0;	
		
		while(a!=122)
		{					
			if(prm[i].toLowerCase()==String.fromCharCode(a) || prm[i]==" ")
			{				
				flag=1;
			}
									
		a++;
		}
		
	if(flag==0)
	{
		return false;
	}	
		
	}
		
return true;
}

function checkout()
{
	
	enviar=0;
		
	if($('#Jedo').val()=="Elija un pais")
	{								
			$('#Dedo').removeClass('oculto');		
			$('#Dedo').text('Elija un ciudad para el envio del producto');		
		
	enviar++;								
	}
	
		else
		{
			$('#Dedo').addClass('oculto');
		}
	
	if($('#Jdir').val().length<20)
	{							
			$('#Ddir').removeClass('oculto');		
			$('#Ddir').text('Verifique que su direccion sea correcta y supere los 20 caracteres');
		
	enviar++;								
	}
	
	else
	{
		$('#Ddir').addClass('oculto');
	}
	
	if($('#Jpago').val()==2 || $('#Jpago').val()==1)
	{					
	
		if(isNaN(parseInt($('#JcodTarj').val()))==true || isNaN(parseInt($('#JserialTarj').val()))==true || $('#JserialTarj').val().length<7 || $('#JcodTarj').val().length!=4)
		{							
			$('#Dpago').removeClass('oculto');		
			$('#Dpago').text('Verifique su numero de tarjeta credito o su codigo se seguridad');
		
		enviar++;
		return false;
		}
		
	else
	{
		$('#Dpago').addClass('oculto');
	}
									
	}
	
	if($('#Jpago').val()==3)
	{				
	
		if($('#JserialTarj').val().indexOf('@')==-1 || $('#JserialTarj').val().indexOf('.')==-1)
		{										
			$('#Dpago').removeClass('oculto');		
			$('#Dpago').text('Verifique que su cuenta Paypal sea valida');
		
		enviar++;
		}
		
				else
				{
					$('#Dpago').addClass('oculto');
				}								
	}	
	
	if($('#Jpago').val()==3 && $('#JserialTarj').val().length<6)
	{
		
		if($('#JserialTarj').val().indexOf('@')==-1 || $('#JserialTarj').val().indexOf('.')==-1)
		{
			$('#Dpago').removeClass('oculto');		
			$('#Dpago').text('Email de usuario incorrecto.. Verifique su dirección de mail');
			
		enviar++;
		}					
	}
	
		else
		{
			if(!enviar)
			$('#Dpago').addClass('oculto');
		}
	
	if($('#Jemail').val().length<6 || $('#Jemail').val().indexOf('@')==-1 || $('#Jemail').val().indexOf('.')==-1)
	{
		$('#Dmail').removeClass('oculto');		
		$('#Dmail').text('Email de usuario incorrecto.. Verifique su dirección de mail');
	
	enviar++;			
	}
	
			else
			{
				$('#Dmail').addClass('oculto');			
			}	
	{
				
	}
	
	e=0;

	while(e<=2)
	{
		if($('#J' + e).val().length==0 || isChar($('#J' + e).val())==false)
		{
			$('#D' + e).text('Verifique que el campo sea mayor a 5 caracteres y contenga solo letras');
			$('#D' + e).removeClass('oculto');
			
		enviar++;
		}
	
			else
			{
				$('#D' + e).addClass('oculto');			
			}
	e++;
	}	
	
	while(e<=6)
	{
		
		if(e==5)
		{
						
			if($('#J5').val()=="0426" || $('#J5').val()=="0416" || $('#J5').val()=="0424" || $('#J5').val()=="0414" || $('#J5').val()=="0412")
			{
				
			if($('#J6').val().length!=7)
			{								
					$('#D5').text('Solo se permiten numeros de telefonos validos');
					$('#D5').removeClass('oculto');
				
				return true;				
				enviar++;
			}
							
			}
			
				else
				{
					$('#D5').addClass('oculto');					
				}
		}						
		
		if($('#J' + e).val().length<3 || isNaN(parseInt($('#J' + e).val()))==true)
		{
			$('#D' + e).text('Verifique que el campo solo contenga digitos o que no este vacio y que contenta la longitud valida');
			$('#D' + e).removeClass('oculto');
		
		enviar++;
		}
		
			else
			{
				$('#D' + e).addClass('oculto');			
			}
		
	e++;
	}	
	
	if(!$('#Jemail').val().indexOf('gmail'))
	{				
		$('#Jwebmail').attr('href', "https://gmail.com");		
	}
	
	else if(!$('#Jemail').val().indexOf('yahoo'))
	{
		$('#Jwebmail').attr('href', "https://mail.yahoo.com");				
	}	
	
	else if(!$('#Jemail').val().indexOf('cantv'))
	{	
		$('#Jwebmail').attr('href', "https://cantv.net");		
	}
	
	else
	{	
		$('#Jwebmail').attr('href', "https://hotmail.com");		
	}
	
	if(!enviar)
		{
			$('#ventanaModal0').removeClass('oculto');
			$('#ventanaModal1').removeClass('oculto');
			
		cap="<b>Conectando con ";		
			
		switch(parseInt($('#Jpago').val()))
		{					
												
			case 1:
			cap= cap +'VISA</b>';
			break;
												
			case 2:
			cap=cap + 'MasterCard</b>';
			break;
												
			case 3:
			cap=cap + 'la API Paypal</b>';
			break;
			
			case 4:
			cap=cap + 'la API SWIFT</b>';
			break;			
		}
		
		cap=cap + '<br>Por favor espere..'

			$('#titlePago').html(cap);
			
			youaccount=parseFloat(Math.floor(Math.random()*100000001));
			
			result= youaccount - parseFloat($.cookie('totalPrice'));
			cap="Hola, " + $('#J0').val() + " dispones de " + youaccount + " BsF en tu cuenta tienes " + $.cookie('totalPrice') + " en tus compras, la operacion ";
			
			if(result>=0)
			cap=cap+" a sido validada";
			
				else
				cap=cap+" no a podido realizarse por falta de credito";
				
			
			window.setTimeout(function ()
			{											

			if(result>=0)
			{
				$('#Itrans').attr('src', "img/informeichon.png");
				$('#titlePago').html("<b>Enviando informacion al servidor</b><br>Almacenando datos..");
				
	$.ajax(
	{
				
		data: "mail=" + $('#Jemail').val() + "&paisResi=" + $('#Jpais').val() + "&edoResi=" + $('#Jedo').val() + "&city=" + $('#J2').val() + "&dirEnv=" + $('#Jdir').val() + "&celCod=" + $('#J5').val() + "&celNumero=" + $('#J6').val() + "&telCod=" + $('#J3').val() + "&telNumero=" + $('#J4').val() + "&mesTarj=" + $('#JmesTarj').val() + "&anoTarj=" + $('#anoTarj').val() + "&typPago=" + $('#Jpago').val() + "&serialTarj=" + $('#JserialTarj').val() + "&codTarj=" + $('#JcodTarj').val(),
		type: "POST",
		dataType: "json",
		url: "chk.php",
		success: 
			
			function(data)
			{																			
			}
				
	});
	
	$('#Dgreat').removeClass('oculto');
			
	}
			
				else
				{
					$('#Itrans').attr('src', "img/nosaldo.png");					
					$('#titlePago').html("<b>Transaccion completada</b><br>Finalizando conexion...");					
				}								
								
				$('#Jcuanto').html(cap);				
			},
			Math.random()*5500);			 		
		 
		}								
}

$(document).ready(function()
{	
	
	$('#botonSearch').addClass('oculto');
	$('#btnOtro').removeClass('oculto');
		
	where(1);	
	
});
</script>

<style type="text/css">

p
{
	text-align: left;
}

</style>

<style type="text/css" title="currentStyle">
		
		<?php
		
		if(isset($_GET['type']) && $_GET['type']==5)
		{
			echo "@import 'css/osx.css';";
		}
		
		?>
		
</style>

</head>


<?php 
 
	echo '<body>';
	
	include "body.php";		
	
	    echo '<div class="container_12 clearfix">
        <div class="grid_12">
            <h2>Formulario de datos</h2>
        </div>
    </div>';
    
	if(isset($_COOKIE['prodCant']) && $_COOKIE['prodCant']>0)    
   echo '<p id="asd1" class="alignCenter"><img src="img/info.png" alt="infobox">Cuentas con un total de <b>' . $_COOKIE['totalPrice'] . '</b> en tus compras.<br><br></p>';
   
   else
	echo '<img src="img/notienes.png" style="float:center;">No tienes productos seleccionados en tu market <a href="index.php">Volver a la tienda</a>';

?>

<?php

if(isset($_GET['type']) && $_GET['type']==5)
include "msg.php";

if(isset($_COOKIE['prodCant']) && $_COOKIE['prodCant']>0)
include "sale.php";
	
	include "foother.php";
?>

