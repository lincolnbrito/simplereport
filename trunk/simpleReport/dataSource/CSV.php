<?php

require_once 'simpleReport/core/ISRIterator.php';

class CSV implements ISRIterator{

	var $result;
	
	function __construct($result){
		$this->result = $result;
	}
	
	function next(){
		$aux = null;
		
		$aux = fgetcsv($this->result, 1000, ",");
		
		var_dump($aux);
		exit;
		
		return ;
	}
	
}

?>
