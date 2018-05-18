<?php

require("class.phpmailer.php"); //Importamos la función PHP class.phpmailer 
echo "Rutina de bd";
//--------------------------------------------------------------------------------------------------------------------------------------
  $fecha = date("Y-m-d", mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));  

  //Conexion con la base  
  mysql_connect("localhost","root","xts74");    
echo "aqui";
  //Ejecucion de la sentencia SQL  
  mysql_select_db("siiss");    

  //Busquedad del ultimo evento sismico  

  $result = mysql_query("SELECT locations.idevent,locations.idagency_pris, locations.locdatetime, locations.lat, locations.lon, locations.depth, magnitudes.magnivalue, locations.comments, locations.flag2  
	FROM locations INNER JOIN magnitudes ON locations.idevent = magnitudes.idevent where ((locations.lon >='-66' AND locations.lon <='-58' AND locations.lat >='8' AND locations.lat <='12') AND	locations.locdatetime >= '$fecha') ORDER BY locations.locdatetime ASC");  
	
	echo $result;
	//print "SELECT locations.idevent,locations.idagency_pris, locations.locdatetime, locations.lat, locations.lon, locations.depth, magnitudes.magnivalue, locations.comments 
	//FROM locations INNER JOIN magnitudes ON locations.idevent = magnitudes.idevent where locations.idevent = '$ult_event'";    
	
	while ($row=mysql_fetch_array($result)) {           
	//print "Actividad SÃ­smica";
			 $evento=$row[idevent];
			 $latitud=$row[lat];           
			 $longitud=$row[lon];           
			 $magnitud=$row[magnivalue];           
			 $fech = $row[locdatetime];           
			 $prof = $row[depth];         
			 $co = $row[comments];
			 //$mapa = "http://maps.google.com/maps?q=" .$latitud. "+" .$longitud. "&ll=" .$latitud. "," .$longitud. "&spn=2,2&f=d&t=h&hl=e>";
			 $mapa ="https://www.google.com/maps/place/".$latitud.",".$longitud.">";
			 $flag2 = $row[flag2];        
	}
	if (is_null($flag2)){  
	
		 list( $date, $time ) = split( '[ ]', $fech );    
		 
		 list( $year, $month, $day ) = split( '[-./]', $date );    
		 
		 list( $HH, $mm, $ss ) = split( '[:]', $time );    
		 
		 $time = date("d-m-Y H:i:s", mktime($HH-4, $mm-30, $ss,$month,$day,$year));
		//echo "email";
		//--------------------------------------------------------------------------------------------------------------------------------------------------------------- 	
	
		$mail = new PHPMailer(); 
		
		//Luego tenemos que iniciar la validación por SMTP: 
		$mail->IsSMTP(); 
	
		$mail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False 
	
		$mail->Username = "falvarez@localhost"; // Cuenta de e-mail 
	
		$mail->Password = "xts74"; // Password 
	
		$mail->Host = "localhost"; 
	
		$mail->From = "falvarez@localhost"; 
	
		$mail->FromName = "Centro de Sismologia"; 
	
		$mail->Subject = "Evento Sismico"; 
		//ojo cambiar esto		 
	   	$resultcorreo = mysql_query("SELECT nombre,email from correos");
	   	//$resultcorreo = mysql_query("SELECT nombre,email from correos where id='1' and id='6';");
		//echo $resultcorreo;
	   while ($rowcorreo = mysql_fetch_array($resultcorreo)){
			

		   	$nombre = $rowcorreo[nombre];
			//echo $nombre;
		   	$email  = $rowcorreo[email];
		
			$mail->AddAddress($email,$nombre); 
			$mail->IsHTML(true);
			//$mail->WordWrap = 50; 
			$cuerpo='

<html>
<head>
<title>Centro de Sismología</title>
<style type="text/css">
<!--
#datos {
	position:absolute;
	width:780px;
	left: 164px;
	top: 316px;
	text-align: center;
}
#apDiv1 #form1 table tr td {
	text-align: center;
	font-weight: bold;
}
#apDiv2 {
	position:absolute;
	width:49px;
	height:45px;
	z-index:2;
	left: 12px;
	top: 11px;
}
#apDiv1 #notificacion table tr td {
	text-align: center;
}
#apDiv1 #notificacion table tr td {
	text-align: left;
}
#apDiv1 #notificacion table tr td {
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
}
#apDiv3 {
	position:absolute;
	width:833px;
	height:115px;
	z-index:1;
	left: 99px;
	text-align: center;
	top: 16px;
}
-->
</style>
</head>

