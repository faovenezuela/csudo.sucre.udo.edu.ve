<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Centro de Sismología - Universidad de Oriente -</title>
<meta http-equiv="content-type" content="text/html; charset=WINDOWS-1252" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
<meta http-equiv="Content-Language" content="es">
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=AIzaSyBPtKnmK6jX6eIxHvea4LKWGPfrnwuRFoI" type="text/javascript"></script>
<script type="text/javascript">  
         var map = null;  
         var geocoder = null;  
         var from;  
         var to;  
         var directionsPanel = null;  
         var directions = null;
         function inicializa() {
            if (GBrowserIsCompatible()) {
				var icon = new GIcon();
				icon.image = "http://labs.google.com/ridefinder/images/mm_20_red.png";
				icon.shadow = "http://labs.google.com/ridefinder/images/mm_20_shadow.png";
				icon.iconSize = new GSize(12, 20);
				icon.shadowSize = new GSize(22, 20);
				icon.iconAnchor = new GPoint(6, 20);
				icon.infoWindowAnchor = new GPoint(5, 1);
					  
			   map = new GMap2(document.getElementById("mapa_base"));
			     
			   map.setCenter(new GLatLng(document.frm.txtlat.value,document.frm.txtlon.value), 7);
			   
			   	var point = new GLatLng(document.frm.txtlat.value,document.frm.txtlon.value);
		
				map.addOverlay(new GMarker(point, icon));
			    
			   geocoder = new GClientGeocoder();
			     
			   map.addControl( new GSmallMapControl() );
			     
			   map.addControl( new GMapTypeControl() ); 
			    
			   directionsPanel = document.getElementById("route"); 
			    
			   directions = new GDirections(map, directionsPanel); 

 
				 
               }  
         }  
     
         function gerarRota(){  
            from = document.getElementById("partida").value;  
            to = document.getElementById("destino").value;  
            if ( geocoder ) {  
               geocoder.getLatLng(from,   
                  function(point){   
                     if ( !point ) {  
                        alert(from + " nÃƒÆ’Ã‚Â£o encontrado");  
                     }   
                  }  
               );  
               geocoder.getLatLng(to,   
                  function(point){  
                     if ( !point ) {  
                        alert(to + " nÃƒÆ’Ã‚Â£o encontrado");  
                     }   
                  }  
               );  
                 
               var string = "from: " + from + " to: "+to;  
               directions.clear();  
               directions.load(string);  
               GEvent.addListener(directions, "error", erroGetRoute);  
            } else {  
               alert("GeoCoder nÃƒÆ’Ã‚Â£o identificado");  
            }  
         }  
           
         function erroGetRoute(){  
            alert("NÃƒÆ’Ã‚Â£o foi possivel traÃƒÆ’Ã‚Â§ar a rota de: " + from + " para: " + to );  
         }  
           
           
    </script>  
<script type="text/javascript">
      var ge;
      google.load("earth", "1");

      function init() {
         google.earth.createInstance('map3d', initCB, failureCB);
      }

      function initCB(instance) {
         ge = instance;
         ge.getWindow().setVisibility(true);
      }

      function failureCB(errorCode) {
      }

      google.setOnLoadCallback(init);
   </script>

</head>

<body bgcolor="#ffffff" onload="inicializa()" onunload="GUnload()">
<div id="art-main">
    <div class="art-sheet">
        <div class="art-sheet-tl"></div>
        <div class="art-sheet-tr"></div>
        <div class="art-sheet-bl"></div>
        <div class="art-sheet-br"></div>
        <div class="art-sheet-tc"></div>
        <div class="art-sheet-bc"></div>
        <div class="art-sheet-cl"></div>
        <div class="art-sheet-cr"></div>
        <div class="art-sheet-cc"></div>
        <div class="art-sheet-body">
<div class="art-nav">
	<div class="art-nav-l"></div>
	<div class="art-nav-r"></div>
