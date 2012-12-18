<?php
/* 
* Licensed to version General Public License (GNU) 3.0
* You will only be able to use this file if you agree to this license.
* See details on this license in http://www.gnu.org/licenses/gpl-3.0.txt
* 
* 
*/

require_once 'simpleReport/core/SimpleDesign.php';
require_once 'simpleReport/core/SRBand.php';
require_once 'simpleReport/elements/StaticText.php';
require_once 'simpleReport/elements/TextField.php';
require_once 'simpleReport/elements/Image.php';
require_once 'simpleReport/elements/Rectangle.php';
require_once 'simpleReport/core/SRColor.php';
require_once 'simpleReport/core/XML2Array.php';

class SRXmlLoader{

	private $sd = null;
	private $xml = null;
	
	private function fillBand($bandName, $bandXML){
				
		if(!isset($bandXML['height']))
			return;
		
		$band = new SRBand();
		$band->height = $bandXML['height'];
		
		foreach ($bandXML as $c => $v){
			if(file_exists('C:/www/SimpleReport/simpleReport/elements/'.$c.'.php')){
				$e = new $c();
				$e->fill($v);
				$band->addElement($e);
			}
		}
		
		$a = 'band'.ucfirst($bandName);
		$this->sd->$a = $band;
	}
	
	public function load($sourceFileName){

		if(!is_file($sourceFileName)){
			echo 'Arquivo nao encontrado';
			exit;
		}
		
		$xmlArray = XML2Array::convert(file_get_contents($sourceFileName));
			
		$this->sd = new SimpleDesign();
		$this->sd->name = $xmlArray['name'];
		$this->sd->width = $xmlArray['pageWidth'];
		$this->sd->heigth = $xmlArray['pageHeight'];
		$this->sd->topMargin = $xmlArray['topMargin'];
		$this->sd->rightMargin = $xmlArray['rightMargin'];
		$this->sd->leftMargin = $xmlArray['leftMargin'];
		$this->sd->bottomMargin = $xmlArray['bottomMargin'];

		foreach($xmlArray as $c => $v){
			switch ($c){
				case 'title':
				case 'pageHeader':
				case 'columnHeader':
					$this->fillBand($c, $v['band']);
					break;
			}
		}
				
		/*
		$this->xml = simplexml_load_file($sourceFileName);
		$this->sd = new SimpleDesign();
		$this->sd->name = 'nome';
		$this->sd->width = 535;
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
		*/
		
		return $this->sd;
		
	}

}
?>