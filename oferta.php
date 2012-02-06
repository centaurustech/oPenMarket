<div style="float:left; text-align:center;" class="collapsableBox avisosSimilares">
		
	    <a href="#" class="collapsableGroup collapsableGroupAbierto"><img src="img/sale.png" width="48px" height="48px" hspace="6" align="left">Últimas ofertas recomendadas</a>
	    
<br>
<br>	    

		<a class="avisoSimilar" href="#">
		<img src="img/sale3.png" width="48px" height="48px" hspace="6" align="left">
		<span class="tituloAvisoSimilar">
			
	<?php
			
	$dat = $cnx->createCommand('select name,dsc from products order by dsc DESC')->query();
	
		$dat->bindColumn(1, $nProduct);
		$dat->bindColumn(2, $dscProduct);
		$dat->read();
			
	echo $nProduct; 
			 
	?>
			 
			 </span>
			<span class="empresaAvisoSimilar">Con un descuento de <b><?php echo $dscProduct . "%"; 	$dat->read(); ?></b></span>
		</a>
		
<br>				
		
		<a class="avisoSimilar" href="#">
		<img src="img/sale1.png" width="48px" height="48px" hspace="6" align="left">
			<span class="tituloAvisoSimilar"><?php echo $nProduct; ?></span>
			<span class="empresaAvisoSimilar">Con un descuento de <b><?php echo $dscProduct . "%"; 	$dat->read(); ?></b></span>
		</a>

<br>		
		
		<a class="avisoSimilar" href="#">
		<img src="img/sale2.png" width="48px" height="48px" hspace="6" align="left">
			<span class="tituloAvisoSimilar"><?php echo $nProduct; ?></span>
			<span class="empresaAvisoSimilar">Con un descuento de <b><?php echo $dscProduct . "%"; 	$dat->read(); ?></b></span>
		</a>

</div>