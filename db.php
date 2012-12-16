<?php
class interactor{
	function next(){}
	function get(){}
}

class dbmysql extends interactor{
	
	var $result;
	var $row;
	var $link_identifier;

	function connect(){
		$link_identifier = mysql_connect('localhost', 'mysql_user', 'mysql_password');
		if (!$link) {
			die('Not connected : ' . mysql_error());
		}
		// make foo the current db
		$db_selected = mysql_select_db('foo', $link);
		if (!$db_selected) {
			die ('Can\'t use foo : ' . mysql_error());
		}
	}

	function query(){
		$result = mysql_query($query, $link_identifier);
	}

	function next(){
		$this->row = mysql_fetch_array($result, MYSQL_ASSOC);
		return $this->row !== false;
	}
	
	function get(){
		return $this->row;
	}
	
}

class dbcsv extends interactor{
	
	var $handle;
	
	function open(){
		$this->handle = fopen("test.csv", "r");
	}

	function next(){
		$this->row = fgetcsv($this->handle, 1000, ",");
		return $this->row !== false;
	}
	
	function get(){
		return $this->row;
	}
	
}


class maria{
	
	var $data;

	function setData(interactor $opa){
		$this->data = $opa;
	}
	
	function monta(){
		while($this->data->next()){
			$rec = $this->data->get();
			$rec = array(
				'nome' => 'Bernardo',
				'sexo' => 'M',
			);
		}
	}
	
}
?>
