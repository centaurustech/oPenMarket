jQuery(function() {

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

});
