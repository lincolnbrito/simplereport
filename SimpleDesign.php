<?php
class SimpleDesign{

	private $name = 'name';
	
	private $marginTop = 20;
	private $marginRight = 20;
	private $marginBottom = 20;
	private $marginLeft = 20;
	
	private $bandTitle;
	private $bandPageHeader;
	private $bandColumnHeader;
	private $bandDetail;
	private $bandColumnFooter;
	private $bandPageFooter;
	private $bandLastPageFooter;
	private $bandSummary;
	private $bandBackground;
	private $bandNoData;
	
	private $query;
	
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	
	public function setBandTitle(Band $band){
		$this->bandTitle = $band;
	}
	public function getBandTitle(){
		return $this->bandTitle;
	}
	
}
?>