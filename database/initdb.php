<?php
	/**
	* Kelas ini untuk menginisialisasi database dengan 5 tabel
	* Pelanggan, Produk, Pesanan, Penjual, Ekspedisi
	*/
	class initdb
	{
		private $db;
		public $message = '';
		function __construct($database)
		{
			$this->db = $database;

			//pembuatan tabel kita objek initdb dibuat
			$this->buatTabelPelanggan();
			$this->buatTabelProduk();			
			$this->buatTabelPenjual();
			$this->buatTabelEkspedisi();
			$this->buatTabelPesanan();
		}

		private function buatTabelPelanggan(){
			$query = "CREATE TABLE IF NOT EXISTS pelanggan(
						id int NOT NULL AUTO_INCREMENT PRIMARY KEY
						, kode_pelanggan varchar(10) UNIQUE NOT NULL
						, nama varchar(100) NOT NULL
						, umur int(3) NOT NULL
						, hp varchar(14) NOT NULL
						, alamat varchar(255) NOT NULL						
					)";
			if ($this->db->query($query)) {
				$message = $message . "Tabel Pelanggan berhasil dibuat \n";
			} else {
				$message = $message . "Tabel Pelanggan gagal dibuat \n";
			}
			
		}

		private function buatTabelProduk(){
			$query = "CREATE TABLE IF NOT EXISTS produk(
						id int NOT NULL AUTO_INCREMENT PRIMARY KEY
						, kode_produk varchar(10) UNIQUE NOT NULL
						, nama varchar(100) NOT NULL
						, harga int(10) NOT NULL						
					)";
			if ($this->db->query($query)) {
				$message = $message . "Tabel Produk berhasil dibuat \n";
			} else {
				$message = $message . "Tabel Produk gagal dibuat \n";
			}
		}		

		private function buatTabelPenjual(){
			$query = "CREATE TABLE IF NOT EXISTS penjual(
						id int NOT NULL AUTO_INCREMENT PRIMARY KEY
						, kode_penjual varchar(10) UNIQUE NOT NULL
						, nama varchar(100) NOT NULL
						, umur int(3) NOT NULL
						, hp varchar(14) NOT NULL
						, alamat varchar(255) NOT NULL						
					)";
			if ($this->db->query($query)) {
				$message = $message . "Tabel Penjual berhasil dibuat \n";
			} else {
				$message .=  "Tabel Penjual gagal dibuat \n";
			}
		}

		private function buatTabelEkspedisi(){
			$query = "CREATE TABLE IF NOT EXISTS ekspedisi(
						id int NOT NULL AUTO_INCREMENT PRIMARY KEY
						, kode_ekspedisi varchar(10) UNIQUE NOT NULL
						, nama varchar(100) NOT NULL
						, hp varchar(14) NOT NULL
						, alamat varchar(255) NOT NULL						
					)";
			if ($this->db->query($query)) {
				$message = $message . "Tabel Ekspedisi berhasil dibuat \n";
			} else {
				$message = $message . "Tabel Ekspedisi gagal dibuat \n";
			}
		}

		private function buatTabelPesanan(){
			$query = "CREATE TABLE IF NOT EXISTS pesanan(
						id int NOT NULL AUTO_INCREMENT PRIMARY KEY
						, kode_pesanan varchar(10) NOT NULL
						, kode_produk varchar(10) NOT NULL
						, kode_pelanggan varchar(10) NOT NULL
						, kode_penjual varchar(10) NOT NULL
						, kode_ekspedisi varchar(3) NOT NULL
						, kuantitas int(3) NOT NULL
					)";
			if ($this->db->query($query)) {
				$message = $message . "Tabel Pesanan berhasil dibuat \n";
			} else {
				$message = $message . "Tabel Pesanan gagal dibuat \n";
			}
		}

	}
?>