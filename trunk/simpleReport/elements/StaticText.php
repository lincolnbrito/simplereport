<?php 

require_once 'simpleReport/core/SRElements.php';

class StaticText extends SRElements{

	public $text;
		
	public function draw(&$pdf){
		$pdf->SetXY($this->x,$this->y);
		$pdf->Cell($this->width,$this->height,$this->text);
	}
	
}

?>