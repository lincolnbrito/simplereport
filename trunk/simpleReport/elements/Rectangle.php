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
require_once 'simpleReport/core/SRElements.php';
require_once 'simpleReport/core/SRParameter.php';

class Rectangle extends SRElements{
		
	public function fill(SimpleXMLElement $xml){
	
		foreach ($xml as $elementName => $element){
			switch($elementName){
				case 'reportElement':
					$this->x = (String)$element['x'];
					$this->y = (String)$element['y'];
					$this->width = (String)$element['width'];
					$this->height = (String)$element['height'];
					
					if(isset($element['forecolor']))
						$this->forecolor = SRColor::obtemRGB((String)$element['forecolor']);
					if(isset($element['backcolor']))
						$this->backcolor = SRColor::obtemRGB((String)$element['backcolor']);
					break;
			}
		}
		
	}
	
	public function draw(&$pdf){

		$tp = '';
		
		if(!empty($this->forecolor)){
			$pdf->SetDrawColor($this->forecolor[0],$this->forecolor[1],$this->forecolor[2]);
			$tp .= 'D';
		}
		
		if(!empty($this->backcolor)){
			$pdf->SetFillColor($this->backcolor[0],$this->backcolor[1],$this->backcolor[2]);
			$tp .= 'F';
		}
		
		$pdf->Rect($this->x,$this->y,$this->width,$this->height, $tp);
		
	}
	
}

?>
