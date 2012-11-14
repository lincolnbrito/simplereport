<?php
require_once 'Elements.php';

class StaticText extends Elements{
	
	private $text;
	
	public function getText(){
		return $this->text;
	}
	public function setText($text){
		$this->text = $text;
	}
	
}

?>