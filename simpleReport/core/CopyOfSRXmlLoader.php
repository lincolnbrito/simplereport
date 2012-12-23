<?php
/*
Copyright 2013 SimpleReport

Este arquivo é parte do SimpleReport

SimpleReport é uma biblioteca livre; você pode redistribui-lo e/ou
modifica-lo dentro dos termos da Licença Pública Geral GNU como
publicada pela Fundação do Software Livre (FSF); na versão 3 da
Licença, ou qualquer outra versão.

Este programa é distribuido na esperança que possa ser util,
mas SEM NENHUMA GARANTIA; sem uma garantia implicita de ADEQUAÇÂO a qualquer
MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
Licença Pública Geral GNU para maiores detalhes.

Você encontrará uma cópia da Licença Pública Geral GNU no diretório
license/COPYING.txt, se não, entre em <http://www.gnu.org/licenses/>
*/

require_once 'simpleReport/core/SimpleDesign.php';
require_once 'simpleReport/core/SRBand.php';
require_once 'simpleReport/core/SRParameter.php';
require_once 'simpleReport/elements/StaticText.php';
require_once 'simpleReport/elements/TextField.php';
require_once 'simpleReport/elements/Image.php';
require_once 'simpleReport/elements/Rectangle.php';
require_once 'simpleReport/elements/Frame.php';
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

		/*
		$dom = new DOMDocument();
		$ret = array();
		if(!@$dom->loadXML(utf8_encode($source)))
			return array();
		return XML2Array::getArray($dom->documentElement);
		*/
		
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
				
				// PARAMETERS
				case 'parameter':
					// $v['class'] -> java.lang.Boolean					
					if(isset($v['defaultValueExpression']['#cdata-section'])){
						SRParameter::set($v['name'], $v['defaultValueExpression']['#cdata-section']==='true');
					}
					break;

					
				// BANDS
				case 'title':
				case 'pageHeader':
				case 'columnHeader':
				case 'detail':
				case 'columnFooter':
				case 'pageFooter':
				case 'lastPageFooter':
				case 'summary':
					
					$this->fillBand($c, $v['band']);
					break;
				
			}
		}
				
//		echo '<pre>'; print_r($this->sd->parameters); echo '</pre>';exit;
		return $this->sd;
	}
}
?>