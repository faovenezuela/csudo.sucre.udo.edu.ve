<?php
//Configuracion de la conexion a base de datos
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = "xts74"; 
$bd_base = "siiss"; 

$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 

mysql_select_db($bd_base, $con); 

$fecha = date("Y-m-d", mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));
$rs = mysql_query("SELECT MAX(idevent) AS idevent from locations");
if ($r = mysql_fetch_row($rs)) {
$id = trim($r[0]);
//$idevento = $row[1];
echo $id;
//echo $idevento;
}

mysql_free_result($rs);

mysql_close($con);

$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 

mysql_select_db($bd_base, $con);

$sql = "UPDATE locations SET flag1 = '0' WHERE idevent = '$id'"; 
		 $resultado = mysql_query($sql) or die ("Problema con query"); 
		 
$query = "SELECT locations.idevent,locations.idagency_pris, locations.locdatetime, locations.lat, locations.lon, locations.depth, magnitudes.magnivalue, locations.comments,locations.flag1   
FROM locations INNER JOIN magnitudes ON locations.idevent = magnitudes.idevent where ((locations.lon >='-66' AND locations.lon <='-58' AND locations.lat >='8' AND locations.lat <='12') AND locations.locdatetime >= '$fecha' AND locations.idevent='$id') ORDER BY locations.locdatetime ASC"; 

$result = mysql_query($query);

echo $query;
$rows = array();

while ($row=mysql_fetch_array($result)) {           
/*
         $latitud=$row[lat];           
         $longitud=$row[lon];           
         $magnitud=$row[magnivalue];           
         $fech = $row[locdatetime];           
         $prof = $row[depth];         
         $comment = $row[comments];   */
		 $rows[] = $row;     
         } 
		 
         /*list( $date, $time ) = split( '[ ]', $fech );    
         
         list( $year, $month, $day ) = split( '[-./]', $date );    
         
         list( $HH, $mm, $ss ) = split( '[:]', $time );    
         
         $time = date("d-m-Y H:i:s", mktime($HH-4, $mm-30, $ss,$month,$day,$year));  */
         
//		 $rows[] = $comment + $time + $latitud ;

//$sql=mysql_query("SELECT id,nombre,email,tlf FROM correos",$con);

//echo json_encode($usuarios); 
//muestra los datos consultados
//echo "</p>lat - lon - id</p> \n";


/*while($r = mysql_fetch_array($sql)){
	
	$rows[] = $r;
	 
}*/
$valores=json_encode($rows);
$nuevoarchivo = fopen("datosismo.json", "w+"); 
fwrite($nuevoarchivo, $valores);

/*
//echo "<p>".$row['lat']." - ".$row['lon']." - ".$row['id']."</p> \n";
	// $latlong = array('puntos' => array(
//	array('lat' => $row['lat']), 
//	array('lon' => $row['lon']) 
//	)); 
$latlong = array('lat' => $r['lat'],'lon' => $r['lon']); 
	
	$valores=json_encode($latlong);
	$nuevoarchivo = fopen("dato.json", "a+"); 
	fwrite($nuevoarchivo, $valores);
$nuevoarchivo = fopen("dato.json", "w+"); 
fwrite($nuevoarchivo, $valores); */
fclose($nuevoarchivo);
	//echo json_encode($latlong);
?>
