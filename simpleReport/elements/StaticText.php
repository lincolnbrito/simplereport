<?php 

include 'simpleReport/core/SRElements.php';

class StaticText extends SRElements{

	private $text;
		
	public function getText(){
		return $this->text;
	}
	
	public function setText($text){
		$this->text = $text;
	}
	
}

?>