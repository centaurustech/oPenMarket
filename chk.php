<?php

function register_sale($verb)
{
	require_once(dirname(__FILE__).'/../../../usr/share/yii/framework/yii.php');
	defined('YII_DEBUG') or define('YII_DEBUG',true);
	
	if(isset($_POST['where']) || isset($_POST['code']))
	$cnx=new CDbConnection('mysql:host=localhost;dbname=world', 'userdb', 'db5e65fb2af18937f7b24b787949866522a0c04f30b21fc9a8dd2979d6e1b866');

		else
		$cnx = new CDbConnection('mysql:host=localhost;dbname=productAdmin', 'userdb', 'db5e65fb2af18937f7b24b787949866522a0c04f30b21fc9a8dd2979d6e1b866');
	
	$cnx->active=true;
	
	if(isset($_POST['consult']))		
	{

	if($_POST['consult']==1)		
	$dat=$cnx->createCommand("select name,details,price,pathimg,id from products order by rand() limit 5")->queryAll();
	
		else
		$dat=$cnx->createCommand("select name from products order by rand() limit 5")->queryAll();
	
			echo json_encode($dat);
	
	return 0;				
	}
	
	if(isset($_POST['mediNom']) && isset($_POST['marka']))
	{

	if(strlen($_POST['marka'])==0 && strlen($_POST['mediNom'])>0 || strlen($_POST['marka'])>0 && strlen($_POST['mediNom'])==0)
	{
			$dat=$cnx->createCommand('select name,details,price,pathimg,id from products where name like "%' . $_POST['mediNom'] . '%" And vendedor like "%'. $_POST['marka'] . '%"')->queryAll();
			echo json_encode($dat);		
	}
			
	return 0;
	}

	//no cookies	
	if(isset($_COOKIE['mail'])==false && isset($_COOKIE['pass'])==false)
	{
		header( "HTTP/1.1 301 Moved Permanently"); 
		header( "Location: http://testing.servehttp.com/index.php");		
	}
	
	if(isset($_POST['where']) || isset($_POST['code']))
	{
		if($_POST['where']=="1")
		$consulta="select Code,name from Country";
		
			else
			$consulta='select id,name from City where CountryCode="' . $_POST['code'] . '"';
		
			$dat=$cnx->createCommand($consulta)->queryAll();
			echo json_encode($dat);
			
	return 0;		
	}
	
	//users register
	if(isset($_POST['ced'])==true && is_nan($_POST['ced'])==false  && isset($_POST['pwd2'])==true && isset($_POST['pwd1'])==true && strstr($_POST['pwd2'],  $_POST['pwd1']))
	{
	$var0=hash('haval160,4',$_POST['ced'], false);
		
								
		if($cnx->CreateCommand('select mail from users where mail="' . $_POST['mail'] . '"')->queryScalar()==false && $cnx->CreateCommand("insert into users values('" . $var0  ."',null,null,'" . $var1 . "','" . $_POST['mail'] . "', now(), '" . $_SERVER['HTTP_USER_AGENT'] . "'," . $_POST['ced'] . ")")->execute())
		{
			setcookie("mail", hash('md5', $_POST['pwd1'], false) . hash('sha256', $_POST['mail'], false));	
			setcookie("pass", $var0);			
		}
			
	return 0;
	}					
	
	//login	
	if(isset($_POST['type'])==true && $_POST['type']=="1" && isset($_POST['mail']) && isset($_POST['pwd1']))
	{				
			//pwd encr			
			$var1=hash('whirlpool', $_POST['mail'], false) . hash('sha128', $_POST['pwd1'], false);																					
			$var1=mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $var1, $_POST['pwd1'], MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));		
			
			$id=$cnx->CreateCommand("select id from users where mail='" . $_POST['mail'] . "' And pwd='" . $var1 ."'")->queryScalar();
			
			if($id!=NULL)
			{							
				setcookie("mail", hash('md5', $_POST['pwd1'], false) . hash('sha256', $_POST['mail'], false));	
				setcookie("pass", $id);
				
			return 0;				
			}				 	
	}
				
	//formu.php riddick
	if(isset($_POST['riddick'])==true && isset($_COOKIE['pass'])==true && isset($_COOKIE['mail'])==true && strlen($_COOKIE['mail'])>5 && strlen($_COOKIE['pass'])>5)
	{
		$cnx->CreateCommand('delete from users where id="' . $_COOKIE['pass'] . '"')->execute();
			
			unset($_COOKIE["mail"]);	
			unset($_COOKIE["pass"]);			
		
		header( "HTTP/1.1 301 Moved Permanently"); 
		header( "Location: http://testing.servehttp.com/index.php");			
			
	
	return 0;
	}
				
	//cambio de info user...		
	if(isset($_POST['ape']) && isset($_POST['pwdtoday']) && isset($_POST['pwd1']) && isset($_POST['pwd2']) && isset($_POST['name']) && strstr($_POST['mail'], "@"))
	{
		if($cnx->CreateCommand('update users set fname="' . $_POST['name'] . '",sname="' . $_POST['ape'] . '",mail="' . $_POST['mail'] . '" where id="' . $_COOKIE['pass'] . '"')->execute())
		{			
			header( "HTTP/1.1 301 Moved Permanently"); 
			header( "Location: http://testing.servehttp.com/index.php");
		}
		
	return 0;
	}		
		
	//compra					
	if(isset($_COOKIE['pass']) &&
	 isset($_COOKIE['mail']) &&
	 isset($_POST['mail']) &&
	 isset($_COOKIE['totalPrice']) &&
	 isset($_COOKIE['prodCant']) &&	 
	 isset($_POST['paisResi']) &&
	 isset($_POST['edoResi']) &&
	 isset($_POST['city']) &&
	 isset($_POST['dirEnv']) &&
	 isset($_POST['celCod']) &&
	 isset($_POST['celNumero']) &&
	 isset($_POST['telCod']) &&
	 isset($_POST['telNumero']) &&
	 isset($_POST['mesTarj']) &&
	 isset($_POST['anoTarj']) &&
	 isset($_POST['typPago']) &&
	 isset($_POST['serialTarj']) &&
	 isset($_POST['codTarj']))
	{		
	$flag=0;			
	
			/*$way=mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $_COOKIE['pass'], "elcorreodesylar@gmail.com", MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));	
			


			echo $way . "<br>";
	
			$cnx->createCommand("update compradores set mail='". $way . "' where ced='" . $_COOKIE['random'] . "'")->execute();
	
			$ay=$cnx->CreateCommand("select mail from compradores")->queryScalar();

	
			echo "mail " . mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $_COOKIE['pass'], $ay, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));*/
	
	
			$dat=$cnx->createCommand("select fname,sname from users where id='" . $_COOKIE['pass'] . "'")->query();
			$dat->bindColumn(1, $fnom);
			$dat->bindColumn(2, $snom);
			$dat->read();			
			
		$idsale=$cnx->createCommand("select transid from ventas order by transid DESC")->queryScalar();																		
	
		if($idsale==null)
		$idsale=0;
			
		$idsale++;		
		$totalpago=0;			
			
	foreach($_COOKIE as $nom=>$cont)
	{ 		
		
		if(strstr($nom, "product"))
		{
			
			echo "select products.price,products.iva,products.dsc from products where id=" . substr($nom, 7) . "<br>";																		
			$dat = $cnx->createCommand("select products.price,products.iva,products.dsc from products where id=" . substr($nom, 7))->query();			
			$dat->bindColumn(1, $Pprice);
			$dat->bindColumn(2, $Piva);
			$dat->bindColumn(3, $Pdsc);
			$dat->read();																											
		
		echo "<br>insert into transacciones(idcompra,idproduct,precio,cant,iva,dsc) values(" . $idsale . "," . substr($nom, 7) . "," .  $Pprice . "," . $cont . "," . $Piva . "," . $Pdsc . ")<br>";
		$dat=$cnx->createCommand("insert into transacciones(idcompra,idproduct,precio,cant,iva,dsc) values(" . $idsale . "," . substr($nom, 7) . "," .  $Pprice . "," . $cont . "," . $Piva . "," . $Pdsc . ")")->execute();																
											
				$Pprice=$Pprice * $cont;				
				echo "<br><br>" . substr($nom, 7) . " Precio normal " . $Pprice . "<br>";
				echo "Cantidad " . $cont . "<br>";
				echo "IVA " . $Piva . " - dsc " . $Pdsc . "<br>";																			
				$op=$Pprice * $Piva  / 100;
				$Pprice=$op+$Pprice;			
				echo "Precio con IVA " . $Pprice . "<br>";
														
				$op=$Pprice * $Pdsc  / 100;
				$Pprice=$Pprice-$op;			
				echo "Precio menos dsc " . $Pprice;
				$totalpago=$totalpago+$Pprice;
				
		echo "<br><br>";							
		
				
		echo "eliminado " . $nom . "<br>";
		setcookie($nom, null, -1);								 			
		}	
	}
	
			echo '<br>idsale.. ' . $idsale . '<br><br>insert into ventas(
			fcompra,
			transid,
			uagent,
			ipv4,
			dirEnv,
			personEnv,
			city,
			prov,
			codCel,
			codNum,
			codTel,
			numTel,
			paisEnv,
			totalcmp,
			typPago,
			codPago,
			iduser) 
			
			values(
			now(),' . 
			$idsale . ', "' . 
			$_SERVER['HTTP_USER_AGENT'] . '","' . 
			$_SERVER['REMOTE_ADDR'] . '","' . 
			$_POST['dirEnv'] . '","' . 
			$fnom . " " . $snom . '","' .
			$_POST['city'] . '","' .			
			$_POST['edoResi'] . '","' .  
			$_POST['celCod'] . '","' . 
			$_POST['celNumero'] . '","' . 
			$_POST['telCod'] . '","' . 
			$_POST['telNumero'] . '","' . 
			$_POST['paisResi'] . '","' . 
			$totalpago . '","' . 
			$_POST['typPago'] . '","' . 
			$_POST['serialTarj'] . '","' . 
			$_POST['codTarj'] . '","' . 
			$_COOKIE['pass'] . '")';
			
			$cnx->CreateCommand('insert into ventas(
			fcompra,
			transid,
			uagent,
			ipv4,
			dirEnv,
			personEnv,
			city,
			prov,
			codCel,
			codNum,
			codTel,
			numTel,
			paisEnv,
			totalcmp,
			typPago,
			codPago,
			extraPago,
			iduser) 
			
			values(
			now(),' . 
			$idsale . ', "' . 
			$_SERVER['HTTP_USER_AGENT'] . '","' . 
			$_SERVER['REMOTE_ADDR'] . '","' . 
			$_POST['dirEnv'] . '","' . 
			$fnom . " " . $snom . '","' .
			$_POST['city'] . '","' . 
			$_POST['edoResi'] . '","' . 
			$_POST['celCod'] . '","' . 
			$_POST['celNumero'] . '","' . 
			$_POST['telCod'] . '","' . 
			$_POST['telNumero'] . '","' . 
			$_POST['paisResi'] . '","' . 
			$totalpago . '","' . 
			$_POST['typPago'] . '","' . 
			$_POST['serialTarj'] . '","' . 
			$_POST['codTarj'] . '","' . 
			$_COOKIE['pass'] . '")')->execute();			
			
		
	sendMail($cnx->createCommand("select mail from users where id='" . $_COOKIE['pass'] . "'")->queryScalar(), "<br><br>Hola, " . $fnom . " " . $snom . " has cancelado un total de " . $totalpago . " BsF<br><br>", "Notificacion de compra " . $cnx->createCommand("select name from compania")->queryScalar()); 

	setcookie('totalPrice', null, -1);
	setcookie('prodCant', null, -1);
	
	sendMail("demoopenmarket@gmail.com", "<br><br>Hola, " . $fnom . " " . $snom . " ha cancelado un total de " . $totalpago . " BsF<br><br>", "Notificacion venta");
	
		//header( "HTTP/1.1 301 Moved Permanently"); 
		//header( "Location: http://testing.servehttp.com/index.php");		
					
	return 0;	
	}
	
		else
		{			
			header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: http://testing.servehttp.com/index.php");			
		}

				
}


function sendMail($mail, $txt, $subject)
{	
	require_once ('protected/extensions/phpmailer/JPhpMailer.php');	
 
	$mail = new JPhpMailer;
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPDebug = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.googlemail.com';
	$mail->Username = 'demoopenmarket@gmail.com';
	$mail->Password = 'pcap_lookupdev';
	$mail->Subject = $subject;
	$mail->MsgHTML($txt);
	$mail->AddAddress($mail, 'Compras Usuarios');
	$mail->Send();
}

function makePDF($dir)
{	
	
	require_once ('protected/extensions/yii-pdf/html2pdf.class.php');
	
    ob_start();
    include($dir);
    $cuerpo = ob_get_clean();	

	$Fpdf = new HTML2PDF("P", "A4", "es");

   $Fpdf->WriteHTML($cuerpo);
   $Fpdf->Output('cuca.pdf');

}

makePDF("modeFACT.php");

?>