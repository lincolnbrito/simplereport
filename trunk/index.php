<?php
/** 
 * 
 * Problemas no desenvolvimento
 * 
 *  -> ANALISE
 *  
 *  Fail/Fast
 *  Itarator
 *  Factory static
 *  
 * - Um Elemento dentro do outro [futuro]
 * - Converter XML para Array 
 * - Iterator / Fonte de dados [feito]  
 * - printWhenExpression
 * - parametros 
 * - Conversão de tipos [não será feito]
 * - Retornos de erros [morte - fail/fast]
 * - Mysql dentro do ireport [solução seria utulizar o PearDB]
*/

require_once 'simpleReport/core/SRParameter.php';
require_once 'simpleReport/core/SRDataSource.php';
require_once 'simpleReport/Report.php';

SRParameter::set('OPA', true);



$link_identifier = mysql_connect('localhost', 'root', 'root');
$db_selected = mysql_select_db('tads', $link_identifier);
$result = mysql_query('select * from alunos', $link_identifier);

Report::from('report2.jrxml', SRDataSource::getInstance('MySQL', $result))->outPut();


/*
$result = fopen("pessoas.csv", "r");
$obj = SRDataSource::getInstance('CSV', $result);
while($r = $obj->next())
	echo '<pre>'; print_r($r); echo '</pre>';
*/

?>