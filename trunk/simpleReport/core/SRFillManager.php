<?php
require_once 'simpleReport/core/fpdf.php';
require_once 'simpleReport/core/SimplePrint.php';

class SRFillManager{

	public $pdf = null;
	public $report = null;
	public $dados = null;
	public $isFirstPage = true;
	public $islaSTPage = true;
	public $pageSizeFilled = 0;
	public $sizePage = 0;
	
	public function fillReport($args){
		$numP = func_num_args();
		$this->report = func_get_arg(0);
		
		if($numP >1)
			$this->dados = func_get_arg(1);
		
		$this->sizePage = $this->report->heigth;
		$this->pdf = new FPDF('p', 'pt', 'A4');
		$this->pdf->SetAutoPageBreak(false);
		
		$this->addNewPage();
		
		if(empty($this->report->queryText))
			$this->rideReport();
		else
			$this->rideReportData();
		
		return new SimplePrint($this->pdf);
	}

	private function rideReport(){
		$this->setBand($this->report->bandTitle);
		$this->setBand($this->report->bandPageHeader);
		$this->setBand($this->report->bandColumnHeader);
		$this->setBand($this->report->bandSummary);
		$this->setBandPageFooter($this->report->bandLastPageFooter);
	}
	
	private function rideReportData(){
		require_once 'simpleReport/config.php';
		
		$conexao = mysql_connect(SERVER, USER, PASSWORD);
		$db_selected = mysql_select_db(DATABASE, $conexao);
		$consulta = mysql_query($this->report->queryText, $conexao);
		
		$jaLeuTitleNessaPagina = false;
		$jaLeuPageHeaderNessaPagina = false;
		$jaLeuColumnHeaderNessaPagina = false;
		$jaLeuDetail = false;
		
		
		
		while($r = mysql_fetch_assoc($consulta)){
			
			if($this->isFirstPage && !$jaLeuTitleNessaPagina){
				$this->setBand($this->report->bandTitle);
				$this->isFirstPage = false;
				$jaLeuTitleNessaPagina = true;
			}	
			
			if(!$jaLeuPageHeaderNessaPagina){
				$this->setBand($this->report->bandPageHeader);
				$jaLeuPageHeaderNessaPagina = true;
			}
			
			if(!$jaLeuColumnHeaderNessaPagina){
				$this->setBand($this->report->bandColumnHeader);
				$jaLeuColumnHeaderNessaPagina = true;
			}
			
			$free = $this->findFreeSpace();
			$this->setBandDetail($this->report->bandDetail, $r);
						
			if(isset($this->report->bandDetail->height)){
				if(($free - $this->report->bandDetail->height) <= $this->report->bandDetail->height){
	
					$this->setBandPageFooter($this->report->bandPageFooter);
					
					$this->addNewPage();
					$jaLeuPageHeaderNessaPagina = false;
					$jaLeuColumnHeaderNessaPagina = false;
				}
			}
			
		}
		
		$this->setBand($this->report->bandSummary);
		$this->setBandPageFooter($this->report->bandLastPageFooter);
	}
	
	private function clearConfig(){
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->SetFillColor(0,0,0);
		$this->pdf->SetFont('Arial', '', '10');
	}
	
	private function setBand($b){
		if(!empty($b)) $this->fillBand($b);
	}
	
	private function setBandPageFooter($b){
		if(!empty($b)) $this->fillBandPageFooter($b);
	}
	
	private function setBandDetail($b,$r){
		if(!empty($b)) $this->fillBandDetail($b, $r);
	}
	
	private function fillBandPageFooter(SRBand $band){
		if($band->isEmpty())
			return true;
		foreach ($band->getElements() as $element){
			$c = clone $element;
			$c->x += $this->report->leftMargin;
			$c->y -= $band->height+$this->report->bottomMargin;
			$c->draw($this->pdf, $this);
			unset($c);
			$this->clearConfig();
		}
	}
	
	private function fillBandDetail(SRBand $band, $record){
		if($band->isEmpty()){
			$this->pageSizeFilled += $band->height;
			return true;
		}
		foreach ($band->getElements() as $element){
			$c = clone $element;
			$c->x = $element->x + $this->report->leftMargin;
			$c->y = $element->y + $this->report->topMargin+$this->pageSizeFilled;
			$c->textFieldExpression = $record[$element->textFieldExpression];
			$c->draw($this->pdf, $this);
			unset($c);
			$this->clearConfig();
		}
		$this->pageSizeFilled += $band->height;
	}
	
	private function fillBand(SRBand $band){
		if($band->isEmpty()){
			$this->pageSizeFilled += $band->height;
			return true;
		}
		foreach ($band->getElements() as $element){
			$c = clone $element;
			$c->x += $this->report->leftMargin;
			$c->y += $this->report->topMargin+$this->pageSizeFilled;
			$c->draw($this->pdf, $this);
			unset($c);
			$this->clearConfig();
		}
		$this->pageSizeFilled += $band->height;
	}

	private function addNewPage(){
		$this->pdf->SetMargins($this->report->leftMargin, $this->report->topMargin, $this->report->rightMargin);
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial');
		$this->pageSizeFilled = 0;
	}
	
	private function findFreeSpace(){
		$totalSizeBands = 0;
		if(!is_null($this->report->bandColumnFooter))
			$totalSizeBands += $this->report->bandColumnFooter->height;
		if(!is_null($this->report->bandPageFooter))
			$totalSizeBands += $this->report->bandPageFooter->height;
		return $this->sizePage-($this->pageSizeFilled+$totalSizeBands+$this->report->bottomMargin);
	}
	
}
?>