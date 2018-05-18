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

//echo $query;

$rows = array();

while ($row=mysql_fetch_array($result)) {           
	 $rows[] = $row;     
         } 
		 
         
$valores=json_encode($rows);

$nuevoarchivo = fopen("datosismo.json", "w+"); 

fwrite($nuevoarchivo, $valores);


fclose($nuevoarchivo);

//Ahora creamos el archivo JSON de los ultimos sismos del mes
	
$fecha = date("Y-m-d", mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));  
  
  //Conexion con la base
  mysql_connect("localhost","root","xts74");

  //Ejecucion de la sentencia SQL
  mysql_select_db("siiss");

  //Busquedad del ultimo evento sismico
  
  
  $result = mysql_query("SELECT locations.idevent,locations.idagency_pris, locations.locdatetime, locations.lat, locations.lon, locations.depth, magnitudes.magnivalue, locations.comments 
FROM locations INNER JOIN magnitudes ON locations.idevent = magnitudes.idevent where ((locations.lon >='-66' AND locations.lon <='-58' AND locations.lat >='8' AND locations.lat <='12') AND locations.locdatetime >= '$fecha') ORDER BY locations.locdatetime ASC");  
  
while ($row=mysql_fetch_array($result)) {           
	
	$rows[] = $row;

}
         /*$latitud=$row[lat]; 
          
         $longitud=$row[lon];
           
         $magnitud=$row[magnivalue]; 
          
         $fech = $row[locdatetime];
           
         $prof = $row[depth]; 
        
         $comment = $row[comments];        
         } 
 
         list( $date, $time ) = split( '[ ]', $fech );    
         
         list( $year, $month, $day ) = split( '[-./]', $date );    
         
         list( $HH, $mm, $ss ) = split( '[:]', $time );    
         
         $time = date("d-m-Y H:i:s", mktime($HH-4, $mm-30, $ss,$month,$day,$year));  */
         
         mysql_close();

	//Creando Array JSON

	$valormes=json_encode($rows);

	$nuevoarchivomes = fopen("datosismomes.json", "w+"); 

	fwrite($nuevoarchivomes, $valormes);


	fclose($nuevoarchivomes);
?>
