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
		createTableHakAkses();
		createTablePengguna();
		createTableBarang();
		createTablePembelian();
		createTablePenjualan();

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
		}
	}

	function createTableHakAkses() {
		// sql to create table
		$sql = "CREATE TABLE HakAkses (
		idAkses INT(6) PRIMARY KEY,
		NamaAkses VARCHAR(30) NOT NULL,
		Keterangan VARCHAR(30) NOT NULL
		)";

		if ($conn->query($sql) === TRUE) {
			echo "Table HakAkses created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}
	}

	function createTablePengguna() {
		$sql = "CREATE TABLE Pengguna (
		IdPengguna INT(10) PRIMARY KEY,
		NamaPengguna VARCHAR(30) NOT NULL,
		Password VARCHAR(30) NOT NULL,
		NamaDepan VARCHAR(30) NOT NULL,
		NamaBelakang VARCHAR(30) NOT NULL,
		NoHp VARCHAR(20) NOT NULL,
		Alamat VARCHAR(30) NOT NULL,
		IdAkses INT(10) NOT NULL,
		FOREIGN KEY (IdAkses) REFERENCES HakAkses(IdAkses)
		)";

		if ($conn->query($sql) === TRUE) {
			echo "Table Pengguna created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}
	}

	function createTableBarang() {
		$sql = "CREATE TABLE Barang (
		IdBarang INT(10) PRIMARY KEY,
		NamaBarang VARCHAR(30) NOT NULL,
		Keterangan VARCHAR(30) NOT NULL,
		Satuan VARCHAR(30) NOT NULL,
		IdPengguna INT(10) NOT NULL,
		FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna)
		)";

		if ($conn->query($sql) === TRUE) {
			echo "Table Barang created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}
	}

	function createTablePembelian() {
		$sql = "CREATE TABLE Pembelian (
		IdPembelian INT(10) PRIMARY KEY,
		JumlahPembelian VARCHAR(30) NOT NULL,
		HargaBeli VARCHAR(30) NOT NULL,
		IdPengguna INT(10) NOT NULL,
		FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna)
		)";

		if ($conn->query($sql) === TRUE) {
			echo "Table Pembelian created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}
	}

	function createTablePenjualan() {
		$sql = "CREATE TABLE Penjualan (
		IdPenjualan INT(10) PRIMARY KEY,
		JumlahPenjualan VARCHAR(30) NOT NULL,
		HargaJual VARCHAR(30) NOT NULL,
		IdPengguna INT(10) NOT NULL,
		FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna)
		)";

		if ($conn->query($sql) === TRUE) {
			echo "Table Penjualan created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}
	}

	public function closeConnection() {
		$conn->close();
	}
}

?>