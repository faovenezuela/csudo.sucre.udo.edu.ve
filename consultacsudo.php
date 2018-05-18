<?php
//Configuracion de la conexion a base de datos
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = "xts74"; 
$bd_base = "siiss"; 

$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 

mysql_select_db($bd_base, $con); 

//consulta todos los empleados

$sql=mysql_query("SELECT id,nombre,email,tlf FROM correos",$con);

//echo json_encode($usuarios); 
//muestra los datos consultados
//echo "</p>lat - lon - id</p> \n";
$rows = array();

while($r = mysql_fetch_array($sql)){
	
	$rows[] = $r;
	 
}
$valores=json_encode($rows);
$nuevoarchivo = fopen("datocsudo.json", "w+"); 
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