<div class="art-nav-outer">
	<ul class="art-hmenu">
		<li>
			<a href="./index.php"><span class="l"></span><span class="r"></span><span class="t">
			Inicio</span></a>   
		</li>	
		<li>
			<a href="./csudo.html">
			<span class="l" style="position: absolute; left: 23px; top: 0px; height: 100px"></span><span class="r"></span><span class="t">
			CSUDO</span></a>
			<ul>
				<li>
                    <a href="./csudo/breve-historia.html">Breve historia</a>

                </li>
				<li>
                    <a href="./csudo/objetivos.html">Objetivos</a>

                </li>
				<li>
                    <a href="./csudo/actividades.html">Actividades</a>

                </li>
				<li>
                    <a href="./csudo/organigrama.html">Organigrama</a> 

                </li>
				<li>
                    <a href="./csudo/personal-de-csudo.html">Personal de CSUDO</a>

                </li>
				<li>
                    <a href="./csudo/lineas-de-investigacion.html">Lí­neas de 
					investigación</a>

                </li>
			</ul>
		</li>	
		<li>
			<a href="./sismicidad.html"><span class="l"></span><span class="r"></span><span class="t">
			Sismicidad</span></a>
			<ul>
				<li>
                    <a href="./sismicidad/sismos-recientes.php">Sismos recientes</a> 

                </li>
				<li>
                    <a href="./sismicidad/sismogramas-recientes.html">
					Sismogramas recientes</a>

                </li>
				<li>
                    <a href="./sismicidad/encuesta-de-intensidad.html">Encuesta 
					de intensidad</a>

                </li>
				<li>
                    <a href="./sismicidad/mapas-de-sismos-anuales.html">Mapas de 
					sismos anuales</a> 

                </li>
				<li>
                    <a href="./sismicidad/busqueda-avanzada.html">Busqueda 
					avanzada</a>

                </li>
			</ul>
		</li>	
		<li>
			<a href="./boletines.html"><span class="l"></span><span class="r"></span><span class="t">
			Boletines</span></a>
			<ul>
				<li>
                    <a href="./boletines/boletines-trimestrales.html">Boletines 
					trimestrales</a>

                </li>
				<li>
                    <a href="./boletines/boletines-sismologicos.html">Boletines 
					sismológicos</a>

                </li>
			</ul>
		</li>	
		<li>
			<a href="./temas-de-interes.html"><span class="l"></span><span class="r"></span><span class="t">
			Temas de interés</span></a>
			<ul>
				<li>
                    <a href="./temas-de-interes/origen-de-los-terremotos.html">
					Origen de los terremotos</a>

                </li>
				<li>
                    <a href="./temas-de-interes/intensidad-y-magnitud.html">
					Intensidad y magnitud</a> 

                </li>
				<li>
                    <a href="./temas-de-interes/medicion-y-registro.html">
					Medición y registro</a>  

                </li>
				<li>
                    <a href="./temas-de-interes/sismicidad-historica.html">
					Sismicidad histórica</a>

                </li>
				<li>
                    <a href="./temas-de-interes/en-caso-de-terremoto.html">En 
					caso de terremoto</a> 

                </li>
				<li>
                    <a href="./temas-de-interes/que-son-los-maremotos.html">
					Que son los Maremotos?</a>

                </li>
				<li>
                    <a href="./temas-de-interes/a-80-anos-del-terremoto-de.html">
					A 80 años del Terremoto de...</a>

                </li>
			</ul>
		</li>	
		<li>
			<a href="./estudios.html"><span class="l"></span><span class="r"></span><span class="t">
			Estudios</span></a>
			<ul>
				<li>
                    <a href="./estudios/trabajos.html">Trabajos</a>

                </li>
				<li>
                    <a href="./estudios/proyectos.html">Proyectos</a>  

                </li>
				<li>
                    <a href="./estudios/tesis-de-pregrado.html">Tesis de 
					pregrado</a>

                </li>
				<li>
                    <a href="./estudios/tesis-de-postgrado.html">Tesis de 
					postgrado</a>

                </li>
			</ul>
		</li>	
		<li>
			<a href="./multimedia.html"><span class="l"></span><span class="r"></span><span class="t">
			Multimedia</span></a>
			<ul>
				<li>
                    <a href="./multimedia/fotos.html">Fotos</a>
			<ul>
				<li>
                    <a href="./multimedia/fotos/red-de-estaciones.html">Red de 
					estaciones</a>

                </li>
			</ul>

                </li>
				<li>
                    <a href="./multimedia/videos.html">Videos</a>

                </li>
			</ul>
		</li>	
		<li>
			<a href="./glosario.html"><span class="l"></span><span class="r"></span><span class="t">
			Glosario</span></a>
		</li>	
		<li>
			<a href="./contacto.html"><span class="l"></span><span class="r"></span><span class="t">
			Contacto</span></a>
		</li>	
		<li>
			<a href="./enlaces.html"><span class="l"></span><span class="r"></span><span class="t">
			Enlaces</span></a>
		</li>	
	
	</ul>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-header">
                <div class="art-header-clip">
                <div class="art-header-center">
                    <div class="art-header-png"></div>
                </div>
                </div>
                <div class="art-logo">
                                 <h1 class="art-logo-name"><a href="./index.php">
									Centro de Sismologí­a</a></h1>
                                                 <h2 class="art-logo-text">
													Universidad de Oriente</h2>
                                </div>
            </div>
            <div class="cleared reset-box"></div>
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-sidebar1">
<div class="art-vmenublock">
    <div class="art-vmenublock-body">
                <div class="art-vmenublockcontent">
                    <div class="art-vmenublockcontent-body">
                <ul class="art-vmenu">
	<li>
		<a href="./index.php" class="active"><span class="l"></span><span class="r"></span><span class="t">
		Inicio</span></a> 
	</li>	
	<li>
		<a href="./csudo.html"><span class="l"></span><span class="r"></span><span class="t">
		CSUDO</span></a>
		<ul>
			<li>
                <a href="./csudo/breve-historia.html">Breve historia</a>

            </li>
			<li>
                <a href="./csudo/objetivos.html">Objetivos</a>

            </li>
			<li>
                <a href="./csudo/actividades.html">Actividades</a>

            </li>
			<li>
                <a href="./csudo/organigrama.html">Organigrama</a>

            </li>
			<li>
                <a href="./csudo/personal-de-csudo.html">Personal de CSUDO</a>

            </li>
			<li>
                <a href="./csudo/lineas-de-investigacion.html">Lí­­neas de 
				investigación</a>

            </li>
		</ul>
	</li>	
	<li>
		<a href="./sismicidad.html"><span class="l"></span><span class="r"></span><span class="t">
		Sismicidad</span></a>
		<ul>
			<li>
                <a href="./sismicidad/sismos-recientes.php">Sismos recientes</a> 

            </li>
			<li>
                <a href="./sismicidad/sismogramas-recientes.html">Sismogramas 
				recientes</a>

            </li>
			<li>
                <a href="./sismicidad/encuesta-de-intensidad.html">Encuesta de 
				intensidad</a>

            </li>
			<li>
                <a href="./sismicidad/mapas-de-sismos-anuales.html">Mapas de 
				sismos anuales</a>

            </li>
			<li>
                <a href="./sismicidad/busqueda-avanzada.html">Busqueda avanzada</a>

            </li>
		</ul>
	</li>	
	<li>
		<a href="./boletines.html"><span class="l"></span><span class="r"></span><span class="t">
		Boletines</span></a>
		<ul>
			<li>
                <a href="./boletines/boletines-trimestrales.html">Boletines 
				trimestrales</a>

            </li>
			<li>
                <a href="./boletines/boletines-sismologicos.html">Boletines 
				sismológicos</a>
           </li>
		</ul>
	</li>	
	<li>
		<a href="./temas-de-interes.html"><span class="l"></span><span class="r"></span><span class="t">
		Temas de interés</span></a>
		<ul>
			<li>
                <a href="./temas-de-interes/origen-de-los-terremotos.html">
				Origen de los terremotos</a>

            </li>
			<li>
                <a href="./temas-de-interes/intensidad-y-magnitud.html">
				Intensidad y magnitud</a>

            </li>
			<li>
                <a href="./temas-de-interes/medicion-y-registro.html">Medición 
				y registro</a> 

            </li>
			<li>
                <a href="./temas-de-interes/sismicidad-historica.html">
				Sismicidad histórica</a>

            </li>
			<li>
                <a href="./temas-de-interes/en-caso-de-terremoto.html">En caso 
				de terremoto</a>

            </li>
			<li>
                <a href="./temas-de-interes/que-son-los-maremotos.html">Que 
				son los Maremotos?</a>

            </li>
			<li>
                <a href="./temas-de-interes/a-80-anos-del-terremoto-de.html">A 
				80 años del Terremoto de...</a>

            </li>
		</ul>
	</li>	
	<li>
		<a href="./estudios.html"><span class="l"></span><span class="r"></span><span class="t">
		Estudios</span></a>
		<ul>
			<li>
                <a href="./estudios/trabajos.html">Trabajos</a>

            </li>
			<li>
                <a href="./estudios/proyectos.html">Proyectos</a>

            </li>
			<li>
                <a href="./estudios/tesis-de-pregrado.html">Tesis de pregrado</a>

            </li>
			<li>
                <a href="./estudios/tesis-de-postgrado.html">Tesis de postgrado</a>

            </li>
		</ul>
	</li>	
	<li>
		<a href="./multimedia.html"><span class="l"></span><span class="r"></span><span class="t">
		Multimedia</span></a>
		<ul>
			<li>
                <a href="./multimedia/fotos.html">Fotos</a>
		<ul>
			<li>
                <a href="./multimedia/fotos/red-de-estaciones.html">Red de 
				estaciones</a>

            </li>
		</ul>

            </li>
			<li>
                <a href="./multimedia/videos.html">Videos</a>

            </li>
		</ul>
	</li>	
	<li>
		<a href="./glosario.html"><span class="l"></span><span class="r"></span><span class="t">
		Glosario</span></a>
	</li>	
	<li>
		<a href="./contacto.html"><span class="l"></span><span class="r"></span><span class="t">
		Contacto</span></a>
	</li>	
	<li>
		<a href="./enlaces.html"><span class="l"></span><span class="r"></span><span class="t">
		Enlaces</span></a>
	</li>	
	<li>
		<a href="./mapa.html"><span class="l"></span><span class="r"></span><span class="t">
		Mapa</span></a>
	</li>	
