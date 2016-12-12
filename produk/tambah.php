<?php
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		require('../database/connect.php');

		$stmt = $db->prepare("INSERT INTO produk(kode_produk, nama, harga) VALUES(?,?,?)");
		$stmt->bind_param('sss', $_POST['kode_produk'], $_POST['nama'], $_POST['harga']);
		
		if($stmt->execute()){
			header('Location:index.php');
		} else {
			 die('data gagal ditambahkan');
		}
	}
?>
<html>
<head>
	<title>Tambah Produk</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

</head>
<body>
<div class="container bg-info">
	<div class="row">
		<div class="col-md-2">
			<?php include('../include/sidebar.php'); ?>
		</div>
		<div class="col-md-10 text">
			<h1 class="text-center bg-primary">Tambah Produk</h1>
			<div class="col-md-6 col-md-offset-3">
				<form name="formPelanggan" id="formPelanggan" method="post" action="<?=($_SERVER['PHP_SELF'])?>">
					<div class="form-group">
						<label for="kode_produk">Kode Produk</label>
						<input type="text" class="form-control"  name = "kode_produk" id="kode_pelanggan"  placeholder="Masukkan Kode Produk" required>
					</div>
					<div class="form-group">
						<label for="nama">Nama Produk</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Produk" required>
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="text" class="form-control" name="harga" id="harga"  placeholder="Masukkan Harga Produk" required>
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