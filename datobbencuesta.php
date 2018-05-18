<?php
	//-------------------------------------------------------------------------------------------
	//Codigo PHP que recibe los datos de encuesta desde Blackberry
	//-------------------------------------------------------------------------------------------
	
    $nombre = $_REQUEST['usuario']; //Esto guardaría el nombre de usuario en $nombre
    $lat = $_REQUEST['lat']; //Esto guardaría la contraseña del usuario en $contrasenia
    $lon = $_REQUEST['lon'];
    $codigoo = $_REQUEST['codigo'];
	
	//El recibe codigo
	//tipo,numtipo,estadocorporal,numestadocorporal,
	//ubicacion,numubicacion,dano,numdano,vivienda,numvivienda,conocimiento,numconocimiento);
	               
	               
    //$codigoo = "1045093464183374-4857525141-03-2013225-201127-N4148242002-2481";
    //echo $nombre;
    //echo $lat;
   // echo $lon;
    //echo $lat;
    //Lo mismo tendríamos que hacer para guardar los demás atributos en el caso de que los hubiera,
    //siempre poniendo el nombre del atributo entre corchetes y comillas.
    // Connecting, selecting database
    $divcodigo = explode("_", $codigoo);
    $numtipo=$divcodigo[0];
    $numestadocorporal=$divcodigo[1];
    $numubicacion=$divcodigo[2];
    $numdano=$divcodigo[3];
    $numvivienda=$divcodigo[4];
	$numconocimiento=$divcodigo[5];
    //Separar la fecha
    $anio = substr($fec, 0, -3);
    $mes = substr($fec, 4, -2);
    $day = substr($fec, 5);
    
    $fec = "".$anio."-".$mes."-".$day."";
    /*
    echo $divcodigo[1];
    echo "\t\n";
    echo $divcodigo[3];
    echo "\t\n";
    echo $divcodigo[4];
    echo "\t\n";
    echo $divcodigo[5];            
    $lat='0';
    $lon='0';*/
    //echo $pieces[0]; // piece1
    //echo $pieces[4]; // piece2
    //$link = mysql_connect('mysql1000.mochahost.com', 'falvarez_faove', 'rootbill') or die('Could not connect: ' .mysql_error());
	$link = mysql_connect('localhost', 'root', 'xts74') or die('Could not connect: ' .mysql_error());

    echo 'Connected successfully';

    mysql_select_db('siiss') or die('Could not select database');

    // Performing SQL query
    //$latint=intval($lat);
    //$lonint=intval($lon);
    $latint=floatval($lat);
    $lonint=floatval($lon);
    //$codigo=String($codigo);

    //mysql_select_db("my_db", $con);
    $query = "INSERT INTO encuesta_intensidad (user,lat, lon,tipo_sismo,estado_corporal,ubicacion_fisica,danio,estado_vivienda,conocimiento) VALUES ($nombre,$latint,$lonint,$numtipo,$numestadocorpora,$numubicacion,$numdano,$numvivienda,$numconocimiento)";
   // $query = "INSERT INTO alerta (lat, lon, codigo) VALUES ($latint,$lonint,$codigoo,$pieces[4])";
    //$query = "INSERT INTO alerta (lat, lon, codigo) VALUES ($latint,$lonint,$cod)";
    //$query = "INSERT INTO alerta (lat, lon, telefono, codigo, fecha, hora) VALUES ($latint,$lonint,'".$tlf."','".$cod."','".$fec."','".$hor."')";
    echo $query;
    $resultado=mysql_query($query);
    if (!$resultado) {
       die('Consulta no válida: ' . mysql_error());
    }
    //echo $resultado;
    //echo $nombre;
    //echo $lat;
    
   /* $q=mysql_query("SELECT * FROM alerta WHERE lat='{$latint}' AND lon='{$latint}' ");

	while($e=mysql_fetch_assoc($q))
              $output[]=$e;

      print(json_encode($output));

*/

// Free resultset
//mysql_free_result($result);

// Closing connection
mysql_close($link);
?>