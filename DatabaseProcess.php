<?php

class DatabaseProcess {
	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $conn;
	private $isAlreadyInitialized;

	public function __construct() {
		$this->servername = "localhost";
		$this->username = "revw4882_Rinda";
		$this->password = "d4xCtsNmjLZ65PG";
		$this->dbname = "revw4882_Rinda_Introduction-to-Data-and-Information-Management";
		$this->isAlreadyInitialized = false;
	}

	public function initializeDatabaseForApplication() {
		if(!$this->isAlreadyInitialized) {
			$this->createConnectionIfNeeded();
			$this->isAlreadyInitialized = true;
		}
	}

	function createConnectionIfNeeded() {
		if(!$this->conn) {
        	$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                echo "Connection DB Error, " . $conn->connect_error;
            } else {
                echo "Connection DB successfully";
            }
        }
	}

	public function closeConnection() {
		$this->conn->close();
	}
}

$dbProcess = new DatabaseProcess();
$dbProcess->initializeDatabaseForApplication();

?>