<?php

class Band{

	private $height = 0;
	private $elements = array();
	
	public function addElement(Elements $elements){
		$this->elements = $elements;
	}
	
}

?>