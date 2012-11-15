<?php

include 'simpleReport/core/fpdf.php';
include 'simpleReport/SimplePrint.php';

class SRFillManager{

	
	/**
	 * @return SimplePrint
	 * @param SimpleReport
	 * @param SimpleReport, Array
	 */
	public static function fillReport($args){
		/*
		 * func_num_args - Retorna o número de parâmetros informados para a função.
		 * func_get_arg  - Retorna um parâmetro determinado (pela posição).
		 * func_get_args - Retorna os valores passados por parâmetro na forma de um vetor indexado numericamente.
		 * */
		
		$sd = func_get_arg(0);
		
		/* PDF DE EXEMPLO CRIADO NO BRAÇO*/
		$pdf = new FPDF('p', 'pt', 'A4');
		$pdf->SetMargins(0, 0, 0);
		$pdf->AddPage();
		$pdf->SetFont('Arial');
		
		$elements = $sd->getBandTitle()->getElements();
		foreach ($elements as $element){
			$pdf->SetXY($element->getX(),$element->getY());
			$pdf->Cell($element->getWidth(),$element->getHeight(),$element->getText());
		}
		
		return new SimplePrint($pdf);
		// Aqui tem que pegar o relatorio e preencher com os dados		
	}
	
	
}


?>
