<?php
require_once 'SimpleReport.php';

final class SimpleSerializeMananger{
	
	public static function compileReport(SimpleDesign $simpleDesign){
		
		$simpleReport = new SimpleReport();
			
		
		//file_put_contents($simpleDesign->getName(), serialize($simpleDesign));
		
	}
	
	public static function compileReportToFile(){
		
	} 
	
}

?>
