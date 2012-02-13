<style type="text/css" title="currentStyle">
		@import "css/jquery-ui-1.8.4.custom.css";
		@import "css/p.css";
		@import "css/styles.css";
		@import "css/base_bum_vb29b91ca9289855c7eb513fc116117.css";
		@import "css/style.css";
		@import "css/jquery.toastmessage.css";		
                @import "css/li-scroller.css";
		
	<?php
	
	if(isset($_COOKIE['pass']) && isset($_COOKIE['mail']))
	{	
		echo '	@import "css/banner2.css";
		@import "css/boxup.css";';
	}
	
	?>		
				
		@import "css/empresas_bum_v5f0837a56cd35db0310b1636dbbe4ea8.css";				
</style>
												
	<script src="js/jquery-1.js"></script>					 			
	<script src="js/jqueryhahahah.js"></script>
	<script src="js/jquery_bum_v8ac3516d3dcf1d35d8ee98cbcb90229f.js"></script>	
	<script src="js/interface.js"></script>
	<script src="js/jquery1.js" type="text/javascript"></script>	
	<script src="js/bumex.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/fn.js"></script>
   <script src="js/jquery.toastmessage.js"></script>
   <script src="js/jquery.li-scroller.1.0.js"></script>
	
	<?php
	
	if(isset($_COOKIE['pass']) && isset($_COOKIE['mail']))
	echo '<script type="text/javascript" src="js/banner2.js"></script>		
		<script type="text/javascript" src="js/carrito.js"></script>';	
	
	
	?>	
					            			   					  							 		 					
<script type="text/javascript">

var every=0;

    function msg(nam, price, id, cant)
    { 
        	
    	$('#LIsale').removeClass('oculto');
    	
				$('#ultimo0').removeClass("oculto");
				$('#ultimo1').removeClass("oculto");
				$('#ultimo2').removeClass("oculto");
				    	
    	//$('#btnVOID').removeClass('oculto');
    	    	
    	
    	if(window.location.href.indexOf("fact.php?param=100")>0)
    	{
    		
    		tmp=cant*parseFloat(price);
    		tmp=parseFloat(tmp) + parseFloat(price) * parseFloat(12.5) / 100;
    		tmp=parseFloat(tmp) * parseFloat(15.1) / 100;
    		    		
    		every=parseFloat(every) + cant * parseFloat(price) - parseFloat(tmp);
    		every=every.toFixed(2);
    		$('#muestra').html("Cuentas con un total de " + every + " BsF");    		    		    		
    		$('#example').dataTable().fnAddData([nam,cant, "15.1%", "12.5%", price, price*cant]);
    		
    	return true;
    	}	     	
    	    	
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

	<?php
				
	if(isset($_COOKIE['pass']) && isset($_COOKIE['mail']))
	echo 'userinfo()';
	
	?>
		
	 }	

