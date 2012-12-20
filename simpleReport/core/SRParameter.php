<?php
class SRParameter{

	public static $parameter = array();
	
	public static function get($key = null){
		
		if(substr($key, 0, 3) == '$P{' && substr($key, -1) == '}'){
			$key = substr($key, 3, -1);
		}
		
		if(array_search($key, self::$parameter) === false){
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
		self::$parameter[$key] = $value;
	}
	
}

?>