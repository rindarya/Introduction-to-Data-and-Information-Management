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

		echo "<TABLE BORDER='1'>";
		echo "<TR><TD>IdBarang</TD><TD>NamaBarang</TD><TD>Keterangan</TD><TD>Satuan</TD><TD>IdPengguna</TD><TD>Operation</TD></TR>";
		echo $this->dbProcess->fetchBarang();
		echo "<TR><TD><input type=\"text\" id=\"fname\" name=\"fname\"></TD><TD><input type=\"text\" id=\"fname\" name=\"fname\"></TD><TD><input type=\"text\" id=\"fname\" name=\"fname\"></TD><TD><input type=\"text\" id=\"fname\" name=\"fname\"></TD><TD>1</TD><TD><button type=\"button\">TAMBAH</button></TD></TR>";
		echo "</TABLE>";
	}
}

?>