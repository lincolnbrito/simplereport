<?php

require_once 'simpleReport/core/SRElements.php';

class TextField extends SRElements{

	public $textFieldExpression;
	
	
	public function draw(&$pdf){
	
		
		$pdf->SetXY($this->x,$this->y);
		$pdf->Cell($this->width,$this->height,$this->textFieldExpression);
	
		
	}
	
}


?>