function consulta(typ)
{
	
	if(window.location.href[window.location.href.length-1]!="/" && window.location.href.indexOf("index.php")==-1 && window.location.href.indexOf("fact.php?param=100")==-1 && window.location.href.indexOf("formu.php?type=5")==-1)
	{
		$('#infobox').html('<img src="img/warning.png"> Necesitas estar en home para realizar busquedas <a href="index.php">Ir a home</a>');
		$('#infobox').removeClass("oculto successbox");
		$('#infobox').addClass("warningbox");
		$('#infobox').hide();
		$('#infobox').fadeIn(2000);
		$('#infobox').fadeOut(2000);
		$('#btnVerMasAvisos').addClass("oculto");
		
	return false;		
	}	

		switch(typ)
		{			
			case 2:						
			flag="mediNom=" + $('#location').attr('value') + "&marka="+ $('#keywords').attr('value');			
			
			if((flag=="mediNom=Calox, Muproban&marka=Genven, Bayer") || (flag=="mediNom=&marka="))
			{
				alert("el campo no puede estar vacio");
				return 0;
			}
			
			var i=0;			
			
			while(i<7)
			{
				$('#Gprd' + i).addClass("oculto");							
				i++;
			}
			
			$('#btnVerMasAvisos').addClass("oculto");
						
			break;
			
				default:
				flag="consult=" + typ;
				break;
		}
		
	$.ajax(
	{
				
		data: flag,
		type: "POST",
		dataType: "json",
		url: "chk.php",
		success: 
			
			function(data)
			{								
				
				$.each(data, function(indx, vlr)
				{

				if(window.location.href.indexOf("fact.php?param=100")>0 || window.location.href.indexOf("formu.php?type=5")>0)
				{
					$('#osx-modal-data').append("<input type='checkbox' name='" + data[indx].name + "' value='" + data[indx].name + "' onclick=\"javascript:msg('" + data[indx].name + "'," + data[indx].price  + "," + data[indx].id + ",1)\"> <b>" + data[indx].name + "</b><br>" + data[indx].details + "<br><br>");
				}					
					
					else
					{																													
						$('#Gprd' + indx).removeClass("oculto");					
										
						$('#Nprd' + indx).html(data[indx].name);
						$('#Dprd' + indx).html(data[indx].details);
						$('#Pprd' + indx).html("Precio " + data[indx].price + " BsF");
										
						if($.cookie('pass')!=null && $.cookie('mail')!=null)
						$('#Lprd' + indx).attr("href", "javascript:msg('" + data[indx].name + "'," + data[indx].price  + "," + data[indx].id + ",1)");
					
							else
							$('#Lprd' + indx).attr("href", "#");
																
						$('#Iprd' + indx).attr("value", data[indx].id);
					}					
										
				});				
			
			if(typ==2)
			{
				if(data!="")
				{
					$('#infobox').html('<img src="img/success.png">  Se han encontrado concidencias');
					$('#infobox').removeClass("oculto warningbox");
					$('#infobox').addClass("successbox");
					$('#infobox').hide();
					$('#infobox').fadeIn(2000);
					$('#infobox').fadeOut(2000);
					$('#btnVerMasAvisos').removeClass("oculto");					
				}
				
					else
					{
						$('#infobox').html('<img src="img/warning.png">  Este producto no se encuentra en nuestro stock, Puede solicitarnos <a href="mailto:demoopenmarket@gmail.com">via e-mail</a>');
						$('#infobox').removeClass("oculto successbox");
						$('#infobox').addClass("warningbox");
						$('#infobox').hide();
						$('#infobox').fadeIn(2000);
						$('#infobox').fadeOut(5000);
						$('#btnVerMasAvisos').addClass("oculto");							
					}						
			}															
			}			
	});
}
		
	$(document).ready(function()
	{		
         $("ul#ticker01").liScroll();
		
		if(window.location.href.indexOf("fact.php?param=100")>0)
		{
			$('#botonSearch').addClass("oculto");
			$('#btnOtro').removeClass("oculto");
		}
		
			else
			{
				$('#botonSearch').removeClass("oculto");
			}  						
                
	$('.fade').hover(function() {$(this).children('span').fadeOut('250');},function() {$(this).children('span').fadeIn('250');})
		
		
	<?php
	
	if(isset($_COOKIE['pass'])==false && isset($_COOKIE['mail'])==false)
	{	 					
		echo "$('#slideshow').cycle(
		{
			fx:'scrollRight',
			speed:500,
			timeout:5000
		});";
	}
	
	?>		
	

	//nieve(0);
	login(0);			
			
		$('#dock').Fisheye(
		{
			maxWidth: 50,
			items: 'a',
			itemsText: 'span',
			container: '.dock-container',
			itemWidth: 40,
			proximity: 90,
			halign : 'center'
		});
	});
	

	function marketvoid()
	{
	$.cookie('totalPrice', null);
	$.cookie('prodCant', null);
				
		for(i=0;i<100;i++)
		$.cookie('product' + i, null);
		
	$.cookie('marka', null);
	$.cookie('mediNom', null);
		
	location.reload();		
	}

	/*function nieve(flag)
	{		
		if($.cookie('nieve')=="true")
		{						
			if(flag)
			{
				$.cookie('nieve', "false");
			}
			
		$('#btnNieve').html("<span>Desactivar Nieve</span>");		
		}
		
			else
			{
				if(flag)
				{
					$.cookie('nieve', "true");
				}
				
			$('#btnNieve').html("<span>Activar Nieve</span>");							
			}
			
	if(flag)
	{
		location.reload();
	}
				
	}*/
	
	function login(flag)
	{		
		if($.cookie('pass')!=null && $.cookie('mail')!=null)
		{			
												
			$('#btnLogin').html('</div><span>Cerrar Sesión</span>');
			
			if(flag)
			{																						
				$.cookie('mail', null);
				$.cookie('pass', null);
				marketvoid();											
			}
			
			if($.cookie('prodCant')!=null && $.cookie('prodCant')>0)
			{
				//$('#btnVOID').removeClass("oculto");
				$('#LIsale').removeClass("oculto");				
				$('#ultimo0').removeClass("oculto");
				$('#ultimo1').removeClass("oculto");
				$('#ultimo2').removeClass("oculto");
			}					
		}
		
			else
			{				
				$('#btnLogin').html('<span>Iniciar Sesión</span>');							
			}
				
	}

    //Tooltip
    $('a[title]').qtip({
        style: {name: 'dark', tip: 'bottomLeft', border: {radius: 5}},
        show: {when: 'mouseover', ready: false, effect: {type:'fade',length:100}},
        hide: {when: 'mouseout', fixed: true, delay: 250},
        position: {corner: {target: 'topRight', tooltip: 'leftBottom'}}
    });

    // Banner de logos animados
    var logo = null;
    var logoTimer = null;
    var tiempoGrupo = 4000;
    var tiempoLogo = 150;
    var tiempoFadeLogo = 600;
    var grupoSiguiente = $('.logoSlideGroup:last');

    var grupoTimer = window.setTimeout(function(){animarGrupo(grupoSiguiente);}, tiempoGrupo);

    function animarGrupo(grupoActual){
        grupoSiguiente = $(grupoActual).prev();
        if($(grupoSiguiente).length == 0){
            grupoSiguiente = $('.logoSlideGroup:last');
        }
        $(grupoActual).addClass('topGroup');
        $(grupoSiguiente).removeClass('topGroup');
        $(grupoSiguiente).children().css('opacity',1);
        logo = $(grupoActual).children('img:first');
        logoTimer = window.setInterval(function(){animarLogo(logo);}, tiempoLogo);
    }

    function animarLogo(logoAnimar){
        logoAnimar.animate({opacity: 0}, tiempoFadeLogo);
        logo = $(logoAnimar).next();
        if($(logo).length == 0){
            window.clearInterval(logoTimer);
            window.clearTimeout(grupoTimer);
            grupoTimer = window.setTimeout(function(){animarGrupo(grupoSiguiente);}, tiempoGrupo);
        }
    }
    
    $(".tablaAvisos .botonChicoAzul").click(function(event){
    	if ($("#bumexMensajeModal").size()){
    		event.preventDefault();
    		$('#bumexMensajeModal').attr("class","publicar_aviso");
			$('#bumexMensajeModal').show();
		}else{
			return true;
		}
		
    });
    $(".botonGiganteAzul2lineas").click(function(event){
    	if ($("#bumexMensajeModal").size()){
    		event.preventDefault();
    		$('#bumexMensajeModal').attr("class","publicar_aviso");
			$('#bumexMensajeModal').show();
		}else{
			return true;
		}
		
    });

