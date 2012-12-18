<?php

class XML2Array{

	public static function convert($source){
		$dom = new DOMDocument();
		$ret = array();
		if(!@$dom->loadXML(utf8_encode($source)))
			return array();
		return XML2Array::getArray($dom->documentElement);
	}

	private static function getArray($node){
		$array = false;
		if ($node->hasAttributes()){
			foreach ($node->attributes as $attr)
				$array[$attr->nodeName] = utf8_decode($attr->nodeValue);
		}
		if ($node->hasChildNodes()){
			if ($node->childNodes->length == 1){
				$array = ($node->firstChild->nodeType == XML_TEXT_NODE)?
				utf8_decode($node->firstChild->nodeValue):
				array($node->firstChild->nodeName => utf8_decode($node->firstChild->nodeValue));
			}else{
				foreach($node->childNodes as $childNode){
					if($childNode->nodeType != XML_TEXT_NODE){
						$array[$childNode->nodeName] = XML2Array::getArray($childNode);
					}
				}
			}
		}

		return $array;
	}
	
}

?>