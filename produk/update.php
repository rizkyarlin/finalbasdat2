<?php
	require('../database/connect.php');

	if($_SERVER['REQUEST_METHOD'] === 'GET'){
		$query = "SELECT * FROM produk WHERE id=" . $_GET['id'];
		$rs = $db->query($query);
		$row = $rs->fetch_row();
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		require('../database/connect.php');
		$stmt = $db->prepare("UPDATE produk SET 
								kode_produk = ? 
								, nama = ?
								, harga = ?
								WHERE id = ?
								");
		$stmt->bind_param('ssss', $_POST['kode_produk'], $_POST['nama'], $_POST['harga'], $_POST['id']);

		if ($stmt->execute()) {
			header('Location: index.php');
		} else {
			die('data gagal diupdate');
		}
	}

?>
<html>
<head>
	<title>Update Produk</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

</head>
<body>
<div class="container bg-info">
	<div class="row">
		<div class="col-md-2">
			<?php include('../include/sidebar.php'); ?>
		</div>
		<div class="col-md-10 text">
		<h1 class="text-center bg-primary">Update Produk</h1>
			<div class="col-md-6 col-md-offset-3">
				<form name="formProduk" id="formProduk" method="post" action="">
					<div class="form-group">
						<label for="kode_produk">Kode Produk</label>
						<input type="text" class="form-control"  name = "kode_produk" id="kode_produk"  value="<?=($row[1]);?>" required>
					</div>
					<div class="form-group">
						<label for="nama">Nama Produk</label>
						<input type="text" class="form-control" name="nama" id="nama" value="<?=($row[2]);?>" required>
					</div>					
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="text" class="form-control" name="harga" id="harga"  value="<?=($row[3]);?>" required>
					</div>
					<input type="hidden" name="id" value="<?=($_GET['id']);?>">
					<div class="text-center">
						<button type="submit" class="btn btn-info">Update</button>
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