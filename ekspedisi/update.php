<?php
	require('../database/connect.php');

	if($_SERVER['REQUEST_METHOD'] === 'GET'){
		$query = "SELECT * FROM ekspedisi WHERE id=" . $_GET['id'];
		$rs = $db->query($query);
		$row = $rs->fetch_row();
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		require('../database/connect.php');
		$stmt = $db->prepare("UPDATE ekspedisi SET 
								kode_ekspedisi = ? 
								, nama = ?
								, hp = ?
								, alamat = ?
								WHERE id = ?
								");
		$stmt->bind_param('sssss', $_POST['kode_ekspedisi'], $_POST['nama'], $_POST['hp'], $_POST['alamat'], $_POST['id']);

		if ($stmt->execute()) {
			header('Location: index.php');
		} else {
			die('data gagal diupdate');
		}
	}

?>
<html>
<head>
	<title>Update Ekspedisi</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

</head>
<body>
<div class="container bg-info">
	<div class="row">
		<div class="col-md-2">
			<?php include('../include/sidebar.php'); ?>
		</div>
		<div class="col-md-10 text">
		<h1 class="text-center bg-primary">Update Ekspedisi</h1>
			<div class="col-md-6 col-md-offset-3">
				<form name="formEkspedisi" id="formEkspedisi" method="post" action="">
					<div class="form-group">
						<label for="kode_ekspedisi">Kode Ekspedisi</label>
						<input type="text" class="form-control"  name = "kode_ekspedisi" id="kode_ekspedisi"  value="<?=($row[1]);?>" required>
					</div>
					<div class="form-group">
						<label for="nama">Nama Ekspedisi</label>
						<input type="text" class="form-control" name="nama" id="nama" value="<?=($row[2]);?>" required>
					</div>					
					<div class="form-group">
						<label for="hp">Nomor Handphone</label>
						<input type="text" class="form-control" name="hp" id="hp"  value="<?=($row[3]);?>" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat"  value="<?=($row[4]);?>" required>
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