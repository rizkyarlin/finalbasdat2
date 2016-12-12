<?php
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		require('../database/connect.php');

		$stmt = $db->prepare("INSERT INTO pelanggan(kode_pelanggan, nama, umur, hp, alamat) VALUES(?,?,?,?,?)");
		$stmt->bind_param('sssss', $_POST['kode_pelanggan'], $_POST['nama'], $_POST['umur'], $_POST['hp'], $_POST['alamat']);
		
		if($stmt->execute()){
			header('Location:/basdat2/final/pelanggan/index.php');
		} else {
			 die('data gagal ditambahkan');
		}
	}
?>
<html>
<head>
	<title>Tambah Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

</head>
<body>
<div class="container bg-info">
	<div class="row">
		<div class="col-md-2">
			<?php include('../include/sidebar.php'); ?>
		</div>
		<div class="col-md-10 text">
			<h1 class="text-center bg-primary">Tambah Pelanggan</h1>
			<div class="col-md-6 col-md-offset-3">
				<form name="formPelanggan" id="formPelanggan" method="post" action="<?=($_SERVER['PHP_SELF'])?>">
					<div class="form-group">
						<label for="kodePelanggan">Kode Pelanggan</label>
						<input type="text" class="form-control"  name = "kode_pelanggan" id="kode_pelanggan"  placeholder="Masukkan Kode Pelanggan" required>
					</div>
					<div class="form-group">
						<label for="nama">Nama Pelanggan</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Pelanggan" required>
					</div>
					<div class="form-group">
						<label for="umur">Umur</label>
						<input type="text" class="form-control" name="umur" id="umur"  placeholder="Masukkan Umur Pelanggan" required>
					</div>
					<div class="form-group">
						<label for="hp">Nomor Handphone</label>
						<input type="text" class="form-control" name="hp" id="hp"  placeholder="Masukkan Nomor HP Pelanggan" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat"  placeholder="Masukkan Alamat Pelanggan" required>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-info">Tambah</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/boostrap.js"></script>
</html>