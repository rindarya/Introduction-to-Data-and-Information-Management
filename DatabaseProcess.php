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
                echo "<BR><BR>";
            } else {
                echo "Connection DB successfully";
                echo "<BR><BR>";
            }
        }
	}

	public function fetchBarang() {
		$resultQuery = mysqli_query($this->conn, "SELECT * FROM Barang");
		$resultTable = "";
		while ($resultData = mysqli_fetch_array($resultQuery, MYSQLI_ASSOC)) {
			$resultTable .= "<tr><td>".$resultData['IdBarang']."</td><td>".$resultData['NamaBarang']."</td><td>".$resultData['Keterangan']."</td><td>".$resultData['Satuan']."</td><td>".$resultData['IdPengguna']."</td></tr>";
		}

		print($resultTable);

		return $resultTable;
	}

	public function closeConnection() {
		$this->conn->close();
	}
}

?>