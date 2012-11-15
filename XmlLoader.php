<?php
require_once 'SimpleDesign.php';
require_once 'Band.php';
require_once 'StaticText.php';

class XmlLoader{
	
	public static function load($sourceFileName){
		
		$simpleDesign = new SimpleDesign();
		list($name, $ext) = explode('.', $sourceFileName);
		$simpleDesign->setName($name);
		
		$bandTitle = new Band();
		$staticText = new StaticText();
		$staticText->setX(10);
		$staticText->setY(10);
		$staticText->setWidth(100);
		$staticText->setHeight(100);
		$staticText->setText('Hello word2!');
		$bandTitle->addElement($staticText);
		unset($staticText);
		
		$simpleDesign->setBandTitle($bandTitle);
		unset($bandTitle);
		
		file_put_contents($simpleDesign->getName().'.sr', serialize($simpleDesign));
		return $simpleDesign;
	}
	
}

?>