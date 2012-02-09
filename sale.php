<div id="asd" class="container_12 clearfix verticalTabsContainer verticalTabsContainerLeft">
    
        <div class="grid_3 verticalTabs verticalTabsLeft">
            <ul>
                <li><a id="tab_datos_personales" class="actual" href="#/seccion?id=datos_personales">Datos personales</a></li>

	<?php

	if(isset($_GET['type']) && $_GET['type']==5)
	echo '<li><a id="tab_perfil_social" href="fact.php"><span><img src="img/sale1.png">  Ver pedido</span></a></li><li> <!-- <a id="tab_contrasena" href="formu.php"> <img src="img/option.png" width=32px heigth=32px> Cambiar datos</a>--></li>';
									
	?>
	                                                                
                <li>
                
						<form action="chk.php" method="post" name="send">
 							<input type="hidden" name="riddick" value=
 							
 							<?php
 							
 								echo "'" . rand(1, 100000000) . "'>";
 							
 							?>  							 							 
						</form>
                
                </li>
            </ul>
        </div>
        <div class="grid_9 tabContentWrap">

            <div id="tabContent_datos_personales" class="tabContent tabContentActual">
                
              	<div class="formCv">
                        <p>
                            <img src="img/user.png"><label> <b>Nombres</b> </label>
                            
                            <input maxlength="50"
                            
                                                                                    

	<?php	
	                           
                            
		if($fName)
		echo 'disabled="disabled"';
                            	
   echo ' name="name" id="J0" value="' . $fName . '" type="text">';                         
                            
	?>                            
                                                         
                        </p>
                        <!--<b><i>(Sera )</i></b>-->
	                     <p id="D0" class="warningBox oculto"></p>                                                
                        <p>
                            <img src="img/ape.png" width="38px" height="38px"><label> <b>Apellidos</b> </label>
                            <input
                            
                            <?php                                                        
                            
                            	if($sName)
                            	echo 'disabled="disabled"';
                            	
                            echo 'maxlength="50" name="ape" id="J1" value="' . $sName . '" validate="{required:true}" type="text">';                            
                            ?>                            							                             
                                                        
                        </p>
                        
                        <!--<b><i>(Solo sera editable una vez)</i></b>-->
                        
                            <div id="D1" class="warningBox oculto">
	                            <p></p>
                            </div>                          
                                                
                        <p>
                            <img src="img/mail.png"><label> <b>E-Mail</b></label>
                            <input name="mail" id="Jemail" value= <?php echo '"' . $mail . '"'; ?> type="text">                                                        
                        </p>                      
	                            <p id="Dmail" class="warningBox oculto"></p>                        

								<?php								                        
                        
                        if(isset($_GET['type']) && $_GET['type']==5)
                        include 'frm.php';
                        
             					else
				 					include 'pwd.php';
                        
                        ?>
                        
                                               
                        <p class="formSubmitButton alignRight">
                        	<button onclick="javascript:checkout()" type="submit" id="testing" class="botonButton"><span class="boton btnAzul"><span>

									<?php

									if(isset($_GET['type']) && $_GET['type']==5)
									echo "Enviar datos";
									
										else
										echo "Guardar datos";
									
									?>																																				                                                     
                            
                            </span>
                            </span>
                            </button>
                            &nbsp;<a href="#" id="datosPersonales_cancelar_unica" class="btnCancelarEditarCv" style="visibility: hidden;">Cancelar</a>
                        </p>
				</div>
            </div>
            

        </div>
    </div>

   <div id="Dgreat" class="okBox oculto">
	<p><strong>Tu compra fue exitosa..! Verifica tu cuenta de correo <a class="irAlTolki" id="Jwebmail" onclick="window.open(this.href,'window','params');return false" href="#"> Ir a tu WebMail →</a></strong></p>
   </div>
   
<div id="ventanaModal0"class="ventanaModalOver oculto"></div>
<div id="ventanaModal1" class="ventanaModal oculto">
<div class="formCv">

<img width="52px" height="52px" id="Itrans" src="img/loading_small.gif">
 
<p style="text-align:center;" id="titlePago">
	<b>Conectando con la API Paypal</b>
<br>	 
</p>

<p id="Jcuanto"></p>

        <div class="grid_6">
            <ul class="menuHorizontal clearfix menuRight">
                
                    <li id="loginDropdown">
                    	<a id="btnCLOSE" class="boton btnAzul" onclick="javacript:cerrarbox()"><span>Cerrar Ventana</span></a>                                       	                    	
                    </li>	                
            </ul>
        </div>
                        
</div>
</div>   