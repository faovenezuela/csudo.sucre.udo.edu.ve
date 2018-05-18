<?php

$consumerKey    = 'HrAniC70VZRZPuGkPtTeCizT5';
$consumerSecret = '1uOoXXF5QWLNEOPCVcm0sHLtCGl0No2uJVy9SrMxTMQA9hyIeb';
$oAuthToken     = '118723568-5ojP9YeUoRDd96vYrxDYJ39gV9oxAAOsk9PWLWcq';
$oAuthSecret    = '6zMd6wWUX9JGnjWe3oqosCn78Rv1QqnNwHYCxrhNnijPx';
 
// incluimos la librería para usar la API OAuth
require_once('twitteroauth/twitteroauth.php');
 
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);
//--------------------------------------------------------------------------------------------------------------------------------------
  $fecha = date("Y-m-d", mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));  

  //Conexion con la base  
  mysql_connect("localhost","root","xts74");    

  //Ejecucion de la sentencia SQL  
  mysql_select_db("siiss");    

  //Busquedad del ultimo evento sismico  

  $result = mysql_query("SELECT locations.idevent,locations.idagency_pris, locations.locdatetime, locations.lat, locations.lon, locations.depth, magnitudes.magnivalue, locations.comments, locations.flag3  
	FROM locations INNER JOIN magnitudes ON locations.idevent = magnitudes.idevent where ((locations.lon >='-66' AND locations.lon <='-58' AND locations.lat >='8' AND locations.lat <='12') AND	locations.locdatetime >= '$fecha') ORDER BY locations.locdatetime ASC");  
	
	//echo $result;
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
			 $flag3 = $row[flag3];        
	}
	//echo "aqui";
	
	if (is_null($flag3)){  
	
		 list( $date, $time ) = split( '[ ]', $fech );    
		 
		 list( $year, $month, $day ) = split( '[-./]', $date );    
		 
		 list( $HH, $mm, $ss ) = split( '[:]', $time );    
		 
		 $time = date("d-m-Y H:i:s", mktime($HH-4, $mm-30, $ss,$month,$day,$year));
// aqui tu lógica para recoger el contenido del tweet, ya sea de tu bbdd, feed, rss o fichero
 		 $enviar= "Sismo: ".$time." Mag:".$magnitud." Prof:".$prof." Ver:".$mapa."";	
		 
		 $tweet->post('statuses/update', array('status' => $enviar));
		 
		 //Modificamos la bandera del evento update flag3 a true, para twitter
  		 $sql = "UPDATE locations SET flag3 = '1' WHERE idevent = '$evento'"; 
		 $resultado = mysql_query($sql) or die ("Problema con query");

	}
	
	?>
