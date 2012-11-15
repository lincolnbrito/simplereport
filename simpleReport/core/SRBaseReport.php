<?php

class SRBaseReport{
	
	private $name = 'nameReport';
	
	// Page Size
	private $width = 595;
	private $heigth = 842;
	
	// Margins
	private $leftMargin = 20;
	private $rightMargin = 20;
	private $topMargin = 20;
	private $bottomMargin = 20;
	
	// More
	private $queryText = '';
	
	// Bands
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
	
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function getWidth() {
		return $this->width;
	}
	
	public function setWidth($width) {
		$this->width = $width;
	}
	
	public function getHeigth() {
		return $this->heigth;
	}
	
	public function setHeigth($heigth) {
		$this->heigth = $heigth;
	}
	
	public function getLeftMargin() {
		return $this->leftMargin;
	}
	
	public function setLeftMargin($leftMargin) {
		$this->leftMargin = $leftMargin;
	}
	
	public function getRightMargin() {
		return $this->rightMargin;
	}
	
	public function setRightMargin($rightMargin) {
		$this->rightMargin = $rightMargin;
	}
	
	public function getBottomMargin() {
		return $this->bottomMargin;
	}
	
	public function setBottomMargin($bottomMargin) {
		$this->bottomMargin = $bottomMargin;
	}
	
	public function getLeftMargin_1() {
		return $this->leftMargin;
	}
	
	public function setLeftMargin_1($leftMargin) {
		$this->leftMargin = $leftMargin;
	}
	
	public function getQueryText() {
		return $this->queryText;
	}
	
	public function setQueryText($queryText) {
		$this->queryText = $queryText;
	}
	
	public function getBandTitle() {
		return $this->bandTitle;
	}
	
	public function setBandTitle($bandTitle) {
		$this->bandTitle = $bandTitle;
	}
	
	public function getBandPageHeader() {
		return $this->bandPageHeader;
	}
	
	public function setBandPageHeader($bandPageHeader) {
		$this->bandPageHeader = $bandPageHeader;
	}
	
	public function getBandColumnHeader() {
		return $this->bandColumnHeader;
	}
	
	public function setBandColumnHeader($bandColumnHeader) {
		$this->bandColumnHeader = $bandColumnHeader;
	}
	
	public function getBandDetail() {
		return $this->bandDetail;
	}
	
	public function setBandDetail($bandDetail) {
		$this->bandDetail = $bandDetail;
	}
	
	public function getBandColumnFooter() {
		return $this->bandColumnFooter;
	}
	
	public function setBandColumnFooter($bandColumnFooter) {
		$this->bandColumnFooter = $bandColumnFooter;
	}
	
	public function getBandPageFooter() {
		return $this->bandPageFooter;
	}
	
	public function setBandPageFooter($bandPageFooter) {
		$this->bandPageFooter = $bandPageFooter;
	}
	
	public function getBandLastPageFooter() {
		return $this->bandLastPageFooter;
	}
	
	public function setBandLastPageFooter($bandLastPageFooter) {
		$this->bandLastPageFooter = $bandLastPageFooter;
	}
	
	public function getBandSummary() {
		return $this->bandSummary;
	}
	
	public function setBandSummary($bandSummary) {
		$this->bandSummary = $bandSummary;
	}
	
	public function getBandBackground() {
		return $this->bandBackground;
	}
	
	public function setBandBackground($bandBackground) {
		$this->bandBackground = $bandBackground;
	}
	
	public function getBandNoData() {
		return $this->bandNoData;
	}
	
	public function setBandNoData($bandNoData) {
		$this->bandNoData = $bandNoData;
	}
	
}

?>