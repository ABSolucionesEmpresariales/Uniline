<?php
//En esta parte agregar No. Certificado y certificado al XML obtenidos de la base de datos.

$KeyPem = "SATDocs/Claveprivada_FIEL_CACX7605101P8_20190528_152826.key.pem";//Esta ruta se obtiene con la base de datos.
$nombreXML = "RFC-FechaHora";//El nombre (y la ruta) se obtiene de la base de datos o se podria mandar con un POST.

//CADENA ORIGINAL
$xmlFile="invoices/".$nombreXML.".xml";
$xslFile = "XSL.xslt";
$xml = new DOMDocument("1.0","UTF-8");
$xml->load($xmlFile);
$xsl = new DOMDocument();
$xsl->load($xslFile);
$proc = new XSLTProcessor;
error_reporting(E_ALL ^ E_WARNING);//Desactivamos los Warnings de PHP para que solo se muestre la cadena original y se borre toda la cagada de PHP.
$proc->importStyleSheet($xsl);
$cadenaOriginal = $proc->transformToXML($xml);
$file = 'tmp/'.$nombreXML.'-cadena_original.txt';
file_put_contents($file, $cadenaOriginal);

//echo $cadenaOriginal;
error_reporting(-1);//Volvemos a activar los Warnings de PHP para debuggear.

//SELLADO
shell_exec('openssl dgst -sha256 -sign '.$KeyPem.' -out "tmp/'.$nombreXML.'-digest.txt" "tmp/'.$nombreXML.'-cadena_original.txt"');
shell_exec('openssl enc -in "tmp/'.$nombreXML.'-digest.txt" -out "tmp/'.$nombreXML.'-sello.txt" -base64 -A -K '.$KeyPem);

$sello = readfile('tmp/'.$nombreXML.'-sello.txt');
//echo $sello;

//Agregar sello al XML

//Guardar el XML
//Guardar el registro en la tabla facturas
//Mandar a timbrar el xml

//Borrar archivos generados en el tmp
unlink("tmp/".$nombreXML."-cadena_original.txt");
unlink("tmp/".$nombreXML."-digest.txt");
unlink("tmp/".$nombreXML."-sello.txt");