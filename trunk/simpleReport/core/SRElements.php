<?php

class SRElements{

	// Report element
	private $x;
	private $y;
	private $width;
	private $height;
	private $forecolor;
	
	public function getX(){
		return $this->x;
	}
	public function setX($x){
		$this->x = $x;
	}

	public function getY(){
		return $this->y;
	}
	public function setY($y){
		$this->y = $y;
	}

	public function getWidth(){
		return $this->width;
	}
	public function setWidth($width){
		$this->width = $width;
	}

	public function getHeight(){
		return $this->height;
	}
	public function setHeight($height){
		$this->height = $height;
	}
	
	public function getForecolor(){
		return $this->forecolor;
	}
	public function setForecolor($forecolor){
		$this->forecolor = $forecolor;
	}
}

?>