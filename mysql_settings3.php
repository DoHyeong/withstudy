<?php
class dbConnect {
	public function dbConnect() {
		//Constructor : Will not be used.
	}
	var $database;
	var $result;
	public function dbConnection() {
		$this->database=mysqli_connect("localhost","admin","ohdumak","withstudy");
		if(mysqli_connect_errno()) {
			die("NOT ABLE TO CONNECT TO DATABASE. Contact to ADMIN - DB ERROR CODE:1");
			return;
		}
		mysqli_set_charset("utf8");
			
	}
	public function dbQuery($query) {
		$this->result = mysqli_query($this->database,$query);
		if(!$this->result) {
			echo "Unable to execute query. Contact to ADMIN - DB ERROR CODE:3";
			die(mysqli_error());
			return $this->result;
		}else return $this->result;
	}
	public function rows() {
		return mysqli_num_rows($result);
	}
	public function dbClose() {
		mysqli_close($this->database);
	}
	
}

?>