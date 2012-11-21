<?php
include 'simpleReport/SimpleDesign.php';
include 'simpleReport/core/SRBand.php';
include 'simpleReport/elements/StaticText.php';
include 'simpleReport/elements/TextField.php';

abstract class SRXmlLoader{
	
	public static function load($sourceFileName){

		/**
		 * Criando um relatório no braço
		 * Depois que eu tiver com a estrutura toda consolidade pegar
		 * os dados do XML é o de menos
		 */
		$sd = new SimpleDesign();

		$sd->setName("Report");
		$sd->setTopMargin(20);
		$sd->setLeftMargin(20);
		$sd->setRightMargin(20);
		$sd->setQueryText("select nome from empresas");
		
		// BANDA TITLE
		$bandTitle = new SRBand();
		$bandTitle->setHeight(79);
		$staticText1 = new StaticText();
		$staticText1->setText("Static text 1 band title");
		$staticText1->setX(0);
		$staticText1->setY(0);
		$staticText1->setWidth(100);
		$staticText1->setHeight(20);
		$staticText1->setForecolor('#990000');
		$bandTitle->addElement($staticText1);
		unset($staticText1);
		$staticText1 = new StaticText();
		$staticText1->setText("Static text 2 Band title");
		$staticText1->setX(152);
		$staticText1->setY(33);
		$staticText1->setWidth(100);
		$staticText1->setHeight(20);
		$staticText1->setForecolor('#990000');
		$bandTitle->addElement($staticText1);
		$sd->setBandTitle($bandTitle);
		
		// BANDA PAGE HEADER
		$pageHeader = new SRBand();
		$pageHeader->setHeight(35);
		$staticText1 = new StaticText();
		$staticText1->setText("Static text 1 Band Page Header");
		$staticText1->setX(22);
		$staticText1->setY(33);
		$staticText1->setWidth(100);
		$staticText1->setHeight(20);
		$staticText1->setForecolor('#990000');
		$pageHeader->addElement($staticText1);
		$sd->setBandPageHeader($pageHeader);
		
		// BANDA COLUMN HEADER
		$columnHeader = new SRBand();
		$columnHeader->setHeight(28);
		$sd->setBandColumnHeader($columnHeader);
		
		// BANDA DETAIL
		$detail = new SRBand();
		$detail->setHeight(30);
		$textField = new TextField();
		$textField->setTextFieldExpression('nome');
		$textField->setX(0);
		$textField->setY(0);
		$textField->setWidth(100);
		$textField->setHeight(20);
		$detail->addElement($textField);
		$sd->setBandDetail($detail);
		
		// BANDA COLUMN FOOTER
		$columnFooter = new SRBand();
		$columnFooter->setHeight(30);
		$sd->setBandColumnFooter($columnFooter);
		
		// BANDA PAGE FOOTER
		$pageFooter = new SRBand();
		$pageFooter->setHeight(30);
		$sd->setBandPageFooter($pageFooter);
		
		// BANDA PAGE FOOTER
		$summary = new SRBand();
		$summary->setHeight(30);
		$sd->setBandSummary($summary);
		
		return $sd;
	}
	
}
?>
