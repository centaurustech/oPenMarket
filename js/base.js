var scriptCargados=[];
var intentosFacebook=0;
function buscarAvisos(palabraClave)
{
	addSearchToLastSearchesCookie(palabraClave);
	
	if(palabraClave!=null&&palabraClave!="")
	{
		palabraClave=jQuery.trim(palabraClave);
		palabraClave=palabraClave.replace(/ /g,'-');
		palabraClave=palabraClave.replace(/-+/g,'-');
		window.location=encodeURI($('#pathToSearch').val().replace('.html',keywordSearch+palabraClave+'.html'))}return false}function addSearchToLastSearchesCookie(keywordForUltBusquedas){if(keywordForUltBusquedas.length>0){var ultBusquedas=Get_Cookie('BMN_ULT_BSQ');if(ultBusquedas){ultBusquedas=ultBusquedas.split('|||')}else{ultBusquedas=[]}for(var i=0;i<ultBusquedas.length;i++){if(ultBusquedas[i]==keywordForUltBusquedas){ultBusquedas.splice(i,1)}}ultBusquedas.unshift(keywordForUltBusquedas);if(ultBusquedas.length>10){ultBusquedas.pop()}Set_Cookie("BMN_ULT_BSQ",ultBusquedas.join('|||'),30,"/")}}function Get_Cookie(check_name){var a_all_cookies=document.cookie.split(';');var a_temp_cookie='';var cookie_name='';var cookie_value='';var b_cookie_found=false;for(i=0;i<a_all_cookies.length;i++){a_temp_cookie=a_all_cookies[i].split('=');cookie_name=a_temp_cookie[0].replace(/^\s+|\s+$/g,'');if(cookie_name==check_name){b_cookie_found=true;if(a_temp_cookie.length>1){cookie_value=unescape(a_temp_cookie[1].replace(/^\s+|\s+$/g,''))}return cookie_value;break}a_temp_cookie=null;cookie_name=''}if(!b_cookie_found){return null}}function Set_Cookie(name,value,expires,path,domain,secure){var today=new Date();today.setTime(today.getTime());if(expires){expires=expires*1000*60*60*24}var expires_date=new Date(today.getTime()+(expires));document.cookie=name+"="+escape(value)+((expires)?";expires="+expires_date.toGMTString():"")+((path)?";path="+path:"")+((domain)?";domain="+domain:"")+((secure)?";secure":"")}function relative_time(time_value){var values=time_value.split(" ");time_value=values[1]+" "+values[2]+", "+values[5]+" "+values[3];var parsed_date=Date.parse(time_value);var relative_to=(arguments.length>1)?arguments[1]:new Date();var delta=parseInt((relative_to.getTime()-parsed_date)/1000);delta=delta+(relative_to.getTimezoneOffset()*60);if(delta<60){return'hace menos de un minuto'}else if(delta<120){return'hace alrededor de un minuto'}else if(delta<(60*60)){return'hace '+(parseInt(delta/60)).toString()+' minutos'}else if(delta<(120*60)){return'hace alrededor de una hora'}else if(delta<(24*60*60)){return'hace '+(parseInt(delta/3600)).toString()+' horas'}else if(delta<(48*60*60)){return'hace 1 d&iacute;a'}else{return'hace '+(parseInt(delta/86400)).toString()+' d&iacute;as'}}jQuery(function(){var timerOcultarMenu=null;$('.boton[rel=nofollow]').live('click',function(event){event.preventDefault()});$('a.botonDropdown, a input').live('click',function(event){if(!$(this).hasClass('botonDropdownRightClick')||$(event.target).is('input')){event.preventDefault()}}).live('mousedown',function(event){event.preventDefault();event.stopPropagation();var desplegar=false;if($(this).hasClass('botonDropdownRightClick')){if(event.which==3){$(this).bind("contextmenu",function(e){$(this).next('.dropDownBox').css('left',e.pageX+'px');return false});desplegar=true}}else{if(!$(event.target).is('input')&&event.which==1){desplegar=true}}if(desplegar){$('.dropDownBox').not($(this).next()).addClass("oculto");if(!$(this).next().hasClass('dropDownBoxTop')){$(this).next().css('top',$(this).outerHeight())}$(this).next().toggleClass('oculto')}});$('a.dropdownHover').live('mouseenter',function(event){window.clearTimeout(timerOcultarMenu);$('.dropDownBox').addClass("oculto");if(!$(this).next().hasClass('dropDownBoxTop')){$(this).next().css('top',$(this).outerHeight())}$(this).next().toggleClass('oculto')});$('a.dropdownHover').live('mouseleave',function(event){timerOcultarMenu=window.setTimeout(function(){$('.dropDownBox').addClass("oculto")},200)});$('.dropDownBox').live('click',function(event){event.stopPropagation()});$('.dropdownBoxBlur').live('mouseleave',function(event){var that=this;timerOcultarMenu=window.setTimeout(function(){$(that).addClass("oculto")},800)});$('.dropdownBoxBlur').live('mouseenter',function(event){window.clearTimeout(timerOcultarMenu)});
		
		
		$("#loginDropdown").click(function(event)		
		{			
			
			event.preventDefault();
			event.stopPropagation();
			
			if($("#bumexMensajeModal").size())
			{
				$('#bumexMensajeModal').attr("class","ingreso");
				$('#bumexMensajeModal').show()
			}
			
			else
			{
				$(this).toggleClass('btnAzulDropdownOpen');
				$("#loginBoxHome").toggleClass('oculto');
				$(".registerBox").addClass('oculto');
				$(".registerDropdown").removeClass('btnVerdeDropdownOpen');
				$('#username').focus().select()}});
				
				$("#loginDropdownEmpresas").click(function(event){event.preventDefault();event.stopPropagation();if($("#bumexMensajeModal").size()){$('#bumexMensajeModal').attr("class","ingreso");$('#bumexMensajeModal').show()}else{$(this).toggleClass('btnAzulDropdownOpen');$("#loginBoxHomeEmpresas").toggleClass('oculto');$(".registerBox").addClass('oculto');$('#registroEmpresas').find(".registerDropdown").removeClass('btnVerdeDropdownOpen');$('.username').focus().select()}});$(".registerDropdown").click(function(event){event.preventDefault();event.stopPropagation();if($("#bumexMensajeModal").size()){$('#bumexMensajeModal').attr("class","registro");$('#bumexMensajeModal').show()}else{$(this).toggleClass('btnVerdeDropdownOpen');$(".registerBox").toggleClass('oculto');$("#loginBoxHome").addClass('oculto');$("#loginDropdown").removeClass('btnAzulDropdownOpen');$('#email').focus().select()}});$("#loginBoxHome, #loginBoxHomeEmpresas, .registerBox").click(function(event){event.stopPropagation()});$('html').click(function(event){if(!($(event.target).hasClass('botonDropdown'))&&!($(event.target).parents('a').hasClass('botonDropdown'))){$(".dropDownBox").addClass('oculto');$("#loginDropdown").removeClass('btnAzulDropdownOpen');$("#loginDropdownEmpresas").removeClass('btnAzulDropdownOpen');$(".registerDropdown").removeClass('btnVerdeDropdownOpen')}});$('input,textarea').livequery(function(){$(this).placeholder()});$('#formSearchHeader').submit(function(event){event.preventDefault();if($.trim($('#searchHome').val())==""){$('#searchHome').focus()}else{buscarAvisos($('#searchHome').val())}});$('#loginForm').submit(function(event){event.preventDefault();event.stopPropagation();loginPostulante(this,true)});$('#form_login').submit(function(event){event.preventDefault();event.stopPropagation();if(!$(this).valid()){return false}$(this).find('#loginButton').attr('disabled','disabled');$(this).find('#loginButton span span').html('Iniciando...');if($(this).hasClass("ajaxRunning")){return false}else{$(this).addClass("ajaxRunning")}var form=this;$(form).find("#errorLoginAjaxEmpresa").addClass("oculto");$(form).find("#infoLoginAjaxEmpresa").addClass("oculto");
		
		$.ajax(
		{
			type:"POST",
			url:"/empresas/login_login.ajax",
			data:$(this).serialize(),
			success:
			function(data)
			{				
				
				$(form).removeClass("ajaxRunning");
				var result=false;
				
				var msgError="Sucedió algun inconveniente";
				if(typeof data.status!="undefined")
				{
					var status=data.status.status;
					switch(status)
					{
						case 3:
						bumexAlert(data.errorMessage,"warningBox");
						setTimeout("window.location = \"/logout.bum\"",1000);
						return;
						break;
						
						case 200:
						if(data.contenido)
						{
							if(Boolean(data.contenido.resultadoLogin))
							{
								if(typeof accionLoginAlternativa=="function")
								{
									accionLoginAlternativa()
								}
								
								else
								{
									window.location=data.contenido.URLdestino
								}
								return
								}else{result=true;$(form).find("#errorLoginAjaxEmpresa").removeClass("oculto");$(form).find("#errorLoginAjaxEmpresa").removeClass("okBox");$(form).find("#errorLoginAjaxEmpresa").removeClass("infoBox");$(form).find("#errorLoginAjaxEmpresa").addClass("warningBox");$(form).find("#errorLoginAjaxEmpresa p").html(data.contenido.mensajeErrorLogin);$(form).find("#infoLoginAjaxEmpresa").removeClass("oculto")}}break}}if(!result){if(msgError!=""){bumexAlert(msgError,"warningBox")}}$(form).find('#loginButton').removeAttr('disabled');$(form).find('#loginButton span span').html('Iniciar Sesi&oacute;n')}})});if(!Get_Cookie("OCULTAR_BUMERAN_MENSAJE_IE6")&&$.browser.msie&&parseFloat($.browser.version)<7){$('.ie6NoSupport').css('display','block')}$('#cerrarIE6NoSupport').click(function(e){e.preventDefault();$('.ie6NoSupport').css('display','none');Set_Cookie("OCULTAR_BUMERAN_MENSAJE_IE6",'1',1)});$('.collapsableGroup').live('click',function(event){event.preventDefault();$(this).toggleClass('collapsableGroupAbierto');$(this).next('ul').slideToggle('fast')});$('.separador a').live('click',function(event){event.preventDefault();$(this).toggleClass('cerrado');$(this).parent().next().slideToggle()});$('.bolitaRoja').live('mouseover',function(){$('.dropDownMessage').slideDown(200);$('.bolitaRoja').live('mouseleave',function(){timerOcultarMenu=window.setTimeout(function(){$('.dropDownMessage').hide()},700)})});$("#form_registro_empresa #nombreUsuario").blur(function(event){if($(this).val()!=null&&$(this).val()!=""){var form=$(this).parents("form");$(form).find("#validacionUsername").removeClass("oculto");$(form).find("#validacionUsername p").html("");$(form).find("#validacionUsername").removeClass("okBox");$(form).find("#validacionUsername").removeClass("warningBox");var datosDelFormulario=String($(form).serialize());$.ajax({type:"POST",url:"/empresas/formregistro_verificarUsername.ajax",data:datosDelFormulario,success:function(data){if(typeof data.status!="undefined"){var status=data.status.status;switch(status){case 200:if(data.contenido){$(form).find("#validacionUsername p").html("Nombre de usuario disponible");$(form).find("#validacionUsername").removeClass("warningBox");$(form).find("#validacionUsername").addClass("okBox");$(form).find("#usernameOK").val(1)}else{$(form).find("#validacionUsername p").html("El nombre de usuario ya está utilizado");$(form).find("#validacionUsername").addClass("warningBox");$(form).find("#usernameOK").val(0)}break;case 500:break;case 1:default:break}}}})}});$("#form_registro_postulante #email").blur(function(event){var emailInput=this;var form=$(emailInput).parents("form");if($(this).val()!=""){$(form).find("#validacionemail").removeClass("oculto");$(form).find("#validacionemail p").html("");$(form).find("#validacionemail").removeClass("okBox");$(form).find("#validacionemail").removeClass("warningBox");var datosDelFormulario=String($(form).serialize());
								
								$.ajax(
								{
									type:"POST",
									url:"chk.php",
									data:datosDelFormulario,
									
									success:									
									function(data)
									{
										
										if(typeof data.status!="undefined")
										{
											var status=data.status.status;
											
											switch(status)
											{
												case 200:
												if(!data.contenido.emailValido)
												{
													$(form).find("#validacionemail p").html("Email inv&aacute;lido");$(form).find("#validacionemail").addClass("warningBox");$(form).find("#emailOK").val(0)}else{if(data.contenido.emailDisponible){$(form).find("#validacionemail p").html("Email disponible");$(form).find("#validacionemail").addClass("okBox");$(form).find("#emailOK").val(1)}else{$(form).find("#validacionemail p").html("El email ya está utilizado");$(form).find("#validacionemail").addClass("warningBox");$(form).find("#emailOK").val(0)}}break;case 500:break;case 1:default:break}}}})}else{$(form).find("#validacionemail").addClass("oculto")}});$(".recuperarContrasena").click(function(event){event.preventDefault();event.stopPropagation();if($(this).hasClass("ajaxRunning")){return false}else{$(this).addClass("ajaxRunning")}var thisButton=this;var form=$(thisButton).parents("form");var username=$(form).find("input[name=username]");$(form).find("#recuperacionContrasena").removeClass("oculto");$(form).find("#recuperacionContrasena").removeClass("okBox");$(form).find("#recuperacionContrasena").removeClass("warningBox");$(form).find("#recuperacionContrasena").addClass("infoBox");$(form).find("#recuperacionContrasena p").html("Enviando datos...");$(form).find("#errorLoginAjaxPostulante").addClass("oculto");var emailReg=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;if($(username).size()==0||!$.trim($(username).val()).length||!emailReg.test($(username).val())){$(form).find("#recuperacionContrasena").removeClass("infoBox");$(form).find("#recuperacionContrasena").addClass("warningBox");$(form).find("#recuperacionContrasena p").html("Ingrese un email");$(thisButton).removeClass("ajaxRunning");return false}

								$.ajax(
								{
									type:"POST",
									url:"/postulantes/login_recuperarContrasena.ajax",
									
									data:
									{
										username:
										$(username).val()
									},
										success:
										function(data)
										{
											$(thisButton).removeClass("ajaxRunning");
											
											if(typeof data.status!="undefined")
											{
												var status=data.status.status;
												
												$(form).find("#recuperacionContrasena").removeClass("infoBox");
												
												switch(status)
												{
												case 200:
												if(!data.contenido.usuarioValido)
												{
													$(form).find("#recuperacionContrasena p").html("El email no corresponde a un usuario. Si usted pertenece a una empresa registrada haga click <a href='/empresas/recuperarcontrasena.bum?username="+$(username).val()+"'>aquí</a>.");
														
													$(form).find("#recuperacionContrasena").addClass("warningBox")}else{if(data.contenido.contrasenaEnviada){$(form).find("#recuperacionContrasena p").html("Email para recuperar contrase&ntilde;a enviado");$(form).find("#recuperacionContrasena").addClass("okBox")}else{$(form).find("#recuperacionContrasena p").html("La contraseña no pudo ser enviada intentelo nuevamente");$(form).find("#recuperacionContrasena").addClass("warningBox")}}break;case 500:break;case 1:default:break}}return false}});return false});$(".recuperarContrasenaUsuarioEmpresa").click(function(event){event.preventDefault();var form=$(this).closest("#form_login");var username=$(form).find("#username").val();var location="/empresas/recuperarcontrasena.bum";if(username!=null&&username!=""){location+="?username="+username}window.location.replace(location)});$('#bumexAlert .cerrarBox').live('click',function(event){event.preventDefault();ocultarBumexAlert()});$('#bumexAlert a').live('click',function(event){ocultarBumexAlert()});$('.cvCheckboxAll').live('mousedown',function(){if($('.cvCheckboxAll').attr('checked')){$(this).removeAttr('checked');$('.cvCheckbox').removeAttr('checked');$('tr').removeClass('rowSelected')}else{$('.cvCheckbox').attr('checked','checked');$(this).attr('checked','checked');$('tr').addClass('rowSelected')}});$('.cvCheckAll').live('click',function(event){event.preventDefault();$('.cvCheckbox').attr('checked','checked');$('.cvCheckboxAll').attr('checked','checked');$('tr').addClass('rowSelected')});$('.cvUncheckAll').live('click',function(event){event.preventDefault();$('.cvCheckbox').removeAttr('checked');$('.cvCheckboxAll').removeAttr('checked');$('tr').removeClass('rowSelected')});$('.cvCheckInverse').live('click',function(event){event.preventDefault();$(".cvCheckbox").each(function(){$(this).attr('checked',!$(this).attr('checked'));if($(this).attr('checked')){$(this).parents('tr').addClass('rowSelected')}else{$(this).parents('tr').removeClass('rowSelected')}})});$('.cvCheckbox').live('change',function(){if($(this).attr('checked')){$(this).parents('tr').addClass('rowSelected')}else{$(this).parents('tr').removeClass('rowSelected')}});$('.msjCheckboxAll').live('mouseup',function(){if($(this).attr('checked')){$(this).removeAttr('checked');$('.msjCheckbox').removeAttr('checked');$('tr').removeClass('rowSelected')}else{$('.msjCheckbox').attr('checked','checked');$(this).attr('checked','checked');$('tr').addClass('rowSelected')}});$('.msjCheckAll').live('click',function(event){event.preventDefault();$('.msjCheckbox').attr('checked','checked');$('.msjCheckboxAll').attr('checked','checked');$('tr').addClass('rowSelected')});$('.msjUncheckAll').live('click',function(event){event.preventDefault();$('.msjCheckbox').removeAttr('checked');$('.msjCheckboxAll').removeAttr('checked');$('tr').removeClass('rowSelected')});$('.msjCheckInverse').live('click',function(event){event.preventDefault();$(".msjCheckbox").each(function(){$(this).attr('checked',!$(this).attr('checked'));if($(this).attr('checked')){$(this).parents('tr').addClass('rowSelected')}else{$(this).parents('tr').removeClass('rowSelected')}})});$('.msjCheckbox').live('change',function(){if($(this).attr('checked')){$(this).parents('tr').addClass('rowSelected')}else{$(this).parents('tr').removeClass('rowSelected')}});$('#monigoteAlertCerrar').click(function(event){event.preventDefault();var monigote=$('#monigoteAlert');if(monigote.data("parametros").cookie){Set_Cookie(monigote.data("parametros").id,'1',30)}$('#monigoteAlert').fadeOut()});$('#corbataMagica').live('click',function(event){event.preventDefault();$("#detalleError").dialog({width:950,height:600,modal:true,draggable:true,title:'Detalle del error',buttons:[{text:"Cerrar",click:function(){$(this).dialog("close")}}],resizable:true,zIndex:99999})});if(!Get_Cookie("MENSAJE_MANTENIMIENTO")){$('#mensajeMantenimientoHeader').removeClass('oculto')}$('#mensajeMantenimientoHeader a.cerrar').click(function(event){event.preventDefault();$('#mensajeMantenimientoHeader').addClass('oculto');Set_Cookie("MENSAJE_MANTENIMIENTO",'1',1)});$(window).resize(function(){var dialog=$(":ui-dialog").dialog('widget');if(dialog.hasClass('bumex_modal')){$(":ui-dialog").dialog("option","position","center")}});$(document).ready(function(){$('.anuncioCerrado').hide().delay(5000).fadeIn('fast');$('.anuncioAbierto').slideDown('fast').delay(4800).slideUp('fast');$('.botonAbrir').click(function(event){event.preventDefault();event.stopPropagation();$(this).parents('.anuncioCerrado').hide();$('.anuncioAbierto').slideDown('fast')});$('.botonCerrar').click(function(event){event.preventDefault();event.stopPropagation();$(this).parents('.anuncioAbierto').slideUp('fast');$('.anuncioCerrado').fadeIn('fast')})})});function abrirLogin(){quitarOverlayHardcode();cerrarModalAbierto();$("#bumex_login").addClass("ultimoModalAbierto");$("#bumex_register").removeClass("ultimoModalAbierto");$("#bumex_login").dialog({modal:true,draggable:false,resizable:false,dialogClass:'bumex_modal',width:680,closeOnEscape:false,zIndex:100001})}function loading(){quitarOverlayHardcode();cerrarModalAbierto();$("#loadingModal").dialog({modal:true,draggable:false,resizable:false,dialogClass:'bumex_modal sin_boton_cerrar',width:400,minHeight:0,closeOnEscape:false,zIndex:100001})}function cerrarLoading(){$("#loadingModal").dialog('close')}function abrirRegister(){quitarOverlayHardcode();cerrarModalAbierto();$("#bumex_register").addClass("ultimoModalAbierto");$("#bumex_login").removeClass("ultimoModalAbierto");$("#bumex_register").dialog({modal:true,draggable:false,resizable:false,dialogClass:'bumex_modal',width:680,closeOnEscape:false,zIndex:100001})}function cerrarModalAbierto(){$(":ui-dialog").dialog("close")}function cerrarUltimoModal(){$(".ultimoModalAbierto").dialog("close")}function abrirUltimoModal(){quitarOverlayHardcode();$(".ultimoModalAbierto").dialog({modal:true,draggable:false,resizable:false,dialogClass:'bumex_modal',width:680,closeOnEscape:false,zIndex:100001})}function bumexAlert(mensaje,tipo,delay){delay=typeof(delay)!='undefined'?delay:3000;tipo=typeof(tipo)!='undefined'?tipo:"infoBox";mensaje=typeof(mensaje)!='undefined'?mensaje:"";if($('#bumexAlert').hasClass('bumexAlertAbierto')){ocultarBumexAlert(function(){mostrarBumexAlert(mensaje,tipo,delay)})}else{mostrarBumexAlert(mensaje,tipo,delay)}}var timerOcultarBumexAlert=null;function mostrarBumexAlert(mensaje,tipo,delay){$('#bumexAlert p').html(mensaje);$('#bumexAlert').attr('class','bumexAlertAbierto '+tipo).css('margin-left',0-($('#bumexAlert').outerWidth()/2)).animate({opacity:1,top:0},300);if(delay>0){timerOcultarBumexAlert=window.setTimeout(function(){ocultarBumexAlert()},delay)}}function ocultarBumexAlert(callback){callback=typeof(callback)!='undefined'?callback:function(){};window.clearTimeout(timerOcultarBumexAlert);$('#bumexAlert').removeClass('bumexAlertAbierto').animate({opacity:0,top:-50},300,callback)}function monigoteAlert(titulo,mensaje,id,cookie){titulo=typeof(titulo)!='undefined'?titulo:'Titulo';mensaje=typeof(mensaje)!='undefined'?mensaje:'Mensaje';id=typeof(id)!='undefined'?id:'MONIGOTE_ALERT';cookie=typeof(cookie)!='undefined'?cookie:false;parent=typeof(parent)!='undefined'?parent:'body';$('#monigoteAlert').data("parametros",{id:id,cookie:cookie});if((cookie&&!Get_Cookie(id))||!cookie){$('#monigoteAlertBody h3').html(titulo);$('#monigoteAlertBody p').html(mensaje);$('#monigoteAlert').show()}}$.metadata.setType("attr","validate");$.validator.setDefaults({errorClass:"formInputError",errorElement:"p",highlight:function(element,errorClass){$(element).addClass('formInputError')},unhighlight:function(element,errorClass){$(element).removeClass('formInputError')},onkeyup:true});jQuery(function(){$('.formderegistro').each(function(el){$(this).validate()});$("#loginForm").validate({invalidHandler:function(form,validator){var currentForm=validator.currentForm;$(currentForm).find("#recuperacionContrasena").addClass("oculto");$(currentForm).find("#errorLoginAjaxPostulante").addClass("oculto")}});$("#form_login").validate({invalidHandler:function(form,validator){var currentForm=validator.currentForm;$(currentForm).find("#errorLoginAjaxEmpresa").addClass("oculto");$(currentForm).find("#infoLoginAjaxEmpresa").addClass("oculto")}})});if(typeof console=="undefined"){this.console={log:function(){},debug:function(){}}}function split(val){return val.split(/,\s*/)}function extractLast(term){return split(term).pop()}function levenshtein(s1,s2){if(s1==s2){return 0}var s1_len=s1.length;var s2_len=s2.length;if(s1_len===0){return s2_len}if(s2_len===0){return s1_len}var split=false;try{split=!('0')[0]}catch(e){split=true}if(split){s1=s1.split('');s2=s2.split('')}var v0=new Array(s1_len+1);var v1=new Array(s1_len+1);var s1_idx=0,s2_idx=0,cost=0;for(s1_idx=0;s1_idx<s1_len+1;s1_idx++){v0[s1_idx]=s1_idx}var char_s1='',char_s2='';for(s2_idx=1;s2_idx<=s2_len;s2_idx++){v1[0]=s2_idx;char_s2=s2[s2_idx-1];for(s1_idx=0;s1_idx<s1_len;s1_idx++){char_s1=s1[s1_idx];cost=(char_s1==char_s2)?0:1;var m_min=v0[s1_idx+1]+1;var b=v1[s1_idx]+1;var c=v0[s1_idx]+cost;if(b<m_min){m_min=b}if(c<m_min){m_min=c}v1[s1_idx+1]=m_min}var v_tmp=v0;v0=v1;v1=v_tmp}return v0[s1_len]}$.ajaxSetup({cache:false});(function($){var m=$.scrollTo=function(b,h,f){$(window).scrollTo(b,h,f)};m.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1};m.window=function(b){return $(window).scrollable()};$.fn.scrollable=function(){return this.map(function(){var b=this,h=!b.nodeName||$.inArray(b.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!h)return b;var f=(b.contentWindow||b).document||b.ownerDocument||b;return $.browser.safari||f.compatMode=='BackCompat'?f.body:f.documentElement})};$.fn.scrollTo=function(l,j,a){if(typeof j=='object'){a=j;j=0}if(typeof a=='function')a={onAfter:a};if(l=='max')l=9e9;a=$.extend({},m.defaults,a);j=j||a.speed||a.duration;a.queue=a.queue&&a.axis.length>1;if(a.queue)j/=2;a.offset=n(a.offset);a.over=n(a.over);return this.scrollable().each(function(){var k=this,o=$(k),d=l,p,g={},q=o.is('html,body');switch(typeof d){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px)?$/.test(d)){d=n(d);break}d=$(d,this);case'object':if(d.is||d.style)p=(d=$(d)).offset()}$.each(a.axis.split(''),function(b,h){var f=h=='x'?'Left':'Top',i=f.toLowerCase(),c='scroll'+f,r=k[c],s=h=='x'?'Width':'Height';if(p){g[c]=p[i]+(q?0:r-o.offset()[i]);if(a.margin){g[c]-=parseInt(d.css('margin'+f))||0;g[c]-=parseInt(d.css('border'+f+'Width'))||0}g[c]+=a.offset[i]||0;if(a.over[i])g[c]+=d[s.toLowerCase()]()*a.over[i]}else g[c]=d[i];if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],u(s));if(!b&&a.queue){if(r!=g[c])t(a.onAfterFirst);delete g[c]}});t(a.onAfter);function t(b){o.animate(g,j,a.easing,b&&function(){b.call(this,l,a)})}function u(b){var h='scroll'+b;if(!q)return k[h];var f='client'+b,i=k.ownerDocument.documentElement,c=k.ownerDocument.body;return Math.max(i[h],c[h])-Math.min(i[f],c[f])}}).end()};function n(b){return typeof b=='object'?b:{top:b,left:b}}})(jQuery);function cargarScript(url,forzarCargado){if($.inArray(url,scriptCargados)!=-1){return false}$.ajaxSetup({cache:true});$.getScript(url);$.ajaxSetup({cache:false});if(typeof forzarCargado=="undefined"){scriptCargados.push(url)}}function pageTracking(url){_gaq.push(['_trackPageview',url])}function serializeEncodeValue(form){var formValues=$(form).serializeArray();if(typeof formValues!="undefined"){for(var i in formValues){formValues[i]['value']=(typeof $.browser!="undefined"&&$.browser.mozilla)?encodeURIComponent(formValues[i]['value']):formValues[i]['value']}}return $.param(formValues)}jQuery(function(){$('#loginFacebookButton').click(function(event){event.preventDefault();event.stopPropagation();$("#bumex_login").find('#loginButton').attr("disabled","true");$("#bumex_login").find('#loginButton span span').html('Iniciando...');loginFacebookApp('log')});$('#registerFacebookButton').click(function(event){event.preventDefault();event.stopPropagation();$("#bumex_register").find('#registerButton').attr('disabled','disabled');$("#bumex_register").find('#registerButton span span').html('Cargando...');loginFacebookApp('reg')});$('#vincularFacebookButton').click(function(event){event.preventDefault();event.stopPropagation();loginFacebookApp('vin')});$(".fbkRepetidosForm").submit(function(event){event.preventDefault();event.stopPropagation()});$('#form_registro_postulante').submit(function(event){event.preventDefault();event.stopPropagation();registroPostulante(this,true)});$(".registerModal").click(function(event){event.preventDefault();event.stopPropagation();cerrarModalAbierto();abrirRegister()});$(".loginModal").click(function(event){event.preventDefault();event.stopPropagation();cerrarModalAbierto();abrirLogin()});$("#vinculacionRepetidos").click(function(event){event.preventDefault();event.stopPropagation();var form=$(this).parents(".fbkRepetidosForm");if($(form).serialize().indexOf('idPostulante')!=-1){if($(form).serialize().indexOf('elmininarNoSelccionados=on')!=-1){bajaPostulantesRepetidos($(form).serialize())}loginFacebookApp('vin3',form)}else{$(form).find("#errorLoginAjaxPostulante").removeClass("oculto");$(form).find("#errorLoginAjaxPostulante p").html("Seleccione una cuenta para vincular.")}});$("#rowCol1").click(function(event){$(this).parents("td").find("#rowCol8").attr("checked","checked");$(this).parents(".postulanteRepetidoRow").removeClass("eliminar");$(this).parents(".postulanteRepetidoRow").siblings(".postulanteRepetidoRow").addClass("eliminar")});$("#elmininarNoSelccionados").click(function(event){var table=$(this).parents(".fbkRepetidosForm").find("#repetidosTable");if($(table).hasClass("eliminar"))$(table).removeClass("eliminar");else $(table).addClass("eliminar")});$("#recuperarPass").click(function(event){cerrarModalAbierto();$("#recuperarPassword").dialog({modal:true,draggable:false,resizable:false,dialogClass:'bumex_modal',width:360,closeOnEscape:false,zIndex:100001})});$(".cerrarDialog").click(function(event){event.preventDefault();event.stopPropagation();$(this).parents(".ui-dialog-content").dialog("close");abrirUltimoModal()});$("#radioNuevaCuenta").change(function(event){$(".inputMailPass").addClass("oculto")});$("#radioLogVin").change(function(event){$(".inputMailPass").removeClass("oculto");$(this).parents(".ui-dialog-content").dialog("option","position",'center')});$('#formFBRegistracionVinculacion').submit(function(event){event.preventDefault();event.stopPropagation();if($(this).find("#radioLogVin").attr("checked")){loginPostulante(this,true)}else{abrirRegister();loginFacebookApp('reg',this)}});$("#botonMonigoteVinculaFbk").click(function(event){$(this).parents("#monigoteAlert").fadeOut();loginFacebookApp('vin4',this)});$("#dialogContent_perfil_social #perfilSocial").submit(function(event){event.preventDefault();event.stopPropagation();invocacionAjaxMisPreferencias(this,"perfilSocial",$(this).serialize())})});function loginFacebookApp(type,form,addParams){loading();FB.getLoginStatus(function(response){if(response.status=='connected'){response.authResponse.userID;llenarDatosFacebookParaFormulario(response.authResponse.userID,type,form,addParams)}else{FB.login(function(response){if(response.status==='connected'){llenarDatosFacebookParaFormulario(response.authResponse.userID,type,form,addParams)}else{cerrarLoading();abrirUltimoModal();reiniciarBotones()}},{scope:'email,user_birthday,user_hometown,user_location'})}})}function llenarDatosFacebookParaFormulario(userID,type,form,addParams){var query="";var validateForm=false;if(type.substring(0,3)=='reg'){query='SELECT uid, first_name, email, last_name, middle_name,birthday_date, sex, third_party_id, hometown_location, current_location, username, name  FROM user WHERE uid='+userID}else if(type.substring(0,3)=='log'){query='SELECT uid,third_party_id, email FROM user WHERE uid='+userID}else if(type.substring(0,3)=='vin'){query='SELECT uid,email, third_party_id, username, name  FROM user WHERE uid='+userID}FB.api({method:'fql.query',query:query},function(response){if(response.error_code==undefined){var fbparams="";for(var key in response[0]){fbparams+=fbResultsToParams(key,response[0][key])}if(type=='reg'){registroPostulante($('.ui-dialog-content #form_registro_postulante'),validateForm,fbparams)}else if(type=='reg1'){var params=String($('#form_registro_postulante').serialize());params+=fbparams;window.location="/postulantes/registro.bum"+"?"+params}else if(type=='log'||type=='vin'){if(addParams!=null&&addParams!=undefined)fbparams+='&'+addParams;loginPostulante($('.ui-dialog-content #loginForm'),validateForm,fbparams)}else if(type=='log1'||type=='vin1'){var params=String($('form[id=form_login]:visible').serialize());params+=fbparams;if(addParams!=null&&addParams!=undefined)params+=addParams;var url=$('form[id=form_login]:visible').attr("action");window.location=url+"?"+params}else if(type=='vin2'){submitSeccionForm('#vinculacionFbk',false,fbparams)}else if(type=='vin3'){loginPostulante(form,false,fbparams)}else if(type=='vin4'){invocacionAjaxMisPreferencias(form,"vinculacionFbk",fbparams)}}else if(response.error_code=='190'&&intentosFacebook<5){intentosFacebook++;fbInit();loginFacebookApp(type,form,addParams)}else{cerrarLoading();abrirUltimoModal();bumexAlert("Error al obtener datos de Facebook. Vuelva a intentarlo en unos minutos.")}})}function reiniciarBotones(){$("#form_registro_login").find('#registerButton').removeAttr('disabled');$("#form_registro_login").find('#registerButton span span').html('Registrarme');$("#form_registro_postulante").find('#registerButton').removeAttr('disabled');$("#form_registro_postulante").find('#registerButton span span').html('Registrarme');$("#bumex_register").find('#registerButton').removeAttr('disabled');$("#bumex_register").find('#registerButton span span').html('Registrarme');$("#loginForm").find('#loginButton').removeAttr('disabled');$("#loginForm").find('#loginButton span span').html('Iniciar Sesi&oacute;n');$("form[id=form_login]:visible").find('#loginButton').removeAttr('disabled');$("form[id=form_login]:visible").find('#loginButton span span').html('Iniciar Sesi&oacute;n');$("#bumex_login").find('#loginButton').removeAttr('disabled');$("#bumex_login").find('#loginButton span span').html('Iniciar Sesi&oacute;n');$("#formFBRegistracionVinculacion").find('#loginButton').removeAttr('disabled');$("#formFBRegistracionVinculacion").find('#loginButton span span').html('Aceptar')}function fbResultsToParams(key,value){if(value instanceof Array){return""}else if(value instanceof Object){var acParam="[";for(var subkey in value){acParam+=fbResultsToParams(subkey,value[subkey])}acParam=acParam.replace(/&/g,'|');acParam+="]";return"&fb"+key+"="+acParam}else{return"&fb"+key+"="+value}}function loginPostulante(form,validateForm,fbparams){if(validateForm&&!$(form).valid()){return false}$(form).find('#loginButton').attr('disabled','disabled');$(form).find('#loginButton span span').html('Iniciando...');if($(form).hasClass("ajaxRunning")){return false}else{$(form).addClass("ajaxRunning")}var params=$(form).serialize();if(fbparams!=undefined){params=params+fbparams}$(form).find("#recuperacionContrasena").addClass("oculto");$(form).find("#errorLoginAjaxPostulante").addClass("oculto");var hagoVinculacion=false;var abreOtroDialog=false;
														
													$.ajax(
													{
														type:"POST",
														url:"chk.php",
														data:params,
														
														success:
										function(data)
										{
											$(form).removeClass("ajaxRunning");
											var result=false;
											var msgError="Sucedio algun inconveniente";
											
											if(typeof data.status!="undefined")
											{
												var status=data.status.status;
												switch(status)
												{
													case 3:
													bumexAlert(data.errorMessage,"warningBox");
													setTimeout("window.location = \"/logout.bum\"",1000);
													return;
													break;
													
													case 200:
													if(data.contenido)
													{
														if(Boolean(data.contenido.resultadoLogin))
														{
													window.location=data.contenido.URLdestino;
													return}else{result=true;if(data.contenido.mensajeErrorLogin.indexOf("VINCULACION_FBK")!=-1){hagoVinculacion=true;data.contenido.mensajeErrorLogin=null;loginFacebookApp('vin',null,"idPostulante="+data.contenido.idPostulanteVincular+"&token="+data.contenido.tokenVinculacion)}else if(data.contenido.mensajeErrorLogin.indexOf("ADD_VIN_FBK")!=-1){hagoVinculacion=true;data.contenido.mensajeErrorLogin=null;loginFacebookApp('vin',null,"idPostulante="+data.contenido.idPostulanteVincular+"&token="+data.contenido.tokenVinculacion)}else if(data.contenido.mensajeErrorLogin.indexOf("REPETIDOS_FBK")!=-1){abreOtroDialog=true;data.contenido.mensajeErrorLogin=null;mostrarDialogRepetidosFromAjaxResponse(data.contenido.postulantesRepetidos,data.contenido.emailRepetido)}else if(data.contenido.mensajeErrorLogin.indexOf("REGISTRACION_FBK")!=-1){abreOtroDialog=true;data.contenido.mensajeErrorLogin=null;abrirDialogVinculacionRegistracion(data.contenido.emailRepetido)}else if(data.contenido.mensajeErrorLogin.indexOf("LOGIN_FBK")!=-1){hagoVinculacion=true;data.contenido.mensajeErrorLogin=null;loginFacebookApp('log')}else if(data.contenido.mensajeErrorLogin.indexOf("ERROR_PRE_VIN")!=-1){hagoVinculacion=true;data.contenido.mensajeErrorLogin=data.contenido.mensajeErrorLogin.split("|")[1];$(form).find("#errorLoginAjaxPostulante").removeClass("oculto");$(form).find("#errorLoginAjaxPostulante p").html(data.contenido.mensajeErrorLogin);reiniciarBotones()}else{$(form).find("#errorLoginAjaxPostulante").removeClass("oculto");$(form).find("#errorLoginAjaxPostulante p").html(data.contenido.mensajeErrorLogin)}}}break}}if(!result){if(msgError!=""){bumexAlert(msgError,"warningBox")}}if(!hagoVinculacion){reiniciarBotones();
		cerrarLoading();
		if(!abreOtroDialog)abrirUltimoModal()}}})}
		function registroPostulante(form,validateForm,params)
		{if(validateForm&&!$(form).valid()){return false}
		$(form).find('#registerButton').attr('disabled','disabled');
		$(form).find('#registerButton span span').html('Conectando...');
		if($(form).hasClass("ajaxRunning"))
		{return false}
		else{
			$(form).addClass("ajaxRunning")
		}
		if(params!=undefined)

{params=$(form).serialize()+params}else{params=$(form).serialize()}

$(form).find("#mensajeErrorRegistro").addClass("oculto");

var hagoVinculacion=false;

var abreOtroDialog=false;

$.ajax(
{
type:"POST",
url:"chk.php",
data:params,
success:
function(data)
{
	
	cerrarLoading();
	
	$(form).removeClass("ajaxRunning");
	var result=false;
	var msgError="Sucedio algun inconveniente";
	if(typeof data.status!="undefined")
	{
		
		
		switch(status)
		{
			case 1:
			bumexAlert(data.errorMessage,"warningBox");
			return;
			break;
			
			case 200:
			if(data.contenido)
			{
				if(Boolean(data.contenido.resultadoRegistro))
				{
					window.location=data.contenido.URLdestino;
					return;
				}
				
				else
				{
					result=true;
					if(data.contenido.mensajeErrorRegistro.indexOf("VINCULACION_FBK")!=-1)
					{
						hagoVinculacion=true;
						data.contenido.mensajeErrorRegistro=null;
						loginFacebookApp('vin',null,"idPostulante="+data.contenido.idPostulanteVincular+"&token="+data.contenido.tokenVinculacion)
					}
					else if(data.contenido.mensajeErrorRegistro.indexOf("ADD_VIN_FBK")!=-1)
					{
						hagoVinculacion=true;
						data.contenido.mensajeErrorRegistro=null;
						loginFacebookApp('vin',null,"idPostulante="+data.contenido.idPostulanteVincular+"&token="+data.contenido.tokenVinculacion)
						
					}
					else if(data.contenido.mensajeErrorRegistro.indexOf("REPETIDOS_FBK")!=-1)
					{
						abreOtroDialog=true;
						data.contenido.mensajeErrorRegistro=null;
						mostrarDialogRepetidosFromAjaxResponse(data.contenido.postulantesRepetidos,data.contenido.emailRepetido)}
						else if(data.contenido.mensajeErrorRegistro.indexOf("LOGIN_FBK")!=-1)
						{hagoVinculacion=true;data.contenido.mensajeErrorRegistro=null;loginFacebookApp('log')}else{$(form).find("#mensajeErrorRegistro").removeClass("oculto");$(form).find("#mensajeErrorRegistro p").html(data.contenido.mensajeErrorRegistro)}}}break}}if(!result){if(msgError!=""){bumexAlert(msgError,"warningBox")}}if(!hagoVinculacion){reiniciarBotones();cerrarLoading();if(!abreOtroDialog)abrirUltimoModal()}}})}function mostrarDialogRepetidosFromAjaxResponse(repetidos,emailRepetido){var dialogTemplate=$(".fbkDialogTemplate").clone(true);$(dialogTemplate).find("#msjTemplate").html(emailRepetido);for(var i in repetidos){var rowTemplate=$(".dataRowTemplate").clone(true);$(rowTemplate).find("#rowCol0").attr("src",repetidos[i].fotoURL);if(i==0){$(rowTemplate).find("#rowCol1").attr("checked","checked");$(rowTemplate).find("#rowCol8").attr("checked","checked")}else $(rowTemplate).addClass("eliminar");$(rowTemplate).find("#rowCol1").attr("value",repetidos[i].idPostulante);$(rowTemplate).find("#rowCol2").html(repetidos[i].nombre);$(rowTemplate).find("#rowCol3").html(repetidos[i].ultimoLogin);$(rowTemplate).find("#rowCol4").html(repetidos[i].ultimaPostulacion);$(rowTemplate).find("#rowCol5").html(repetidos[i].completitudCV);$(rowTemplate).find("#rowCol6").attr("value",repetidos[i].idPostulante);$(rowTemplate).find("#rowCol7").attr("style","width:"+repetidos[i].completitudCV);$(rowTemplate).find("#rowCol8").attr("value",repetidos[i].tokenVinculacion);$(rowTemplate).removeClass("dataRowTemplate");$(dialogTemplate).find("#tableBodyTemplate").append(rowTemplate);$(dialogTemplate).removeClass("fbkDialogTemplate")}cerrarModalAbierto();hardcodearOverlay();$(dialogTemplate).dialog({modal:true,draggable:false,resizable:false,dialogClass:'bumex_modal',width:680,closeOnEscape:false,zIndex:100001});$(dialogTemplate).parents(".ui-dialog").find(".ui-dialog-titlebar-close").bind("click",function(){quitarOverlayHardcode()})}function mostrarDialogRepetidosFromPlainText(parametros,delim){parametros=parametros.replace(/\[/g,"['");parametros=parametros.replace(/\]/g,"']");parametros=parametros.replace(/\,/g,"','");var dialogTemplate=$(".fbkDialogTemplate").clone(true);var msjYParams=parametros.split(delim);var msj=msjYParams.shift();$(dialogTemplate).find("#msjTemplate").html(msj);var temp;for(var i in msjYParams){eval("temp="+msjYParams[i]);var rowTemplate=$(".dataRowTemplate").clone(true);if(i==0)$(rowTemplate).find("#rowCol"+String(j)).attr("checked","checked");else $(rowTemplate).addClass("eliminar");$(rowTemplate).find("#rowCol0").attr("src",temp[0]);$(rowTemplate).find("#rowCol1").attr("value",temp[1]);$(rowTemplate).find("#rowCol6").attr("value",temp[1]);$(rowTemplate).find("#rowCol5").html(temp[5]);$(rowTemplate).find("#rowCol7").attr("style","width:"+temp[5]);$(rowTemplate).find("#rowCol8").attr("value",temp[6]);for(var j in temp){if(j!=0&&j!=1&&j!=5&&j!=6){$(rowTemplate).find("#rowCol"+String(j)).html(temp[j])}}$(rowTemplate).removeClass("dataRowTemplate");$(dialogTemplate).find("#tableBodyTemplate").append(rowTemplate);$(dialogTemplate).removeClass("fbkDialogTemplate")}cerrarModalAbierto();hardcodearOverlay();$(dialogTemplate).dialog({modal:true,draggable:false,resizable:false,dialogClass:'bumex_modal',width:680,closeOnEscape:false,zIndex:100001})}function bajaPostulantesRepetidos(params){$.ajax({type:"POST",url:"/postulantes/registroPostulante_baja.ajax",data:params,success:function(data){if(typeof data.status!="undefined"){var status=data.status.status;switch(status){case 14:bumexAlert(data.errorMessage,"okBox");break;case 2:bumexAlert(data.errorMessage,"warningBox");break}}}})}function hardcodearOverlay(){$("body").append('<div id="overlay-hardocode" class="ui-widget-overlay" style="width: 1263px; height: 902px; z-index: 100004; "></div>')}function quitarOverlayHardcode(){$("#overlay-hardocode").remove()}function abrirDialogVinculacionRegistracion(email){cerrarModalAbierto();hardcodearOverlay();var dialog=$("#opcionFBRegistracionVinculacion");$(dialog).find("#msjTemplate").html(email);$(dialog).dialog({modal:true,draggable:false,resizable:false,dialogClass:'bumex_modal',width:680,closeOnEscape:false,zIndex:100001});$(dialog).parents(".ui-dialog").find(".ui-dialog-titlebar-close").bind("click",function(){quitarOverlayHardcode()})}function invocacionAjaxMisPreferencias(currentForm,seccion,params){$(currentForm).addClass("AjaxRunning");if("vinculacionFbk"==seccion)params+="&vinculadoFbk=false&nuevaVinculacionFbk=true";else{if(!$(currentForm).valid())return false}$.ajax({type:"POST",url:"mispreferencias_"+seccion+".ajax",data:params,success:function(data){$(currentForm).removeClass("AjaxRunning");var result=false;var msgError="Sucedio algun error";if(typeof data.status!="undefined"){var status=data.status.status;switch(status){case 3:result=true;bumexAlert(data.errorMessage,"warningBox");setTimeout("document.location = \"/\";",1000);break;case 25:result=true;bumexAlert("Se ha vinculado &eacute;xistosamente con Facebook.","okBox",6000);$('#monigoteAlert').fadeOut();Set_Cookie('VINCULACION_FBK','1',60);cerrarLoading();break;case 24:case 500:case 7:case 6:case 5:case 4:if("vinculacionFbk"==seccion)cerrarLoading();msgError=data.errorMessage;break;case 200:result=true;if($(currentForm).attr("id")=="perfilSocial"){$("input[id=perfilSocial.idPerfilSocial]").val(data['contenido']['idPerfilSocial'])}window.location.reload();break;default:break}}if(!result){if(msgError!=""){bumexAlert(msgError,"warningBox",6000)}}}})}function abrirModalPerfilSocial(){$('#dialogContent_perfil_social').dialog({modal:true,draggable:false,resizable:false,dialogClass:'bumex_modal',width:680,closeOnEscape:false,zIndex:100001})}