</ul>
                
                                		<div class="cleared"></div>
                    </div>
                </div>
		<div class="cleared"></div>
    </div>
</div>
<div class="art-block">
    <div class="art-block-tl"></div>
    <div class="art-block-tr"></div>
    <div class="art-block-bl"></div>
    <div class="art-block-br"></div>
    <div class="art-block-tc"></div>
    <div class="art-block-bc"></div>
    <div class="art-block-cl"></div>
    <div class="art-block-cr"></div>
    <div class="art-block-cc"></div>
    <div class="art-block-body">
                <div class="art-blockheader">
                    <div class="l"></div>
                    <div class="r"></div>
                    <h3 class="t">Artí­culos</h3>
                </div>
                <div class="art-blockcontent">
                    <div class="art-blockcontent-body">
                    <p>&nbsp;</p>
                
<p>&nbsp;</p>
<p>Imagen del Sismograma del Terremoto de Chile, 22/05/1960 <a href="temas-de-interes/chile_brk_sp.gif">
Ver Imagen</a>&nbsp;<a href="temas-de-interes/brk_sp_1960.pdf">Ver Pdf</a></p>
<p>&nbsp;</p>
<p style="color: #ff0000;"})>Nuevo Mapa de sismicidad reciente  <a href="http://seismove.udo.edu.ve/franciscowww/PWSeismove1_1.php">
(ver mapa)</a></p>

                
                                		<div class="cleared"></div>
                    </div>
                </div>
		<div class="cleared"></div>
    </div>
    <div class="art-block-body">
                <div class="art-blockheader">
                    <div class="l"></div>
                    <div class="r"></div>
                    <h3 class="t">Libro</h3>
                </div>
                <div class="art-blockcontent">
                    <div class="art-blockcontent-body">
                
