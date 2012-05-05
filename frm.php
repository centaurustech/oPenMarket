							<p>

                            <img src="img/world.png" width="32" height="32"><label> <b>País envio</b></label>
                            
                            <select onchange="javascript:where(2)" class="testing" name="paisResi" id="Jpais">                                                                                                   
                            </select>
                            
                        </p>
                        <p>
                            <img src="img/world3.png" width="32" height="32"><label><b> Ciudad de envio </b></label>
                            
                            <select name="city" id="Jedo">
                            <option>Elija un pais</option>                            
                            </select>
                            
                        </p>

								<p id="Dedo" class="warningBox oculto"></p>                        
                        
                        <p>
                            <img src="img/world2.png" width="32" height="32"><label><b> Estado </b></label>
                            <input title="Este campo es necesario para realizar el envio de su compra" name="edoResi" id="J2" value= <?php echo '"' . $cityEnv . '"'; ?> type="text">
                        </p>
	                            <p id="D2" class="warningBox oculto"></p>                        
                        <p>
                            <img src="img/map.png" width="32px" height="32px">
                            <label>  <b> Dirección </b></label>
                            <input title="Direccion, numero de casa, calle, urbanizacion, vereda, apto" name="dirEnv" id="Jdir" value= <?php echo '"' . $dirEnv . '"'; ?> type="text">
                        </p>
                        
								<p id="Ddir" class="warningBox oculto"></p>
                        
                        <p>
                            <img src="img/movil.png" width="32px" height="32px"><label for="datosPersonales_unica.celPrefijo"><b>Teléfono celular</b></label>
                            <input title="Si su numero movil pertenece a Venezuela necesitara un numero valido" maxlength="4" name="celCod" id="J5" class="inputSmall" value= <?php echo '"' . $codCel . '"'; ?> type="text">
                            <input maxlength="10" name="celNumero" id="J6" class="inputMedium" value= <?php echo '"' . $numCel . '"'; ?> type="text">
                        </p>
                        		<p id="D5" class="warningBox oculto"></p>                        
	                            <p id="D6" class="warningBox oculto"></p>
                        <p>
                            <img src="img/phone.png" width="32px" height="32px"><label for="datosPersonales_unica.telFijoPrefijo"> <b>Teléfono fijo</b></label>
                            <input title="Si su numero de telefono pertenece a Venezuela necesitara un numero valido" maxlength="5" name="telCod" id="J3" class="inputSmall" value= <?php echo '"' . $codTel . '"'; ?> type="text">
                            <input maxlength="10" name="telNumero" id="J4" class="inputMedium" value= <?php echo '"' . $numTel . '"'; ?> type="text">
                        </p>                       
	                            <p id="D4" class="warningBox oculto"></p>
                        <p>
                            <img src="img/dni.png" width="32px" height="32px"><label>  <b>Documento Identidad</b></label>
                            <!--<select disabled="disabled" name="datosPersonales.idTipoDeDocumento" id="datosPersonales_unica.idTipoDeDocumento">
                                <option value="">RIF</option>
                                <option value="48" selected="selected">
<?php

	$flagID=3;

	switch($flagID)
	{
		case 1:
		echo 'Cedula de Identidad (DNI)';
		break;

		case 2:
		echo 'Pasaporte';
		break;
		
		case 3:
		echo 'RIF';
		break;
	}		
                                
?>

											</option>-->                                                                                                                              
                            
                            </select>
                            <input maxlength="20" name="nroCed" id="datosPersonales_unica.nroDeDocumento" class="inputMedium"
                            
                            <?php
                            
                            echo 'value="'. $id . '" disabled="disabled"';
                            
                            ?> 
                            
                             type="text">
                        </p>
                                                
                        <p>
                        <img src="img/money.png"><label><b> Empresa de envio</b></label>
                            <select>                                                          
                                <option value="2">Ipostel</option>
                                <option value="3">Aerocav</option>
                                <option value="1">Zoom</option>
                                <option value="4">MRW</option> 
                              </select>
                        </p>
                        
                        <p>
                            <img src="img/money.png"><label><b> Datos de Pago</b></label>
                            <select onchange="javascript:selectpago()" id="Jpago" name="typPago">                                                          
                                <option value="2">Master Card</option>
                                <option value="3">Paypal</option>
                                <option value="1">VISA</option>
                                <option value="4">Transferencia</option> 
                                                                
                                
	<?php
	
	$flagPago=4;

		switch($flagPago)
		{
			case 0:
			echo '-';
			break;			
												
			case 1:
			echo "VISA";
			break;
												
			case 2:
			echo "Master Card";
			break;
												
			case 3:
			echo "Paypal";
			break;
			
			case 4:
			echo "Transferencia";
			break;			
		}                                
                                
	?>
	
									</option>                                                                                                                                                                                       
                            </select>
                            </p>
                            
<p>                        
             <img src="img/validate.png" alt="fecha Tarjeta Credito" id="JTarimg0">
             <label id="LTarj" > <b>Tarjeta Valida</b></label>                            
              <select name="mesTarj" id="JmesTarj">                            
    							<option value="01">01</option>    						
    							<option value="02">O2</option>    						
    							<option value="03">03</option>    						
    							<option value="04" selected="selected">04</option>    						
    							<option value="05">05</option>    						
    							<option value="06">06</option>    						
    							<option value="07">07</option>    						
    							<option value="08">09</option>    						
    							<option value="09">09</option>    						
    							<option value="10">10</option>    						
    							<option value="11">11</option>    						
    							<option value="12">12</option>    						 
               </select>
               
               <select name="anoTarj" id="anoTarj" class="fechaNacimientoAno">
               		<option value="1993">2018</option>
               		<option value="1993">2017</option>
                     <option value="1993">2016</option>
							<option value="1993">2015</option>               
               		<option value="1993">2014</option>
               		<option value="1993">2013</option>                              
   						<option value="1993">2012</option>   								   									
   								 
               </select>					
					
					<br>
					<br>
					<img id="Ipago" width="32" height="32" src="img/pago1.png" alt="fecha Tarjeta Credito">                            
					<label id="Ppago"><b>Numero tarjeta:</b></label>
					<input title="Campo de pago" maxlength="14" name="serialTarj" id="JserialTarj" class="inputMedium" value= <?php echo '"' . $codTarj . '"'; ?> type="text">
										
					<br>
					<br>
					<img src="img/codeCC.png" alt="fecha Tarjeta Credito" id="JTarimgn">
					<label id="PcodTarj"><b>Codigo Tarjeta:</b></label>
					<input title="Campo de pago" maxlength="4"  name="codTarj" id="JcodTarj" class="inputSmall" value= <?php echo '"' . $extrapago . '"'; ?> type="text">
									
					<p id="Dpago" class="warningBox oculto"></p>                                                    
	                            
					</p>
					</div>	                         
