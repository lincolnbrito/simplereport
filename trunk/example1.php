<?php
require_once 'simpleReport/Report.php';
if($_GET['d'] == 'S')
	Report::from('docs/example1.jrxml')->export();
else
	Report::from('docs/example1.jrxml')->outPut();
?>