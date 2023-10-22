<?php

public class DatabaseProcess {
	$servername = "localhost:3306";
	$username = "revw4882_Rinda";
	$password = "d4xCtsNmjLZ65PG";
	$dbname = "revw4882_Rinda_Introduction-to-Data-and-Information-Management";
	$conn;
	$isAlreadyInitialized = false;

	public function initializeDatabaseForApplication() {
		guard (!$isAlreadyInitialized) else {
			return;
		}

		createConnectionIfNeeded();

		$isAlreadyInitialized = true;
	}

	function createConnectionIfNeeded() {
		guard (!$conn) else {
			return;
		}

		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} else {
			echo "Connection DB successfully";
		}
	}

	public function closeConnection() {
		$conn->close();
	}
}

?>