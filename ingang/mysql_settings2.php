<?php
class dbConnect {
	public function dbConnect() {
		//Constructor : Will not be used.
	}
	var $database;
	var $result;
	public function dbConnection() {
		
		if(!($this->database=mysql_connect("localhost","admin","ohdumak"))) {
			die("NOT ABLE TO CONNECT TO DATABASE. Contact to ADMIN - DB ERROR CODE:1");
			return;
		}
		mysql_set_charset("utf8");
		if(!mysql_select_db("withstudy",$this->database)) {
			die("Unable to connect to Database. Contact to ADMIN - DB ERROR CODE:2");
			return;
		}
		
	}
	public function dbQuery($query) {
		$this->result = mysql_query($query,$this->database);
		if(!$this->result) {
			echo "Unable to execute query. Contact to ADMIN - DB ERROR CODE:3";
			die(mysql_error());
			return $this->result;
		}else return $this->result;
	}
	public function rows() {
		return mysql_num_rows($result);
	}
	public function dbClose() {
		mysql_close($this->database);
	}
	
}

?>