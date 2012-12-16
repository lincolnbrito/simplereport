<?php

class SRXMLToArray{

	/*
	 Este código pega conteúdo de qualquer arquivo xml e transforma em um array multidimensional.
	Para utilizar, passe a URL ou caminho para o arquivo XML. Exemplo:
	$array = xml2array('http://seusite.com.br/arquivo.xml',array());
	*/
	
	function xml2array($source,$arr){
		$xml = simplexml_load_string(file_get_contents($source));
		$iter = 0;
		foreach($xml->children() as $b){
			$a = $b->getName();
			if(!$b->children()){
				$arr[$a] = trim($b[0]);
			}
			else{
				$arr[$a][$iter] = array();
				$arr[$a][$iter] = xml2phpArray($b,$arr[$a][$iter]);
			}
			$iter++;
		}
		return $arr;
	}
}

?>