<body>
<div id="apDiv3">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td><table width="100%" border="0">
        <tr>
          <td style="text-align: center"><img src="150.186.92.201/udo.png" width="211" height="211"></td>
        </tr>
        <tr>
          <td><p>&nbsp;</p>
            <p style="font-family: Helvetica LT Condensed; color: #008895; font-weight: bold; font-size: 22px; text-align: center;">Evento Sísmico</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><spanHelvetica LT Condensed"; font-size: 18px;">
            <span style="font-weight: bold">Comentario:</span>&nbsp; '.$co.' </span>&nbsp;</span></td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><spanHelvetica LT Condensed"; font-size: 18px;">
            <span style="font-weight: bold">Fecha:</span>&nbsp; '.$time.'</span>&nbsp;</span></td>
        </tr>
		<tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><spanHelvetica LT Condensed"; font-size: 18px;">
            <span style="font-weight: bold">Latitud:</span>&nbsp; '.$latitud.'</span>&nbsp;</span></td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><spanHelvetica LT Condensed"; font-size: 18px;">
            <span style="font-weight: bold">Longitud:</span>&nbsp; '.$longitud.'</span>&nbsp;</span></td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Magnitud:</span>&nbsp; '.$magnitud.'</td>
        </tr>
        <tr>
          <td style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Profundidad:</span>&nbsp; '.$prof.'</td>
        </tr>
        <tr>
          <td><p>&nbsp;</p>
            <p><span style="font-family: Helvetica LT Condensed; font-size: 18px;"><span style="font-weight: bold">Ver Mapa:</span>&nbsp; '.$mapa.'</span></p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
        
          <td style="text-align: center"><a href="https://play.google.com/store/apps/details?id=com.csudo.sismo"><img src="150.186.92.201/Google-Play.png" width="211" height="211"></a></td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
</body>
</html>

'; // Cerramos la comilla simple. Con la comilla simple y el punto y coma se finaliza el cuerpo del mensaje html.  


// Asignamos al atributo Body, la variable $cuerpo.
			/*$mail->Body = $cuerpo;
			$body  = $comment; 
			$body .= " Fecha:";
			$body .= $time;
			$body .= " Latitud:";
			$body .= $latitud;
			$body .= " Longitud:";
			$body .= $longitud;
			$body .= " Magnitud:";
			$body .= $magnitud;
			$body .= " Profundidad:";
			$body .= $prof;
			$body .= " Ver Mapa:";
			$body .= $mapa; */
		
			$mail->Body = $cuerpo; 
	}//fin del while	
			//$mail->Send(); 
		
			// Notificamos al usuario del estado del mensaje 
		
			if(!$mail->Send()){ 
		   		echo "No se pudo enviar el Mensaje csudo."; 
			}else{ 
		   		echo "Mensaje enviado"; 
		   		//Modificamos la bandera del evento update flag2 a true
		   		$sql = "UPDATE locations SET flag2 = '1' WHERE idevent = '$evento'"; 
				$resultado = mysql_query($sql) or die ("Problema con query");
			}
			$src = $mapa;
			$dst = '/home/falvarez/Pictures/mapa.jpg';
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor(w, h);
			imagecopyresampled($dst_r, $img_r, 0, 0, $origenX, $origenY, $w, $h, $w, $h);
			imagejpeg($dst_r, $dst, 90); 
	   
}
?>
