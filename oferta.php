<div style="float:left; text-align:center;" class="collapsableBox avisosSimilares">
		
	    <a href="#" class="collapsableGroup collapsableGroupAbierto"><img src="img/sale.png" width="48px" height="48px" hspace="6" align="left">Últimas ofertas recomendadas</a>
	    
<br>
<br>	    
			
	<?php
			
	$dat = $cnx->createCommand('select name,dsc,id from products order by dsc DESC limit 3')->query();
	
		$dat->bindColumn(1, $nProduct);
		$dat->bindColumn(2, $dscProduct);
		$dat->bindColumn(3, $iden);
		$dat->read();			 
			 
	?>
			 		
		<a class="avisoSimilar" onclick="frm333333.submit()" href="#"> <span class="tituloAvisoSimilar"><?php echo $nProduct; ?></span> </a>
                    
		<form action="detalles.php" method="POST" name="frm333333">
			<input type="hidden" name="ident" value= <?php echo '"' . $iden . '"'; ?> >
		</form> 
						
			<img src="img/sale1.png" width="48px" height="48px" hspace="6" align="left">			
			<span class="empresaAvisoSimilar">Con un descuento de <b><?php echo $dscProduct . "%"; 	$dat->read(); ?></b></span>
		
<br>				
		
		<a class="avisoSimilar" onclick="frm111.submit()" href="#"> <span class="tituloAvisoSimilar"><?php echo $nProduct; ?></span> </a>
                    
		<form action="detalles.php" method="POST" name="frm111">
			<input type="hidden" name="ident" value= <?php echo '"' . $iden . '"'; ?> >
		</form> 
						
			<img src="img/sale1.png" width="48px" height="48px" hspace="6" align="left">			
			<span class="empresaAvisoSimilar">Con un descuento de <b><?php echo $dscProduct . "%"; 	$dat->read(); ?></b></span>
		

<br>	

		<a class="avisoSimilar" onclick="frm2222.submit()" href="#"> <span class="tituloAvisoSimilar"><?php echo $nProduct; ?></span> </a>
                    
		<form action="detalles.php" method="POST" name="frm2222">
			<input type="hidden" name="ident" value= <?php echo '"' . $iden . '"'; ?> >
		</form>	
		
		<img src="img/sale2.png" width="48px" height="48px" hspace="6" align="left">
			<span class="empresaAvisoSimilar">Con un descuento de <b><?php echo $dscProduct . "%"; 	$dat->read(); ?></b></span>

</div>