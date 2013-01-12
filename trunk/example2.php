<?php
require_once 'simpleReport/core/SRParameter.php';
require_once 'simpleReport/core/SRDataSource.php';
require_once 'simpleReport/Report.php';

$link_identifier = mysql_connect('localhost', 'root', 'root');
$db_selected = mysql_select_db('tads', $link_identifier);
$result = mysql_query('select * from alunos', $link_identifier);

Report::from('docs/example2.jrxml', SRDataSource::getInstance('MySQL', $result))->outPut();
?>