<p>Los Terremotos en Venezuela y sus Origen <a href="temas-de-interes/Los_Terremotos_en_Venezuela.pdf">
(Ver)</a></p>

                
                                		<div class="cleared"></div>
                    </div>
                </div>
		<div class="cleared"></div>
    </div>
    <div class="art-block-body">
                <div class="art-blockheader">
                    <div class="l"></div>
                    <div class="r"></div>
                    <h3 class="t">Descarge App</h3>
                </div>
                <div class="art-blockcontent">
                    <div class="art-blockcontent-body">
                
<a href="https://play.google.com/store/apps/details?id=com.csudo.sismo"><img src="Google-Play.png" width="120" height="37" alt="" /></a>

                
                                		<div class="cleared"></div>
                    </div>
                </div>
		<div class="cleared"></div>
    </div>
    
</div>

                      <div class="cleared"></div>
                    </div>
                    <div class="art-layout-cell art-content">
<div class="art-post">
    <div class="art-post-body">
<div class="art-post-inner art-article">
<h1 class="art-postheader" style="text-align: center">&nbsp;</h1>
                                <h4 class="art-postheader">
                Centro de Sismologí­a &quot;Luis Daniel Beauperthuy Urich&quot;</font></h2>
  <div class="cleared"></div>
                                <div class="art-postcontent">

