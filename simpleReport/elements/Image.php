<?php 

require_once 'simpleReport/core/SRElements.php';

class Image extends SRElements{

	public $imageExpression;
		
	public function draw(&$pdf){
		
		$pdf->Image($this->imageExpression,$this->x,$this->y,$this->width,$this->height,'PNG');
		
	}
	
}

?>