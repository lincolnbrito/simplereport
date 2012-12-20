<?php
class SimplePrint{

	private $pdf = '';
	
	public function __construct(FPDF $pdf){
		$this->pdf = $pdf;
	}
	
	public function outPut(){
		$this->pdf->Output();	
	}
	
	public function export(){
		// implementar depois
	}
	
}

?>