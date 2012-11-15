<?php
require_once 'fpdf.php';

class SimplePrint{

	private $pdf;
	
	function __construct(SimpleDesign $design){
		
		$this->pdf = new FPDF('p', 'pt', 'A4');
		$this->pdf->SetMargins(0, 0, 0);
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial');
		$this->pdf->SetXY(0,0);
		$this->pdf->Cell(10,12,'Hello word');
		
	}
	
	function imprimir(){
		$this->pdf->Output();
	}
	
	
}

?>
