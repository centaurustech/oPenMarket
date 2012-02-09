function userinfo()
{
			
	IVA=12;
	tRest=parseFloat($.cookie('totalPrice')) * parseFloat(IVA) / 100 + parseFloat($.cookie('totalPrice'));
	tRest1=1;
	descuent=true;
		
	
	if($.cookie('prodCant')!=null && $.cookie('totalPrice')!=null)
	{
		if($.cookie('prodCant')>1)
		{
			ini="Tienes un total de " +  $.cookie('prodCant')  + " productos";
		}
		
			else
			{
				ini="Tienes un producto seleccionado";
			}

		if(descuent==false)
		{
			ini= ini + "<br>No posees descuentos<br>en tu cesta<br><br>"
		}
		
			else
			{
				ini= ini + "<br>Genial.! posees descuentos en tus compras"
			}						
											
		$("#misc").html(ini);
						
		$("#price").fadeOut(300);
		$("#price").html('<span class="tx9"><strong> BsF ' + tRest + '</strong></span>');
		$("#price").fadeIn(300);
		
	}
	
		else
		{
			$("#misc").html("Actualmente no tienes productos agregados en tu market<br>");
		}		
}