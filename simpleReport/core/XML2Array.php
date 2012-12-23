<?php
/*
Copyright 2013 SimpleReport

Este arquivo é parte do SimpleReport

SimpleReport é uma biblioteca livre; você pode redistribui-lo e/ou
modifica-lo dentro dos termos da Licença Pública Geral GNU como
publicada pela Fundação do Software Livre (FSF); na versão 3 da
Licença, ou qualquer outra versão.

Este programa é distribuido na esperança que possa ser util,
mas SEM NENHUMA GARANTIA; sem uma garantia implicita de ADEQUAÇÂO a qualquer
MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
Licença Pública Geral GNU para maiores detalhes.

Você encontrará uma cópia da Licença Pública Geral GNU no diretório
license/COPYING.txt, se não, entre em <http://www.gnu.org/licenses/>
*/
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