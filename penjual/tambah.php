<?php
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		require('../database/connect.php');

		$stmt = $db->prepare("INSERT INTO penjual(kode_penjual, nama, umur, hp, alamat) VALUES(?,?,?,?,?)");
		$stmt->bind_param('sssss', $_POST['kode_penjual'], $_POST['nama'], $_POST['umur'], $_POST['hp'], $_POST['alamat']);
		
		if($stmt->execute()){
			header('Location:/basdat2/final/penjual/index.php');
		} else {
			 die('data gagal ditambahkan');
		}
	}
?>
<html>
<head>
	<title>Tambah Penjual</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

</head>
<body>
<div class="container bg-info">
	<div class="row">
		<div class="col-md-2">
			<?php include('../include/sidebar.php'); ?>
		</div>
		<div class="col-md-10 text">
			<h1 class="text-center bg-primary">Tambah Penjual</h1>
			<div class="col-md-6 col-md-offset-3">
				<form name="formPenjual" id="formPenjual" method="post" action="<?=($_SERVER['PHP_SELF'])?>">
					<div class="form-group">
						<label for="kodePenjual">Kode Penjual</label>
						<input type="text" class="form-control"  name = "kode_penjual" id="kode_penjual"  placeholder="Masukkan Kode Penjual" required>
					</div>
					<div class="form-group">
						<label for="nama">Nama Penjual</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Penjual" required>
					</div>
					<div class="form-group">
						<label for="umur">Umur</label>
						<input type="text" class="form-control" name="umur" id="umur"  placeholder="Masukkan Umur Penjual" required>
					</div>
					<div class="form-group">
						<label for="hp">Nomor Handphone</label>
						<input type="text" class="form-control" name="hp" id="hp"  placeholder="Masukkan Nomor HP Penjual" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat"  placeholder="Masukkan Alamat Penjual" required>
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