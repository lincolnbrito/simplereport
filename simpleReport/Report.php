<?php
require_once 'simpleReport/core/SRXmlLoader.php';
require_once 'simpleReport/core/SRCompileManager.php';
require_once 'simpleReport/core/SRFillManager.php';

final class Report{

	private $design;
	private $report;
	private $print;

	public function __construct($sourceFileName, $dados = null){
		$load = new SRXmlLoader();
		$this->design = $load->load($sourceFileName);
		$this->report = SRCompileManager::compile($this->design);
		$this->fill($dados);
	}

	public function fill($dados = null){
		$fill = new SRFillManager();
		$this->print = $fill->fillReport($this->report, $dados);
		return $this;
	}

	public function outPut(){
		$this->print->outPut();
	}

	public function export(){
		$this->print->export();
	}

	public static function from($file, $dados = null){
		return new Report($file, $dados);
	}

}
?>