<?php
require_once 'simpleReport/SimpleReport.php';

abstract class SRInstanceManager{


	public static function getInstance($serializedFile){

		$sr = unserialize($serializedFile);
		return $sr;

	}

}
?>
