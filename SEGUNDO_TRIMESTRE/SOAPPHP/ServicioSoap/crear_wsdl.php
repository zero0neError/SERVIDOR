<?php
require_once './vendor/autoload.php';
include 'HolaServicio.php';
$class = "HolaServicio";
$serviceURI = "http://localhostSERVIDOR/SEGUNDO_TRIMESTRE/SOAPPHP/ServicioSoap/";
$wsdlGenerator = new \PHP2WSDL\PHPClass2WSDL($class, $serviceURI);
// Generate the WSDL from the class adding only the public methods that have @soap annotation.
$wsdlGenerator->generateWSDL(true);
// Dump as string
$wsdlXML = $wsdlGenerator->dump();
// Or save as file
$wsdlXML = $wsdlGenerator->save('callback3.wsdl');