<?php

	if(isset($_COOKIE['nieve'])==true && $_COOKIE['nieve']=='true')
	{
		include 'snow.php';
  	}
		
?>	


            $(function() {
                var d=300;
                $('#navigation a').each(function(){
                    $(this).stop().animate({
                        'marginTop':'-80px'
                    },d+=150);
                });

                $('#navigation > li').hover(
                function () {
                    $('a',$(this)).stop().animate({
                        'marginTop':'-2px'
                    },200);
                },
                function () {
                    $('a',$(this)).stop().animate({
                        'marginTop':'-80px'
                    },200);
                }
            );
            });
	
</script>

<style type='text/css'>

.warningbox
{
	font-weight:bold;
	border: 2px solid;
	margin: 10px 0px
	padding:15px 10px 15px 70px;
	color: #FFE222;
	background-color:#FAF9C9;
}

.successbox
{
	color: #4F8A10;
	background-color:#EDFCED;
	font-weight:bold;
	border: 2px solid;
	margin: 10px 0px;
	padding:15px 10px 15px 70px;
}

	
#page-wrap
{ 
	float:left;
	width:47%;
	margin: 10px 10px 10px 10px;
}
	
.slide-up-boxes a
{ 
	display: block; 
	height: 130px; 
	margin: 0 0 20px 0; 
	background: rgba(215, 215, 215, 0.5); 
	border: 1px solid #ccc; 
	height: 65px; 
	overflow: hidden; 
}
		
.slide-up-boxes h5
{ 
	color: #333; 
	text-align: center;
	margin-top: -0px;
	height: 65px; 
	font: italic 18px/65px Georgia, Serif;    /* Vertically center text by making line height equal to height */
	opacity: 1;
	-webkit-transition: all 0.2s linear; 
	-moz-transition: all 0.2s linear; 
	-o-transition: all 0.2s linear;
}
		
.slide-up-boxes a:hover h5
{ 
	margin-top: -85px; 
	opacity: 0; 
}
		
.slide-up-boxes div
{ 
	position: relative; 
	color: white; 
	font: 12px/15px Georgia, Serif;
	height: 45px; 
	padding: 10px; 
	opacity: 0; 
	-webkit-transform: rotate(6deg); 
	-webkit-transition: all 0.4s linear; 
	-moz-transform: rotate(6deg); 
	-moz-transition: all 0.4s linear; 
	-o-transform: rotate(6deg); 
	-o-transition: all 0.4s linear; 
}
.slide-up-boxes a:hover div
{ 
	opacity: 1; 
	-webkit-transform: rotate(0); 
	-moz-transform: rotate(0); 
	-o-transform: rotate(0); 
}
.slide-up-boxes a:nth-child(1) div { background: #c73b1b url(img/wufoo.png) 17px 17px no-repeat; padding-left: 120px; }
.slide-up-boxes a:nth-child(2) div { background: #367db2 url(img/diw.png) 21px 10px no-repeat; padding-left: 90px; }
.slide-up-boxes a:nth-child(3) div { background: #393838 url(img/qod.png) 14px 16px no-repeat; padding-left: 133px; }

</style>
