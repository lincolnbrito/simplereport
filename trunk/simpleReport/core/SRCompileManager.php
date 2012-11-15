<?php
include 'simpleReport/core/SRInstanceManager.php';

abstract class SRCompileManager{

	/**
	 * @param SimpleDesign
	 * @return SimpleReport
	 */
	public static function compile(SimpleDesign $sd){
		
		$serializedFile = serialize($sd);
		
		$serializedFile = explode(':', $serializedFile, 4);
		$serializedFile[2] = '"SimpleReport"';
		$serializedFile = implode(':', $serializedFile);
		
		// Cria o arquivo serializado
		file_put_contents($sd->getName().'.sr', $serializedFile);
		
		return SRInstanceManager::getInstance($serializedFile);
	}  
	
} 

?>
