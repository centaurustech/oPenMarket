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
	$dat=$cnx->createCommand("select products.name,products.vendedor,products.descr,products.cant,products.limitCmp,products.dsc,products.pathimg,products.price,products.keywords,products.recipe,compania.name from products,compania where id=" . $_POST['ident'])->query();
						
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
			$dat->bindColumn(11, $nCom);
			
			$dat->read();
	
	echo $nCom;

?>
	     
	      - oPenMarket [ALPHA] </title>
	     
        <meta name="keywords" content= <?php echo '"' . $keywords . '"' ?> >
        <meta name="description" content="medicamentos puerto la cruz">
        
<?php include "head.php" ?>

<script type="text/javascript" src="js/jquery.toastmessage.js"></script>

<script type="text/javascript">

    function msg(nam, price, id, cant)
    {    	
		$().toastmessage({position	: 'middle-right'});      
      $().toastmessage('showSuccessToast', "Agregado " + cant  + " " + nam  + " a tu cuenta");
      
      if($.cookie('totalPrice')==null)
      {
      	$.cookie('totalPrice',  parseFloat(price));            	
      }
      
      	else
      	$.cookie('totalPrice',  parseFloat($.cookie('totalPrice')) + parseFloat(price));
      	
      
      if($.cookie('product' + id)==null)
      {
      	$.cookie('product' + id,  cant);      	
      }       

			else            
			$.cookie('product' + id, parseInt($.cookie('product' + id)) + parseInt(cant));
			
      if($.cookie('prodCant')==null)
      {
      	$.cookie('prodCant',  cant);      	
      }       

			else            
			$.cookie('prodCant', parseInt($.cookie('prodCant')) + parseInt(cant));
		
	 }

</script>        
        
</head>

<body>        

<?php include "body.php" ?>

    <div class="container_12">		 

        <div class="grid_8" id="avisoContenido">

<ul class="avisosBreadcrumbs clearfix">

            <h4 class="separador">
                <a href="#">Información sobre nuestro producto</a>
            </h4>

</ul>

<img src= <?php echo "'" . $pathimg . "'" ?> alt="medicina"  width="300px" height="160px" align="right">
			
            <h2><?php echo $name; ?></h2>            
            <h3><?php echo $nomb ?></h3>
          
                       	
                	
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
            <p align="left">
            
            <?php           
            
            	$dir=fopen("dats/" . $_POST['ident'] . ".txt", "r");            
            	echo fgets($dir, 5000);
            
            ?> 
</p>
            
			
            
                <div class="grid_5 alpha">
                    <p id="btnEnviarMiCv" onclick=
                    
					<?php								
						echo "javascript:msg('" . $nomb . "'," . $price  . "," . $_POST['ident'] . "," . 1 . ")";
					?>                    
                    
                     class="boton btnAzul"> <span>Comprar articulo</span></p>                    
                </div>
            
        </div>
    </div>    
     
<?php
/*echo "<br> <div align='rigth'>";
include "oferta.php";
echo "</div>";*/
include "foother.php" ?>	

</body>
</html>