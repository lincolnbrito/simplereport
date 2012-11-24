<?php
require_once 'simpleReport/core/ISRElements.php';

class SRElements implements ISRElements{
	
	public $x;
	public $y;
	public $width;
	public $height;
	public $forecolor;
	
	public function draw(&$pdf){
		
		$pdf->SetXY($this->x,$this->y);
		$pdf->Cell($this->width,$this->height,$this->text);
			
	}
	
	
}

?>