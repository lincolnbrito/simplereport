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

class Image extends SRElements{

	public $imageExpression;
	public $extension;
	
	public function fill($xml){
	
		$xml['imageExpression']['#cdata-section'] = str_replace('"', '', $xml['imageExpression']['#cdata-section']); 
		$this->extension = substr($xml['imageExpression']['#cdata-section'], -3);
		$this->imageExpression = $xml['imageExpression']['#cdata-section'];
		
		$this->x = $xml['reportElement']['x'];
		$this->y = $xml['reportElement']['y'];
		$this->width = $xml['reportElement']['width'];
		$this->height = $xml['reportElement']['height'];
		
	}
	
	public function draw(&$pdf){
		$pdf->Image($this->imageExpression,$this->x,$this->y,$this->width,$this->height,$this->extension);
	}
	
}

?>