<?php
require 'DatabaseProcess.php';
require 'Fetcher.php';

class Barang extends Fetcher {
	private $dbProcess;

	public function __construct() {
		$this->dbProcess = new DatabaseProcess();
		$this->dbProcess->initializeDatabaseForApplication();
	}

	public function fetch() {

		echo "<table border='1'>";
		echo "<tr><td>IdBarang</td><td>NamaBarang</td><td>Keterangan</td><td>Satuan</td><td>IdPengguna</td></tr>";
		echo $this->dbProcess->fetchBarang();
		echo "</table>";
	}
}

?>