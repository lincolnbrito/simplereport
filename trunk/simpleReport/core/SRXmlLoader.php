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