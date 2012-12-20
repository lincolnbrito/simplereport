<?php

class SRBaseReport{
	
	public $name = 'nameReport';
	
	// Page Size
	public $width = 595;
	public $heigth = 842;
	
	// Margins
	public $leftMargin = 20;
	public $rightMargin = 20;
	public $topMargin = 20;
	public $bottomMargin = 20;
	
	// More
	public $queryText = '';
	
	// Bands
	public $bandTitle;
	public $bandPageHeader;
	public $bandColumnHeader;
	public $bandDetail;
	public $bandColumnFooter;
	public $bandPageFooter;
	public $bandLastPageFooter;
	public $bandSummary;
	public $bandBackground;
	public $bandNoData;
	
	public $parameters;
}

?>