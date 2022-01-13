<?php
$client = new SoapClient('http://localhost/SERVIDOR/SEGUNDO_TRIMESTRE/SOAPPHP/ServicioSoap/callback3.wsdl',array(
      'location' => "http://localhost/SERVIDOR/SEGUNDO_TRIMESTRE/SOAPPHP/ServicioSoap/soap_server.php",
      'uri'      => "http://localhost/SERVIDOR/SEGUNDO_TRIMESTRE/SOAPPHP/ServicioSoap/",
      'trace'    => 1
       ));
try {
      $functions = $client->__getFunctions();
      var_dump ($functions);
	echo $return = $client->__soapCall("traeUsuarios",["posicion" => 0]);
} catch ( SOAPFault $e ) {
	echo $e->getMessage().PHP_EOL;
}