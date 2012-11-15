<?php

class MontaRelatorio{
	
	public static function desenha(SimpleDesign $design){

		require_once 'SimplePrint.php';
		$print = new SimplePrint($design);

		return $print;
		
	}
	
}


?>