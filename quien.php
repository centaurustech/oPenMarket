<!DOCTYPE html>
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
	$dat->bindColumn(5, $keywords);
	$dat->read();
	
	echo $nCom;

?>
	     
	      - oPenMarket [ALPHA] </title>
	     
        <meta name="keywords" content= <?php echo '"' . $keywords . '"' ?> >
        <meta name="description" content="medicamentos puerto la cruz">
        
<?php include "head.php" ?>

<script>

$(document).ready(function()
{
	
	$('#dock').attr("style", "float:center;");
	
});

</script>        
        
</head>

<body>        

<?php include "body.php" ?>

<div style="text-align:justify;">
<b>HISTORIA</b>
<br>
<br>
La farmacia “Santa Cruz” se constituyó el 21 de enero de 2009, en el sector La Caraqueña, calle 23 de Enero, Local II, Puerto La Cruz –Edo Anzoátegui. Es una empresa dedicada a prestar servicios a sus clientes, con el fin de llegar a ser una empresa líder en ventas a nivel local.
<br>
<br>
<b>MISIÓN</b>
<br>
<br>
Somos una farmacia conformada por un equipo de personas motivadas a dar lo mejor de sí, orientadas a brindar un servicio que satisface a sus clientes, sustentándose en un sistema de gestión de calidad y en el mejoramiento continuo de sus procesos, con criterio de rentabilidad y permanencia en el tiempo.
<br>
<br>
<b>VISIÓN</b>
<br>
<br>
Trabajamos en equipo, de forma productiva y eficiente, mejorando cada día para:
“Ser reconocida por la comunidad como la farmacia de mayor confianza y mejor calidad de servicio”.
<br>
<br>
<b>VALORES</b>
<br>
<br>
Nos esmeramos por satisfacer, con sensibilidad y calidad humana, las necesidades de nuestros clientes y superar sus expectativas.
<br>
<br>
<img src="img/bien-verde.png" alt="uno"> Vocación de Servicio: Nos esmeramos por satisfacer, con sensibilidad y calidad humana, las necesidades de nuestros clientes y superar sus expectativas.<br><br> <img src="img/doctor.jpg" alt="doctors" align="right" hspace="30px">
<img src="img/bien-verde.png" alt="uno"> Confianza: Nos esforzamos en generar credibilidad y esperanza firme, por el cumplimiento de nuestras promesas y compromisos.<br><br>
<img src="img/bien-verde.png" alt="uno"> Atención a la Comunidad: Contribuimos con el desarrollo de programas de responsabilidad social para beneficio de nuestra comunidad.<br><br>
<img src="img/bien-verde.png" alt="uno"> Honestidad: La verdad, honradez y rectitud son cualidades que caracterizan nuestras acciones.<br><br>
<img src="img/bien-verde.png" alt="uno"> Perseverancia: Cualidad que nos caracteriza por nuestra constancia hacia la obtención de logros y metas trazadas.<br><br>
<img src="img/bien-verde.png" alt="uno"> Respeto: Aceptamos el comportamiento individual tal como es, aprovechando lo positivo de las experiencias.<br><br>
<img src="img/bien-verde.png" alt="uno"> Compromiso Recíproco: nos caracterizamos por la mutua relación de justicia y equidad entre el propietario y su equipo de trabajo.<br><br>
<br>
<br>
<b>POLÍTICA DE CALIDAD</b>
<br>
<br>
<img src="img/quality.png" alt="garantia" align="left" ><br>En Santa Cruz, los procesos se deben realizar siguiendo sus principios fundamentales: dispensación y asesoramiento permanente, garantía de surtido y ambiente apropiado, sustentados en el mejoramiento continuo de la eficacia del sistema de gestión de la calidad, a fin de lograr una experiencia positiva en los clientes.
     
<?php include "foother.php" ?>	

</body>
</html>
