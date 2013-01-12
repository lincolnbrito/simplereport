<?php
require_once 'simpleReport/core/SRParameter.php';
require_once 'simpleReport/Report.php';

SRParameter::set('PARAN1', date('d/m/Y'));
Report::from('docs/example3.jrxml')->outPut();
?>
