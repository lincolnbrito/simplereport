<?php
/*
 Copyright 2013 SimpleReport

Este arquivo é parte do SimpleReport

SimpleReport é uma biblioteca livre; você pode redistribui-lo e/ou
modifica-lo dentro dos termos da Licença Pública Geral GNU como
publicada pela Fundação do Software Livre (FSF); na versão 3 da
Licença, ou qualquer outra versão.

Este programa é distribuido na esperança que possa ser util,
mas SEM NENHUMA GARANTIA; sem uma garantia implicita de ADEQUAÇÂO a qualquer
MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
Licença Pública Geral GNU para maiores detalhes.

Você encontrará uma cópia da Licença Pública Geral GNU no diretório
license/COPYING.txt, se não, entre em <http://www.gnu.org/licenses/>
*/

require_once 'simpleReport/core/SRXmlLoader.php';
require_once 'simpleReport/core/SRCompileManager.php';
require_once 'simpleReport/core/SRFillManager.php';

final class Report{

	private $design;
	private $report;
	private $print;

	public function __construct($sourceFileName, $dados = null){
		$load = new SRXmlLoader();
		$fileName = substr($sourceFileName, 0, -6);
		if(file_exists($fileName.'.sr')){
			$this->report = SRInstanceManager::getInstance(file_get_contents($fileName.'.sr'));
		}else{
			$this->design = $load->load($sourceFileName);
			$this->report = SRCompileManager::compile($this->design, $fileName);
		}
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