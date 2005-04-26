<?php
	require('SOAP/Client.php');

    echo date('Y-m-d H:i:s')."\n\n";

	// Descripcion de la API
	$wsdl_url = 'http://www.xmethods.net/sd/2001/CurrencyExchangeService.wsdl';
	$WSDL = new SOAP_WSDL($wsdl_url);

	// Generemos un proxy local
	$proxy = $WSDL->getProxy(); 
	
    // Busquemos el factor de conversion de
    // dolares a euros
	$result = $proxy->getRate('usa', 'euro');
    echo "Multiplicar dolares por $result para tener euros\n";

    // soles a marcos
    $result = $proxy->getRate('peru', 'germany');
    echo "Multiplicar soles por $result para tener marcos\n";
 
    // Convertir 100 euros a yuen
    $result = $proxy->getRate('euro', 'china');
    echo "100 euros son ".(100 * $result)." yuan\n";
?>
