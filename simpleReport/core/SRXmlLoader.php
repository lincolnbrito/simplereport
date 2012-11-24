<?php
require_once 'simpleReport/SimpleDesign.php';
require_once 'simpleReport/core/SRBand.php';
require_once 'simpleReport/elements/StaticText.php';
require_once 'simpleReport/elements/TextField.php';
require_once 'simpleReport/elements/Image.php';

class SRXmlLoader{
	
	private $sd = null;
	
	public function load($sourceFileName){
		
		$this->sd = new SimpleDesign();
		$this->sd->name = 'Report';
		$this->sd->width = 595;
		$this->sd->heigth = 842;
		$this->sd->topMargin = 20;
		$this->sd->rightMargin = 20;
		$this->sd->leftMargin = 20;
		$this->sd->bottomMargin = 20;
		
		// BANDA TITLE
		$bandTitle = new SRBand();
		$bandTitle->height = 100;
		$staticText1 = new StaticText();
		$staticText1->text = "Static text 1 band title";
		$staticText1->x = 0;
		$staticText1->y = 0;
		$staticText1->width = 100;
		$staticText1->height = 20;
		$bandTitle->addElement($staticText1);
		
		$image = new Image();
		$image->imageExpression = 'C:\www\SimpleReport\chart.png';
		$image->x = 200;
		$image->y = 0;
		$image->width = 250;
		$image->height = 100;
		$bandTitle->addElement($image);
		$this->sd->bandTitle = $bandTitle;
		
		// BANDA PAGE HEADER
		$pageHeader = new SRBand();
		$pageHeader->height = 35;
		$staticText1 = new StaticText();
		$staticText1->text = "Static text 1 band title";
		$staticText1->x = 0;
		$staticText1->y = 0;
		$staticText1->width = 100;
		$staticText1->height = 20;
		$pageHeader->addElement($staticText1);
		$this->sd->bandPageHeader = $pageHeader;
		
		// BANDA COLUMN HEADER
		$columnHeader = new SRBand();
		$columnHeader->height = 28;
		$this->sd->bandColumnHeader = $columnHeader;
		
		// BANDA DETAIL
		$detail = new SRBand();
		$detail->height = 30;
		$this->sd->bandDetail = $detail;
		
		// BANDA COLUMN FOOTER
		$columnFooter = new SRBand();
		$columnFooter->height = 30;
		$this->sd->bandColumnFooter = $columnFooter;
		
		// BANDA PAGE FOOTER
		$pageFooter = new SRBand();
		$pageFooter->height = 30;
		$this->sd->bandPageFooter = $pageFooter;
		
		// BANDA PAGE FOOTER
		$summary = new SRBand();
		$summary->height = 30;
		$this->sd->bandSummary = $summary;
		
		return $this->sd;	
	}
	
	
	
}
?>