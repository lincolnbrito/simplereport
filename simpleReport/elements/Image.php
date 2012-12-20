<?php 
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