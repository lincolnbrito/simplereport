<?php
require_once 'simpleReport/core/SimpleDesign.php';
require_once 'simpleReport/core/SRBand.php';
require_once 'simpleReport/elements/StaticText.php';
require_once 'simpleReport/elements/TextField.php';
require_once 'simpleReport/elements/Image.php';
require_once 'simpleReport/elements/Rectangle.php';
require_once 'simpleReport/core/SRColor.php';
class SRXmlLoader{
	
	private $sd = null;
	
	public function load($sourceFileName){
		
		$this->sd = new SimpleDesign();
		$this->sd->name = 'Report';
		$this->sd->queryText = 'select * from alunos';
		
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
		$staticText1->width = 150;
		$staticText1->height = 20;
		$staticText1->isBold = true;
		$staticText1->isItalic = true;
		$staticText1->textAlignment = 'L';
		$staticText1->fontSize = 20;
		$bandTitle->addElement($staticText1);
		
		$image = new Image();
		$image->imageExpression = 'C:\Users\anderson\Desktop\logo.png';
		$image->x = 300;
		$image->y = 0;
		$bandTitle->addElement($image);
		$this->sd->bandTitle = $bandTitle;
		
		
		// BANDA PAGE HEADER
		$pageHeader = new SRBand();
		$pageHeader->height = 100;
		$staticText1 = new StaticText();
		$staticText1->text = "Static text 1 band title";
		$staticText1->x = 0;
		$staticText1->y = 0;
		$staticText1->width = 120;
		$staticText1->height = 20;
		$staticText1->forecolor = SRColor::obtemRGB('#FF0000');
		$staticText1->backcolor = SRColor::obtemRGB('#00FF00');
		$staticText1->paintBackground = true;
		$staticText1->textAlignment = 'R';
		$pageHeader->addElement($staticText1);
		
		$rectangle = new Rectangle();
		$rectangle->x = 200;
		$rectangle->y = 00;
		$rectangle->width = 200;
		$rectangle->height = 50;
		$rectangle->forecolor = SRColor::obtemRGB('#FF0000');
		$rectangle->backcolor = SRColor::obtemRGB('#00FF00');
		
		$pageHeader->addElement($rectangle);
		
		$this->sd->bandPageHeader = $pageHeader;
		
		// BANDA COLUMN HEADER
		$columnHeader = new SRBand();
		$columnHeader->height = 50;
		$this->sd->bandColumnHeader = $columnHeader;
		
		// BANDA DETAIL
		$detail = new SRBand();
		$detail->height = 20;
		$field = new TextField();
		$field->x = 10;
		$field->y = 0;
		$field->width = 100;
		$field->height = 20;
		$field->textFieldExpression =  'id';
		$detail->addElement($field);
		unset($field);
		$field = new TextField();
		$field->x = 30;
		$field->y = 0;
		$field->width = 100;
		$field->height = 20;
		$field->textFieldExpression = 'nome';
		$detail->addElement($field);
		unset($field);
		$this->sd->bandDetail = $detail;
		
		// BANDA COLUMN FOOTER
		$columnFooter = new SRBand();
		$columnFooter->height = 90;
		$staticText1 = new StaticText();
		$staticText1->text = "Static text 1 band column footer";
		$staticText1->x = 0;
		$staticText1->y = 0;
		$staticText1->width = 120;
		$staticText1->height = 20;
		$staticText1->forecolor = SRColor::obtemRGB('#FF0000');
		$staticText1->backcolor = SRColor::obtemRGB('#00FF00');
		$staticText1->paintBackground = true;
		$columnFooter->addElement($staticText1);
		$this->sd->bandColumnFooter = $columnFooter;
		
		// BANDA PAGE FOOTER
		$pageFooter = new SRBand();
		$pageFooter->height = 60;
		$this->sd->bandPageFooter = $pageFooter;
		
		// BANDA PAGE FOOTER
		$summary = new SRBand();
		$summary->height = 30;
		$this->sd->bandSummary = $summary;
		
		return $this->sd;	
	}
	
	
	
}
?>