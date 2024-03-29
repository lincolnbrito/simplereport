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
class SRParameter{

	public static $parameter = array();
	
	public static function get($key = null){
		if(array_key_exists($key, self::$parameter) === false){
			echo 'parametro nao encontrado: '.$key;
			exit;
		}
		if($key == null){
			return self::$parameter;
		}else{
			return self::$parameter[$key];
		}
	}
	
	public static function set($key, $value){
		if(array_key_exists($key, self::$parameter) === false)
			self::$parameter[$key] = $value;
	}
	
}

?>