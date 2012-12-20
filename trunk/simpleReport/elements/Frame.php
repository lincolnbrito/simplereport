<?php
require_once 'simpleReport/core/SRElements.php';

class Frame extends SRElements{
	
	private $elements = null;
	
	public function fill($xml){
		
		echo '<pre>'; print_r($xml); echo '</pre>';
		exit;
		
		$this->x = $xml['reportElement']['x'];
		$this->y = $xml['reportElement']['y'];
		$this->width = $xml['reportElement']['width'];
		$this->height = $xml['reportElement']['height'];
		
		$this->forecolor = SRColor::obtemRGB(@$xml['reportElement']['forecolor']);
		$this->backcolor = SRColor::obtemRGB(@$xml['reportElement']['backcolor']);
		$this->paintBackground = @$xml['reportElement']['mode']=='Opaque';
	}
	
	public function draw(&$pdf){
	
		$tp = '';
		
		if(!empty($this->forecolor)){
			$pdf->SetDrawColor($this->forecolor[0],$this->forecolor[1],$this->forecolor[2]);
			$tp .= 'D';
		}
		
		if(!empty($this->backcolor)){
			$pdf->SetFillColor($this->backcolor[0],$this->backcolor[1],$this->backcolor[2]);
			$tp .= 'F';
		}
		
		$pdf->Rect($this->x,$this->y,$this->width,$this->height, $tp);
		
	}
	
}

?>