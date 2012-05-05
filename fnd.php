        <div class="grid_12 searchBox" id="searchBox">
			      
<div id="formSearchHome" class="formSearchGrande">
                <span class="formInlineInputs oculto">
                    <label for="keywords">¿Qué marca?</label>
                    <br>
                    <span class="inputWrap submitHorizontal"><span>
                    <input id="keywords" placeholder=

<?php

if(isset($_COOKIE['marka'])==true && strlen($_COOKIE['marka']))
echo $_COOKIE['marka'];

	else
	echo "'Genven, Bayer'";

?>                                                            
                                        
                    type="text">
                    </span>
                    </span>
                </span>
<p>Ingrese un producto a buscar, puede ingresar el nombre parcial o completo del producto<br>Por ejemplo: En lugar de <b>atroveran</b> puede ingresar <b>atro</b> para realizar busquedas en nuestro stock</p>
                <span class="formInlineInputs">                
                 
                    <label for="location">Buscador de productos</label>
                    <br>

                   
 <span class="inputWrap submitHorizontal">
 	<span>
 												<select style="display: none;" id="provincia">   

 													 
 												</select>
 												<input aria-haspopup="true" aria-autocomplete="list" role="textbox" class="ve ui-autocomplete-input" id="location" placeholder=
 												
<?php 

if(isset($_COOKIE['mediNom'])==true && strlen($_COOKIE['mediNom']))
echo $_COOKIE['mediNom'];

	else
	echo '"Calox, Muproban"';

?>
 												
 												><button aria-disabled="false" role="button" class="ui-button ui-widget ui-state-default ui-button-icon-only" title="Mostrar todo" tabindex="-1"><span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span><span class="ui-button-text"> </span></button> 
 	</span> 
 </span> 

						</span>

                <button onclick="javascript:consulta(2)" class="boton btnVerdeGrande botonButton submitHorizontal" type="submit" id="botonSearch"><span>Buscar</span></button>
                <a href="#" onclick="javascript:guests()" class="oculto osx" id="btnOtro">Buscar Productos</a>                
            </div>                      
            
	<div id="infobox" class="oculto"></div>
	<br>
	<br>            
