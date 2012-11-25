<?php 
require_once 'simpleReport/core/SRTextElement.php';

class StaticText extends SRTextElements{

	public $text;
	public $paintBackground;
	
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
		$pdf->SetXY($this->x,$this->y);
		$pdf->Cell($this->width,$this->height,$this->text, 0, 0, $this->textAlignment, $this->paintBackground);
	}
	
}

?>