<p style="text-align:justify;"><br /></p>
<p style="text-align:justify;"><span style="font-family:Georgia;">El Centro de 
Sismologí­a es el organismo encargado de registrar, analizar y estudiar la 
sismicidad y sus conexos en la región Nor-Oriental de Venezuela donde la 
Universidad de Oriente tiene su influencia, por ser ella institución al 
servicio de la República, que debe colaborar a la orientación de la vida del 
paí­s mediante su contribución doctrinaria e investigativa en el 
esclarecimiento de los problemas de las regiones Nor-Oriental y Guayana.</span></p>
<p style="text-align:justify;"><br /></p>
<p>
    <?php

function zonedate($layout, $countryzone, $daylightsaving, $time)
   {
       if($daylightsaving) {
           $daylight_saving = date('I');
           if($daylight_saving){ $zone=3600*($countryzone+1); }
       }
       else {
           if( $countryzone>>0){ $zone=3600*$countryzone; }
           else { $zone=0; }
       }
       if(!$time) { $time = time(); }
       $date = gmdate($layout, $time + $zone);
       return $date;
   }
?>
			  <?php
function RestarHoras($horaini,$horafin)
{
	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);

	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);

	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);

	$dif=$fin-$ini;

	$difh=floor($dif/3600);
	$difm=floor(($dif-($difh*3600))/60);
	$difs=$dif-($difm*60)-($difh*3600);
	return date("H-i-s",mktime($difh,$difm,$difs));
}    


  $fecha = date("Y-m-d", mktime(0, 0, 0, date("m")-3, date("d"), date("Y")));  
  //$fecha = date("l dS of F Y h:i:s A");  
  //print (date("d-m-Y h:i:s A"));  
  //echo date("d-m-Y", mktime(0, 0, 0, date("d"), date("M")-1, date("Y")-2));  
  //$fecha = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-3, date("Y")));  
  //print "Datos desde la fecha: $fecha\n";  
  //$locfecha = mktime(date("H"),date("i"),date("s"),date("Y"),date("m")-1, date("d"));  
  //print "$locfecha";    //$ult_event = 0;
  //Conexion con la base
  mysql_connect("localhost","root","xts74");
  //Ejecucion de la sentencia SQL
  mysql_select_db("siiss");
  //Busquedad del ÃƒÆ’Ã†â€™í€šÃ‚Âºltimo evento sismico
  /*$res_ult = mysql_query("select MAX(idevent) as ultimo from locations WHERE (locations.lon >='-66' AND locations.lon <='-58' AND locations.lat >='8' AND locations.lat <='12')");    
  //if(!$res_ult) {    // echo "Error al buscar el evento sÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­smico";    //} else {     
  // print "AQUI";    while ($row=mysql_fetch_array($res_ult)) {     // $r=mysql_fetch_row($res_ult);      
  $ult_event = $row[ultimo];     //print "$ult_event";          }  */
  //print "$ult_event";
  $query="SELECT locations.idevent,locations.idagency_pris, locations.locdatetime, locations.lat, locations.lon, locations.depth, magnitudes.magnivalue, locations.comments 
