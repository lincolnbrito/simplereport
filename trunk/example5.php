<?php
require_once 'simpleReport/core/SRXmlLoader.php';
require_once 'simpleReport/core/SRCompileManager.php';
require_once 'simpleReport/core/SRFillManager.php';
require_once 'simpleReport/core/SimpleDesign.php';
require_once 'simpleReport/core/SRBand.php';
require_once 'simpleReport/elements/StaticText.php';
require_once 'simpleReport/elements/TextField.php';
require_once 'simpleReport/elements/Image.php';
require_once 'simpleReport/elements/Rectangle.php';
require_once 'simpleReport/core/SRColor.php';

$sd = new SimpleDesign();
$sd->name = 'Report';

$sd->width = 595;
$sd->heigth = 842;
$sd->topMargin = 20;
$sd->rightMargin = 20;
$sd->leftMargin = 20;
$sd->bottomMargin = 20;

// INICIO  - BANDA TITLE
$bandTitle = new SRBand();
$bandTitle->height = 84;

$image = new Image();
$image->imageExpression = 'C:\Users\anderson\Desktop\logo.png';
$image->x = 233;
$image->y = 0;
$image->width = 84;
$image->height = 31;
$bandTitle->addElement($image);

$staticText1 = new StaticText();
$staticText1->text = "Texto na banda title alinhado a direita";
$staticText1->x = 0;
$staticText1->y = 31;
$staticText1->width = 555;
$staticText1->height = 38;
$staticText1->isBold = true;
$staticText1->isItalic = true;
$staticText1->textAlignment = 'R';
$staticText1->fontSize = 20;
$bandTitle->addElement($staticText1);

$sd->bandTitle = $bandTitle;
// FIM  - BANDA TITLE


// INICIO - BANDA PAGE HEADER
$pageHeader = new SRBand();
$pageHeader->height = 35;
$staticText1 = new StaticText();
$staticText1->text = "Page Header";
$staticText1->x = 0;
$staticText1->y = 0;
$staticText1->width = 555;
$staticText1->height = 35;
$staticText1->textAlignment = 'C';
$staticText1->fontSize = 16;
$pageHeader->addElement($staticText1);
$sd->bandPageHeader = $pageHeader;
// FIM - BANDA PAGE HEADER


// INICIO -  BANDA COLUMN HEADER
$columnHeader = new SRBand();
$columnHeader->height = 50;
$staticText1 = new StaticText();
$staticText1->text = "Codigo";
$staticText1->x = 0;
$staticText1->y = 0;
$staticText1->width = 82;
$staticText1->height = 32;
$staticText1->fontSize = 20;
$staticText1->isBold = true;
$columnHeader->addElement($staticText1);

$staticText2 = new StaticText();
$staticText2->text = "Nome";
$staticText2->x = 95;
$staticText2->y = 0;
$staticText2->width = 460;
$staticText2->height = 32;
$staticText2->fontSize = 20;
$staticText2->isBold = true;
$columnHeader->addElement($staticText2);

$sd->bandColumnHeader = $columnHeader;
// FIM -  BANDA COLUMN HEADER


// INICIO - BANDA PAGE FOOTER
$pageFooter = new SRBand();
$pageFooter->height = 27;
$staticText1 = new StaticText();
$staticText1->text = "Page Footer";
$staticText1->x = 0;
$staticText1->y = 0;
$staticText1->width = 555;
$staticText1->height = 35;
$staticText1->textAlignment = 'C';
$staticText1->fontSize = 16;
$pageFooter->addElement($staticText1);
$sd->bandPageFooter = $pageFooter;
// FIM - BANDA PAGE FOOTER


// INICIO - BANDA LAST PAGE FOOTER
$lastPageFooter = new SRBand();
$lastPageFooter->height = 27;
$staticText1 = new StaticText();
$staticText1->text = "Last Page Footer";
$staticText1->x = 0;
$staticText1->y = 0;
$staticText1->width = 555;
$staticText1->height = 35;
$staticText1->textAlignment = 'C';
$staticText1->fontSize = 16;
$lastPageFooter->addElement($staticText1);
$sd->bandLastPageFooter = $lastPageFooter;
// FIM - BANDA LAST PAGE FOOTER


// INICIO - BANDA SUMMARY
$summary = new SRBand();
$summary->height = 27;
$staticText1 = new StaticText();
$staticText1->text = "Summary";
$staticText1->x = 0;
$staticText1->y = 0;
$staticText1->width = 555;
$staticText1->height = 35;
$staticText1->textAlignment = 'C';
$staticText1->fontSize = 16;
$summary->addElement($staticText1);
$sd->bandSummary = $summary;
// FIM - BANDA SUMMARY

$report = SRCompileManager::compile($sd, 'Report');

$fill = new SRFillManager();
$print = $fill->fillReport($report);
$print->output();
?>