<?php
require_once 'XmlLoader.php';
require_once 'SimpleReport.php';
require_once 'SimpleSerializeManager.php';
require_once 'MontaRelatorio.php';

if(file_exists('report.sr')){
	$design = unserialize(file_get_contents('report.sr'));
}else{
	$design = XmlLoader::load('report.jrxml');
}
 
$print = MontaRelatorio::desenha($design);
$print->imprimir();
?>