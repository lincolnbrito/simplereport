<?php

class SRBand{

	private $height = 0;
	private $elements = array();

	public function isEmpty(){
		return empty($this->elements);	
	}
	
	public function addElement(SRElements $elements){
		$this->elements[] = $elements;
	}

	public function getElements(){
		return $this->elements;	
	}
	
	public function getHeight(){
		return $this->height;
	}
	
	public function setHeight($height){
		$this->height = $height;
	}
	
}

?>
