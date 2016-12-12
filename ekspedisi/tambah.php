<?php
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		require('../database/connect.php');

		$stmt = $db->prepare("INSERT INTO ekspedisi(kode_ekspedisi, nama, hp, alamat) VALUES(?,?,?,?)");
		$stmt->bind_param('ssss', $_POST['kode_ekspedisi'], $_POST['nama'], $_POST['hp'], $_POST['alamat']);
		
		if($stmt->execute()){
			header('Location:index.php');
		} else {
			 die('data gagal ditambahkan');
		}
	}
?>
<html>
<head>
	<title>Tambah Ekspedisi</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

</head>
<body>
<div class="container bg-info">
	<div class="row">
		<div class="col-md-2">
			<?php include('../include/sidebar.php'); ?>
		</div>
		<div class="col-md-10 text">
			<h1 class="text-center bg-primary">Tambah Ekspedisi</h1>
			<div class="col-md-6 col-md-offset-3">
				<form name="formPelanggan" id="formPelanggan" method="post" action="<?=($_SERVER['PHP_SELF'])?>">
					<div class="form-group">
						<label for="kode_ekspedisi">Kode Ekspedisi</label>
						<input type="text" class="form-control"  name = "kode_ekspedisi" id="kode_pelanggan"  placeholder="Masukkan Kode Ekspedisi" required>
					</div>
					<div class="form-group">
						<label for="nama">Nama Ekspedisi</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Ekspedisi" required>
					</div>
					<div class="form-group">
						<label for="hp">Nomor Handphone</label>
						<input type="text" class="form-control" name="hp" id="hp"  placeholder="Masukkan Nomor HP Ekspedisi" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat"  placeholder="Masukkan Alamat Ekspedisi" required>
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