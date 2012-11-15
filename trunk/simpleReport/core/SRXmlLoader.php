<?php
include 'simpleReport/SimpleDesign.php';
include 'simpleReport/core/SRBand.php';
include 'simpleReport/elements/StaticText.php';

abstract class SRXmlLoader{
	
	public static function load($sourceFileName){

		/**
		 * Criando um relatório no braço
		 * Depois que eu tiver com a estrutura toda consolidade pegar
		 * os dados do XML é o de menos
		 */
		$sd = new SimpleDesign();
		
		$sd->setName("Report");
		$sd->setLeftMargin(50);
		$sd->setRightMargin(50);
		$bandTitle = new SRBand();
		
		$staticText1 = new StaticText();
		$staticText1->setText("Static Text 1!");
		$staticText1->setX(10);
		$staticText1->setY(10);
		$staticText1->setWidth(100);
		$staticText1->setHeight(50);
		$bandTitle->addElement($staticText1);
		
		$staticText2 = new StaticText();
		$staticText2->setText("Static Text 2!");
		$staticText2->setX(100);
		$staticText2->setY(10);
		$staticText2->setWidth(100);
		$staticText2->setHeight(50);
		$bandTitle->addElement($staticText2);
		
		$sd->setBandTitle($bandTitle);
		
		return $sd;
		
	}
	
}
?>
