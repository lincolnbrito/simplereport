<?php
include 'simpleReport/core/SRXmlLoader.php';
include 'simpleReport/core/SRCompileManager.php';
include 'simpleReport/core/SRFillManager.php';

/*
 * Obtem uma instancia da classe SimpleDesign
 * Nesse momento o arquivo xml é interpretado e analisado
 */
$design = SRXmlLoader::load('report.jrxml');

/*
 * Obtem uma intancia da classe SimpleReport
 * SimpleReport representa o relatorio serializado
 * 
 * Se você já tem o arquivo serializado é só usar assim
 * $report = SRGetInstanceSimpleReport('report.sr');
 * 
 */

$report = SRCompileManager::compile($design);


$conexao = mysql_connect('localhost', 'root', 'root');
$db_selected = mysql_select_db('buscaoffshore', $conexao);
$consulta = mysql_query('select * from empresas', $conexao);
$dados = array();
while($r = mysql_fetch_assoc($consulta)){
	$dados[] = array($r['id'], $r['nome']);
}


SRFillManager::fillReport($report)->show();
?>