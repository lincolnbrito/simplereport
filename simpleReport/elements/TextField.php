<?php

require_once 'simpleReport/core/SRTextElement.php';

class TextField extends SRTextElements{

	public $textFieldExpression;
	
	
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