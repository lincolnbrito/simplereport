<?php
require_once 'simpleReport/core/SimpleDesign.php';
require_once 'simpleReport/core/SimpleReport.php';
require_once 'simpleReport/core/SRXmlLoader.php';
require_once 'simpleReport/core/SRCompileManager.php';
require_once 'simpleReport/core/SRFillManager.php';
require_once 'simpleReport/core/SRDataSource.php'; 

if(file_exists('docs/example2.sr')){
	$report = SRInstanceManager::getInstance(file_get_contents('docs/example2.sr'));
}else{
	$load = new SRXmlLoader();
	$design = $load->load('docs/example2.jrxml');
	$report = SRCompileManager::compile($design, 'example');
}

$link_identifier = mysql_connect('localhost', 'root', 'root');
$db_selected = mysql_select_db('tads', $link_identifier);
$result = mysql_query('select * from alunos', $link_identifier);

$dados = SRDataSource::getInstance('MySQL', $result);

$fill = new SRFillManager();
$print = $fill->fillReport($report, $dados);

$print->outPut();
?>