FROM locations INNER JOIN magnitudes ON locations.idevent = magnitudes.idevent where ((locations.lon >='-66' AND locations.lon <='-58' AND locations.lat >='8' AND locations.lat <='12') AND locations.locdatetime >= '$fecha') ORDER BY locations.locdatetime ASC";
	//echo $query;
  $result = mysql_query($query);  
//print "SELECT locations.idevent,locations.idagency_pris, locations.locdatetime, locations.lat, locations.lon, locations.depth, magnitudes.magnivalue, locations.comments 
//FROM locations INNER JOIN magnitudes ON locations.idevent = magnitudes.idevent where locations.idevent = '$ult_event'";    
while ($row=mysql_fetch_array($result)) {           
//print "Actividad SÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­smica";
         $latitud=$row[lat];           
         $longitud=$row[lon];           
         $magnitud=$row[magnivalue];           
         $fech = $row[locdatetime];           
         $prof = $row[depth];         
         $comment = $row[comments];        
         }  
         list( $date, $time ) = split( '[ ]', $fech );    
         
         list( $year, $month, $day ) = split( '[-./]', $date );    
         
         list( $HH, $mm, $ss ) = split( '[:]', $time );    
         
         $time = date("d-m-Y H:i:s", mktime($HH-4,$mm,$ss,$month,$day,$year));  
         
         //$fecha = date("Y-m-d", mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));  
         //$time = date("HH:mm:ss", mktime($HH-4, $mm, $ss, 0, 0, 0));      
         //$HH = $HH - 4;  
         //mysql_close();  
         //mail('faove@hotmail.com', 'Centro de SismologÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­a', 'ÃƒÆ’Ã†â€™Ãƒâ€¦Ã‚Â¡ltimo Sismo: ');  
         //mail('vediaz@sucre.udo.edu.ve', 'Centro de SismologÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­a', 'ÃƒÆ’Ã†â€™Ãƒâ€¦Ã‚Â¡ltimo Sismo: Latitud:$latitud Longitud:$longitud Magnitud:$magnitud');    
         ?>
	


