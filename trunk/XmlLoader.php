<?php
require_once 'SimpleDesign.php';
require_once 'Band.php';
require_once 'StaticText.php';

class XmlLoader{
	
	public static function load($sourceFileName){
		
		$simpleDesign = new SimpleDesign();
		$simpleDesign->setName('relatorio de teste');
		
		$bandTitle = new Band();
		
		$staticText = new StaticText();
		$staticText->setX(10);
		$staticText->setY(10);
		$staticText->setWidth(100);
		$staticText->setHeight(100);
		$staticText->setText('Hello word!');
		$bandTitle->addElement($staticText);
		
		$simpleDesign->setTitle($bandTitle);
		
		return $simpleDesign;
	}
	
}

?>