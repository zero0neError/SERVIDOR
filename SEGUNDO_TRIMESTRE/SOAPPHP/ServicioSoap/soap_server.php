<?php
require 'HolaServicio.php';
$server= new SoapServer('callback3.wsdl');
$server->setClass('HolaServicio');
$server->handle();