<?php
class SimpleDesign{

	private $name = "name";
	private $marginTop = 20;
	private $marginRight = 20;
	private $marginBottom = 20;
	private $marginLeft = 20;
	
	private $title;
	private $pageHeader;
	private $columnHeader;
	private $detail;
	private $columnFooter;
	private $pageFooter;
	private $lastPageFooter;
	private $summary;
	private $background;
	private $noData;
	
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	
	public function setTitle(Band $band){
		$this->title = $band;
	}
	
}
?>