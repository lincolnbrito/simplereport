<?php
require_once 'simpleReport/core/fpdf.php';
require_once 'simpleReport/SimplePrint.php';

class SRFillManager{

	public $pdf = null;
	public $report = null;
	public $dados = null;
	public $isFirstPage = true;
	public $islaSTPage = true;
	public $pageSizeFilled = 0;
	public $sizePage = 0;
	
	public function fillReport($args){
		
		$this->report = func_get_arg(0);
		$this->dados = func_get_arg(1);
		
		$this->sizePage = $this->report->heigth;
		
		$this->pdf = new FPDF('p', 'pt', 'A4');
		$this->addNewPage();
		$this->rideReport($this->dados);
		return new SimplePrint($this->pdf);
			
	}

	private function rideReport($dados = ''){
		
		if($this->isFirstPage){
			$this->fillBand($this->report->bandTitle);
			$this->isFirstPage = false;
		}
		
		$this->fillBand($this->report->bandPageHeader);
		$this->fillBand($this->report->bandColumnHeader);
		
		$free = $this->findFreeSpace();
		
		$this->fillDetail();
		
	}
	
	private function fillDetail(){
		
	}
	
	private function addNewPage(){
		$this->pdf->SetMargins($this->report->leftMargin, $this->report->topMargin, $this->report->rightMargin);
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial');
	}
	
	private function fillBand(SRBand $band){
		
		if($band->isEmpty())
			return true;
		
		foreach ($band->getElements() as $element){
			$element->x += $this->report->leftMargin;
			$element->y += $this->report->topMargin+$this->pageSizeFilled;
			$element->draw($this->pdf, $this);
		}
		
		$this->pageSizeFilled += $band->height;
	}

	private function findFreeSpace(){
		$totalSizeBands = 0;
		if(!is_null($this->report->bandColumnFooter)){
			$totalSizeBands += $this->report->bandColumnFooter->height;
		}
		if(!is_null($this->report->bandPageFooter)){
			$totalSizeBands += $this->report->bandPageFooter->height;
		}
		if($this->islaSTPage && !is_null($this->report->bandSummary)){
			$totalSizeBands += $this->report->bandSummary->height;
		}
		return $this->sizePage-($this->pageSizeFilled+$totalSizeBands+$this->report->bottomMargin);
	}
	
}


/*
 * func_num_args - Retorna o número de parâmetros informados para a função.
* func_get_arg  - Retorna um parâmetro determinado (pela posição).
* func_get_args - Retorna os valores passados por parâmetro na forma de um vetor indexado numericamente.
* */

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
?>