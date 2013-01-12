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
require_once 'simpleReport/core/SRTextElement.php';
require_once 'simpleReport/core/SRColor.php';

class StaticText extends SRTextElements{

	public $text;
	public $paintBackground;
	
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
					$this->paintBackground = (String)$element['mode']=='Opaque';
					break;
				case 'textElement':
					$this->textAlignment = (String)$element['textAlignment'];
					$this->fontSize = (String)$element->font['size'];
					$this->isBold = (String)$element->font['isBold'];
					$this->isItalic = (String)$element->font['isItalic'];
					break;
				case 'text':
					$this->text = utf8_decode((String)$element);
					break;
			}

		}
	}
	
	public function draw(&$pdf){
		
		$style = '';
		$style .=  $this->isBold? 'B' : '';
		$style .=  $this->isItalic? 'I' : '';
		$style .=  $this->isUnderline? 'U' : '';
		$pdf->SetFont('Arial', $style, $this->fontSize);
		
		if(!empty($this->forecolor)){
			$pdf->SetTextColor($this->forecolor[0],$this->forecolor[1],$this->forecolor[2]);
		}
		if(!empty($this->backcolor)){
			$pdf->SetFillColor($this->backcolor[0],$this->backcolor[1],$this->backcolor[2]);
		}
		
		switch ($this->textAlignment){
			case 'Center':
				$this->textAlignment = 'C';
				break;
			case 'Left':
				$this->textAlignment = 'L';
				break;
			case 'Right':
				$this->textAlignment = 'R';
				break;
		}
		
		$pdf->SetXY($this->x,$this->y);
		$pdf->Cell($this->width,$this->height,$this->text, 0, 0, $this->textAlignment, $this->paintBackground);
	}
	
}

?>