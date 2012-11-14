<?php
require_once 'XmlLoader.php';
require_once 'SimpleReport.php';
require_once 'SimpleSerializeManager.php';

$design = XmlLoader::load('report.jrxml'); 

$report = SimpleSerializeMananger::compileReport($design);


?>