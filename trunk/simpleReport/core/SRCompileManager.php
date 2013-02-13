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
require_once 'simpleReport/core/SRInstanceManager.php';

abstract class SRCompileManager{

	/**
	 * @param SimpleDesign
	 * @return SimpleReport
	 */
	public static function compile(SimpleDesign $sd, $sourceFileName){
		
		$serializedFile = serialize($sd);
		
		$serializedFile = explode(':', $serializedFile, 4);
		$serializedFile[2] = '"SimpleReport"';
		$serializedFile = implode(':', $serializedFile);
		
		// Cria o arquivo serializado
		file_put_contents($sourceFileName.'.sr', $serializedFile);
		
		return SRInstanceManager::getInstance($serializedFile);
	}  
	
} 

?>
