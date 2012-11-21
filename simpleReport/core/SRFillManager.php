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
		//$sd = new SimpleReport();
		
		$dados = func_get_arg(1);
		
		
		$isFirstPage = true;
		$islaSTPage = true;
		$pageSizeFilled = 0;
		
		$sizePage = $sd->getHeigth();
		
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
		
		$pdf = new FPDF('p', 'pt', 'A4');
		SRFillManager::addNewPage($pdf, $sd);
		
		if(empty($dados)){
		}else{
			
			if($isFirstPage){
				SRFillManager::fillBand($pdf, $sd->getBandTitle(), $pageSizeFilled);
				$isFirstPage = false;
			}
			
			SRFillManager::fillBand($pdf, $sd->getBandPageHeader(), $pageSizeFilled);
			SRFillManager::fillBand($pdf, $sd->getBandColumnHeader(), $pageSizeFilled);
			
			$free = SRFillManager::findFreeSpace($sd, $pageSizeFilled, $islaSTPage);
			
		
		}
		
		
		
		return new SimplePrint($pdf);		
	}

	private static function addNewPage(&$pdf, &$sd){
		$pdf->SetMargins($sd->getLeftMargin(), $sd->getTopMargin(), $sd->getRightMargin());
		$pdf->AddPage();
		$pdf->SetFont('Arial');
	}
	
	private static function fillBand(&$pdf, SRBand $band, &$pageSizeFilled){
		
		$pageSizeFilled += $band->getHeight();
		if($band->isEmpty())
			return true;
		
		foreach ($band->getElements() as $element){
			$pdf->SetXY($element->getX(),$element->getY()+$pageSizeFilled); // mais as margens
			$pdf->Cell($element->getWidth(),$element->getHeight(),$element->getText());
		}
		
	}

	
	private static function findFreeSpace(SimpleReport $sd, $pageSizeFilled, $islaSTPage){
		
		$totalSizeBands = 0;
		
		if(!is_null($sd->getBandColumnFooter())){
			$totalSizeBands += $sd->getBandColumnFooter()->getHeight();
		}
		
		if(!is_null($sd->getBandPageFooter())){
			$totalSizeBands += $sd->getBandPageFooter()->getHeight();
		}
		
		if($islaSTPage && !is_null($sd->getBandSummary())){
			$totalSizeBands += $sd->getBandSummary()->getHeight();
		}
		
		return $sd->getHeigth() - ($pageSizeFilled+$totalSizeBands);
	}
	
}

?>