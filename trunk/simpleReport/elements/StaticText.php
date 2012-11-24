<?php 

require_once 'simpleReport/core/SRElements.php';

class StaticText extends SRElements{

	public $text;
	public $paintBackground;
	
	public function draw(&$pdf){
		if(!empty($this->forecolor)){
			$pdf->SetTextColor($this->forecolor[0],$this->forecolor[1],$this->forecolor[2]);
		}
		if(!empty($this->backcolor)){
			$pdf->SetFillColor($this->backcolor[0],$this->backcolor[1],$this->backcolor[2]);
		}
		$pdf->SetXY($this->x,$this->y);
		$pdf->Cell($this->width,$this->height,$this->text, 0, 0, 'L', $this->paintBackground);
	}
	
}

?>