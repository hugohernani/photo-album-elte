<?php

// $servername = "localhost";
// $username = "ci015x";
// $password = "db2014";
// $db = "wp_" . $username;

class Database{
	
	private $conn;

    public function con_open(){
		// Create connection
		$this->conn = new mysqli("localhost", "ci015x", "db2014", "wp_ci015x");
		// Check connection
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
		return $this->conn;
    }


    public function con_close(){
    	$this->conn->close();
    }
}