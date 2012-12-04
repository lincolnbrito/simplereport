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
		
		$this->sd->width = 595;
		$this->sd->heigth = 842;
		$this->sd->topMargin = 20;
		$this->sd->rightMargin = 20;
		$this->sd->leftMargin = 20;
		$this->sd->bottomMargin = 20;

		$bandTitle = new SRBand();
		$bandTitle->height = 842;

		// IMAGE
		$image = new Image();
		$image->imageExpression = 'C:\Users\anderson\Desktop\phplogo.png';
		$image->x = 0;
		$image->y = 0;
		$image->width = 128;
		$image->height = 128;
		$bandTitle->addElement($image);
		
		// STATIC TEXT SIMPLES
		$staticText = new StaticText();
		$staticText->text = "Static text simples";
		$staticText->x = 0;
		$staticText->y = 150;
		$staticText->width = 555;
		$staticText->height = 38;
		$staticText->isBold = true;
		$staticText->isItalic = true;
		$staticText->textAlignment = 'L';
		$staticText->fontSize = 12;
		$bandTitle->addElement($staticText);

		// STATIC TEXT CUSTOMIZADO
		$staticText = new StaticText();
		$staticText->text = "Static text colorido";
		$staticText->x = 0;
		$staticText->y = 200;
		$staticText->width = 555;
		$staticText->height = 38;
		$staticText->isBold = true;
		$staticText->isItalic = true;
		$staticText->textAlignment = 'L';
		$staticText->fontSize = 20;
		$staticText->forecolor = SRColor::obtemRGB('#FFF');
		$staticText->backcolor = SRColor::obtemRGB('#17007b');
		$staticText->paintBackground = true;
		$bandTitle->addElement($staticText);
		
		// RETANGULO		
		$rectangle = new Rectangle();
		$rectangle->x = 0;
		$rectangle->y = 260;
		$rectangle->width = 200;
		$rectangle->height = 50;
		$rectangle->forecolor = SRColor::obtemRGB('#000');
		$rectangle->backcolor = SRColor::obtemRGB('#b9a9ff');
		$bandTitle->addElement($rectangle);
		
		$this->sd->bandTitle = $bandTitle;

		return $this->sd;
	}

}
?>