<table> </td>
  </tr>
  <tr>
    <td colspan="6">
	Ultimo sismo
	<p align="center">
    <div id="mapa_base" style="width: 650px; height: 300px;"></div>  
    <div id="route" style="width: 300px; height: 500px; position: absolute; right: 0; top: 0;">
    </div></p>
    <table>
				<tr>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-left-style: solid; border-left-width: 0px; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">
					  <font face="Arial Unicode MS" size="1">Fecha / Hora:::</font></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style:none; border-width:medium; "><font face="Arial Unicode MS" size="1">
					Magnitud:</font></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style:none; border-width:medium; "><font face="Arial Unicode MS" size="1">
					Prof:</font></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style:none; border-width:medium; "><font face="Arial Unicode MS" size="1">
					Latitud:</font></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style:none; border-width:medium; "><font face="Arial Unicode MS" size="1">
					Longitud:</font></span></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style:none; border-width:medium; "><font face="Arial Unicode MS" size="1">
					Comentarios</font></td>
					<td height="20" bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style:none; border-width:medium; "><font face="Arial Unicode MS" size="1">
					Mapa</font></td>
			   	</tr>
				<tr>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-left-style: solid; border-left-width: 0px; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium"><span style="border-style:none; border-width:medium; "><?php print "<font face=\"Arial Unicode MS\" size=1>$time</font>";  ?></span></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style: none; border-width: medium"><?php print "<font face=\"Arial Unicode MS\" size=1>$magnitud</font>";  ?></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style: none; border-width: medium"><?php print "<font face=\"Arial Unicode MS\" size=1>$prof</font>";  ?></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style: none; border-width: medium"><?php print "<font face=\"Arial Unicode MS\" size=1>$latitud</font>";  ?></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style: none; border-width: medium"><?php print "<font face=\"Arial Unicode MS\" size=1>$longitud</font>";  ?></span></td>
					<td bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style: none; border-width: medium"><span style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px"><?php print "<font face=\"Arial Unicode MS\" size=1>$comment</font>";  ?></span></td>
					<td height="19" bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-style: none; border-width: medium"><?php
				print "<a href=https://www.google.com/maps/place/$latitud,$longitud><font face=Arial size=1>Ver Mapa con Google</font></a>";
				?></td>
				</tr>
				<tr>
				<td height="19" colspan="7" bordercolor="#FFFFFF" bgcolor="#FFFFFF" style="border-left-style: solid; border-left-width: 0px; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 0px">
				  <p align="center"></td>
                <form name="frm">
					<input name="txtlat" type="hidden" value="<?php print "$latitud"; ?>" size="2">					
					<input name="txtlon" type="hidden" value="<?php print "$longitud"; ?>" size="2">
  			    </form>
</tr>
		</table>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4dcddcb73e3ba0d2"></script>
<!-- AddThis Button END -->        

	<p align="center"></td>
  </tr>
</table> 
<div id="map3d" style="height: 400px; width: 600px;">
<p>&nbsp;

</p>

<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 28,
  interval: 30000,
  width: 655,
  height: 100,
  theme: {
    shell: {
      background: '#5baabc',
      color: '#000000'
    },
    tweets: {
      background: '#ffffff',
      color: '#000000',
      links: '#05baab'
    }
  },
  features: {
    scrollbar: true,
    loop: false,
    live: true,
    behavior: 'all'
  }
}).render().setUser('sismoudo').start();
</script>
</div>
</div>
                <div class="cleared"></div>
               
                </div>

		<div class="cleared"></div>
    </div>
</div>



                      <div class="cleared"></div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="art-footer">
                <div class="art-footer-t"></div>
                <div class="art-footer-l"></div>
                <div class="art-footer-b"></div>
                <div class="art-footer-r"></div>
                <div class="art-footer-body">
                    <a href="./rsscsudo.php" class="art-rss-tag-icon" title="RSS"></a>
                            <div class="art-footer-text">
                                
<p><a href="./index.php">Inicio</a> | <a href="./sismo-recientes.php">
Sismogramas recientes</a> | <a href="./contacto.html">Contacto</a></p>
<p>Año 2017. Centro de Sismologí­a Universidad de Oriente. Ã‚Â® Todos los 
Derechos Reservados.</p>
<p>Dirección: Av. Universidad. Cerro del Medio. Parte Alta del Decanato.</p>
<p>Cumaná, Estado Sucre.</p>
<p>Telf.: (0293) 4515327 - 4516756</p>


                                                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="art-page-footer"><a href="./index.php">Centro de Sismología</a> 
	Universidad de Oriente - Venezuela</p>
</div>

</body>
</html>
