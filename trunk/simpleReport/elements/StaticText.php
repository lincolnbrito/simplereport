<?php 
require_once 'simpleReport/core/SRTextElement.php';
require_once 'simpleReport/core/SRColor.php';

class StaticText extends SRTextElements{

	public $text;
	public $paintBackground;
	
	public function fill($xml){
				
		$this->text = $xml['text']['#cdata-section'];
		$this->x = $xml['reportElement']['x'];
		$this->y = $xml['reportElement']['y'];
		$this->width = $xml['reportElement']['width'];
		$this->height = $xml['reportElement']['height'];
		
		$this->textAlignment = $xml['textElement']['textAlignment'];
		
		$this->isBold = $xml['textElement']['font']['isBold'];
		$this->isItalic = $xml['textElement']['font']['isItalic'];
		$this->fontSize = $xml['textElement']['font']['size'];
		
		$this->forecolor = SRColor::obtemRGB(@$xml['reportElement']['forecolor']);
		$this->backcolor = SRColor::obtemRGB(@$xml['reportElement']['backcolor']);
		$this->paintBackground = @$xml['reportElement']['mode']=='Opaque';
		
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
		
		switch ($this->textAlignment){
			case 'Center':
				$this->textAlignment = 'C';
				break;
			case 'Left':
				$this->textAlignment = 'L';
				break;
			case 'Right':
				$this->textAlignment = 'R';
				break;
		}
		
		$pdf->SetXY($this->x,$this->y);
		$pdf->Cell($this->width,$this->height,$this->text, 0, 0, $this->textAlignment, $this->paintBackground);
	}
	
}

?>