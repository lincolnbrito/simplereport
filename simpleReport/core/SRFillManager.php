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
		//$dados = func_get_arg(1);
		
		/*
			1º verificar se o record set possui valores
			2º se não possui, decidir oque fazer e oque irá montar
			3º se sim, começar a preencher o relatorio
			
			4º verificar se esta na primeira pagina, se sim, desenhar a banda title
			5º ao ir montando o relatorio tem que ir guardando o tamannho já ocupado pelas bandas...
			6º preencher a banda pege header
			7º verificar o espaço que será necessário para preencher as bandas de baixo da detail
			8º dai então começar a preencher a banda detail ate o tamanho disponivel da pagina esgotar, quando esgotar dai...
			9º se esta na ultima pagina desenhar a banda summary
			10º entao começa a desenhar as bandas footer page
			11º desenhar o rodape
			12º add nova pagina, começa do passo 1 e quando chegar na banda detail tem que continuar de onde parou
		*/
		
		/* PDF DE EXEMPLO CRIADO NO BRAÇO */
		
		$isFirstPage = true;
		$islaSTPage = false;
		$pageSizeFilled = 0;
		
		$pdf = new FPDF('p', 'pt', 'A4');
		SRFillManager::addNewPage($pdf, $sd);

		if(empty($dados)){
			
			SRFillManager::fillBandTitle($pdf, $sd);
			
		}else{
		
			
			
		}
		
		return new SimplePrint($pdf);
		// Aqui tem que pegar o relatorio e preencher com os dados		
	}

	private static function addNewPage(&$pdf, &$sd){
		$pdf->SetMargins($sd->getLeftMargin(), $sd->getTopMargin(), $sd->getRightMargin());
		$pdf->AddPage();
		$pdf->SetFont('Arial');
	}
	
	private static function fillBandTitle(&$pdf, &$sd){
		
		$elements = $sd->getBandTitle()->getElements();
		foreach ($elements as $element){
			$pdf->SetXY($element->getX(),$element->getY());
			$pdf->Cell($element->getWidth(),$element->getHeight(),$element->getText());
		}
			
	}
	
}

?>