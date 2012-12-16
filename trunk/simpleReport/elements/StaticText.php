<?php 
require_once 'simpleReport/core/SRTextElement.php';

class StaticText extends SRTextElements{

	public $text;
	public $paintBackground;
	
	public function __construct(){
		
		
	}
	
	public function fill($xml){
		
		echo 'NAO ESTA CHEGANDO O VALOR AQUI, POIS A CONVERSAO DE XML PARA ARRAY
		ESTA DESTRUINDO TUDO....<BR />';
		
		var_dump($xml['text']);
		exit;
		
		/*
		echo '<pre>';
		var_dump($xml['reportElement']);
		var_dump($xml['textElement']);
		var_dump($xml['text']);
		exit;
		*/
		$this->text = "Static text simples";
		$this->x = 0;
		$this->y = 150;
		$this->width = 555;
		$this->height = 38;
		
	}
	
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