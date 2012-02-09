function changeNovedad() {
    var currentNovedad = jQuery('.newsTicker ul li a.visible');
	
    currentNovedad.fadeOut( 'slow', function() {
        var nextNovedad = currentNovedad.next();
        //si hay una novedad que sigue la muestro, sino muestro la primera
        if(nextNovedad.length > 0) {
            nextNovedad.addClass('visible').show();
        } else {
            jQuery('.newsTicker ul li a:first').addClass('visible').show();
        }
													
        currentNovedad.removeClass('visible');
    });
}

function buscarAvisos(palabraClave, zona) {
	if( jQuery.trim(palabraClave) != '') {
		addSearchToLastSearchesCookie( palabraClave );
    	palabraClave = palabraClave.replace(/ /g,'-');
    	palabraClave = palabraClave.replace(/-+/g,'-');
		palabraClave = keywordSearch + palabraClave;
	}
	zona = zona.toLowerCase();
	zona = zona.replace(/ /gi,"-");
	zona = zona.replace("(","");
	zona = zona.replace(")","");
	
	if( jQuery.trim(zona) != '') {
		if ($('#verdaderoFalso').val()=="true") locationSearch = "-";
		zona = zona.replace(/ /g,'-');
		zona = zona.replace(/-+/g,'-');
		zona = locationSearch + zona;
	}
	if ($('#verdaderoFalso').val()=="true") 
		window.location = encodeURI( $('#pathToSearch').val().replace('.html', zona + palabraClave + '.html') );
	else
		window.location = encodeURI( $('#pathToSearch').val().replace('.html', palabraClave + zona + '.html') );
	
	return false;
}

jQuery(function() {
    //novedades
    jQuery('.newsTicker ul li a:first').addClass('visible').show(); //muestro la primera
    window.setInterval( 'changeNovedad()', 5000 ); //seteo el intervalo para que vaya cambiando
  
    //Esto es para evitar que cuando apriete back justo despues de entrar a un estatal se siga viendo el cartel del sitio al que entro.
    var patt1=/\/edomex/gi;
    var patt2=/\/nuevoleon/gi;
    
    var featuredBoxHomeCookie = Get_Cookie('cookie_estatal');
    if(featuredBoxHomeCookie != null && featuredBoxHomeCookie == 'edomex' && document.URL.match(patt1) != "" && document.URL.match(patt1) != null) {
    	$('#indexBannerEdomex').removeClass('oculto');
    	//$('#switchMexicoTodoMexico').removeClass('oculto');
    }else if(featuredBoxHomeCookie != null && featuredBoxHomeCookie == 'nuevo-leon' && document.URL.match(patt2) != "" && document.URL.match(patt2) != null) {
    	$('#indexBannerNuevoLeon').removeClass('oculto');
    	//$('#switchMexicoTodoMexico').removeClass('oculto');  	
    }
    
    //ultimas busquedas
    var ultimasBusquedasStr = Get_Cookie('BMN_ULT_BSQ');
    if(ultimasBusquedasStr) {
        var ultimasBusquedas = ultimasBusquedasStr.split('|||');
        for( var nIdxUltimaBusqueda = 0 ; nIdxUltimaBusqueda < ultimasBusquedas.length && nIdxUltimaBusqueda < 5 ; nIdxUltimaBusqueda++ )
        {
            var ultimaBusqueda = ultimasBusquedas[nIdxUltimaBusqueda].replace('+', ' ');
			
            var newNovedad = jQuery('#templateLinkNovedad').clone();
            newNovedad.attr('id', '')
            .removeClass('oculto')
            .attr('href', newNovedad.attr('href').replace( '@@@TXT_BUSQUEDA@@@', ultimaBusqueda ) )
            .text(ultimaBusqueda);
					  
            jQuery('.ultimas_busquedas span').append(newNovedad);
        }
		
        //muestro el cuadro de ultimas busquedas
        jQuery('.ultimas_busquedas').removeClass('oculto');
    }
	
    /*Se separan los inputs de las busqueda de la home. mschell*/
    $('#formSearchHome').submit(function(event){
		var searchObj = $('#formSearchHome').find('#keywords');
		var searchLocationObj = $('#formSearchHome').find('#location');
		
		var palabrasClave = '';
		var zona = '';

		if( jQuery.trim(searchObj.val()) != searchObj.attr('placeholder')){
			//event.preventDefault();
			palabrasClave = jQuery.trim(searchObj.val());
		}
		
		if( jQuery.trim(searchLocationObj.val()) != searchLocationObj.attr('placeholder')) {
			zona = jQuery.trim(searchLocationObj.val());
		}
		/*Se crea esta funcion para poder hacer el redirect hacia listado con los parametros.*/
		buscarAvisos( palabrasClave, zona );

		return false;
	});
		
    $('.medalla').click(function() {
        return false;
    });
	
    $('.newsTicker .newsLabel').click(function() {
        return false;
    });
    $('#location').keypress(function(e){
    	if(e.which == 13){    		
        	e.stopPropagation();
        	e.preventDefault();
    		$('#formSearchHome').submit();
    	}
    });
});
