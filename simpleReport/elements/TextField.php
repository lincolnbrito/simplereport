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

class TextField extends SRTextElements{

	public $textFieldExpression;
	
	public function fill($xml){
	
		if(substr($xml['textFieldExpression']['#cdata-section'], 0, 3) == '$F{' && substr($xml['textFieldExpression']['#cdata-section'], -1) == '}'){
			$xml['textFieldExpression']['#cdata-section'] = substr($xml['textFieldExpression']['#cdata-section'], 3, -1);
		}
		
		$this->textFieldExpression = $xml['textFieldExpression']['#cdata-section'];
		$this->x = $xml['reportElement']['x'];
		$this->y = $xml['reportElement']['y'];
		$this->width = $xml['reportElement']['width'];
		$this->height = $xml['reportElement']['height'];
	
		$this->textAlignment = $xml['textElement']['textAlignment'];
	
		$this->isBold = $xml['textElement']['font']['isBold'];
		$this->isItalic = $xml['textElement']['font']['isItalic'];
		$this->fontSize = $xml['textElement']['font']['size'];
	
		$this->forecolor = SRColor::obtemRGB(@$xml['reportElement']['forecolor']);
		$this->backcolor = SRColor::obtemRGB(@$xml['reportElement']['backcolor']);
		$this->paintBackground = @$xml['reportElement']['mode']=='Opaque';
	
	}
	
	public function draw(&$pdf){
	
		$style = '';
		$style .=  $this->isBold? 'B' : '';
		$style .=  $this->isItalic? 'I' : '';
		$style .=  $this->isUnderline? 'U' : '';
		$pdf->SetFont('Arial', $style, $this->fontSize);
		
		$pdf->SetXY($this->x,$this->y);
		$pdf->Cell($this->width,$this->height,$this->textFieldExpression, 0, 0, $this->textAlignment);
		
	}
	
}


?>