<?php 
    $fichero = new DOMDocument();
	$fichero->load( "https://boluda.com/feed/");
	$salida = array(); 
	$terremotos = $fichero->getElementsByTagName("item");
    foreach($terremotos as $entry) {
		$nuevo = array();
		$nuevo["title"] = $entry->getElementsByTagName("title")[0]->nodeValue;
		$nuevo["link"] =  $entry->getElementsByTagName("link")[0]->nodeValue;
		$nuevo["description"] =  $entry->getElementsByTagName("description")[0]->nodeValue;
		$nuevo["lastBuildDate"] =  $entry->getElementsByTagName("lastBuildDate")[0]->nodeValue;	
		$nuevo["language"] =  $entry->getElementsByTagName("language")[0]->nodeValue;
		$nuevo["generator"] =  $entry->getElementsByTagName("generator")[0]->nodeValue;
		$salida[] = $nuevo;
    }
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Últimos terremotos</title>
		<style> table, td, th { border-style: solid} </style>
	</head>
	<body>
		<table>
			<tr><td>Título</td><td>Longitud</td><td>Latitud</td></tr>
			<?php
				foreach($salida as $elemento) {
					$titulo = $elemento["title"];
					$lat = $elemento["link"];
					$lon = $elemento["description"];
					$lie = $elemento["lastBuildDate"];
					$les = $elemento["language"];
					$las = $elemento["language"];
					echo "<tr><td>$titulo</td><td>$lon</td><td>$lat</td><td>$lie</td><td>$les</td><td>$las</td></tr>";
				}
			?>
		</table>
	</body>
</html>