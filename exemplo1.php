<?php
require_once 'simpleReport/core/SRCompileManager.php';
require_once 'simpleReport/core/SRFillManager.php';
require_once 'simpleReport/elements/StaticText.php';

require_once 'simpleReport/core/SimpleDesign.php';
$sd = new SimpleDesign();

require_once 'simpleReport/core/SRBand.php';
$band = new SRBand();
$band->height = 100;

$staticText = new StaticText();
$staticText->text = "Hello World!";

$band->addElement($staticText);
$sd->bandTitle = $band;
$report = SRCompileManager::compile($sd);

$fill = new SRFillManager();
$print = $fill->fillReport($report);
$print->output();
?>