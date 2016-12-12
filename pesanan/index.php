<?php
	require('../database/connect.php');
	$query = "SELECT psn.id
			, psn.kode_pesanan
			, plg.nama AS nama_pelanggan
			, prd.nama AS nama_produk
			, prd.harga AS harga_produk
			, psn.kuantitas AS kuantitas_produk
			, pjl.nama AS nama_penjual
			, eks.nama AS nama_ekspedisi
			, (prd.harga * psn.kuantitas) AS total
			, plg.alamat AS alamat_pengiriman
			FROM pesanan AS psn
			INNER JOIN pelanggan AS plg ON psn.kode_pelanggan = plg.kode_pelanggan
			INNER JOIN produk AS prd ON psn.kode_produk = prd.kode_produk
			INNER JOIN penjual AS pjl ON psn.kode_penjual = pjl.kode_penjual
			INNER JOIN ekspedisi AS eks ON psn.kode_ekspedisi = eks.kode_ekspedisi
			";

	$rs = $db->query($query);
	$rs->fetch_assoc();
	$num = 0;
?>
<html>
<head>
	<title>Pesanan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

</head>
<body>
<div class="container bg-info">
	<div class="row">
		<div class="col-md-2">
			<?php include('../include/sidebar.php'); ?>
		</div>
		<div class="col-md-10">
		<h1 class="text-center bg-primary">Pesanan</h1>
			<table class="table well">
				<thead>
					<th>#</th>
					<th>Kode Pesanan</th>
					<th>Nama Pelanggan</th>
					<th>Nama Produk</th>
					<th>Harga Produk</th>
					<th>Qty</th>
					<th>Total</th>
					<th>Nama Penjual</th>
					<th>Nama Eskpedisi</th>
					<th>Alamat Pengiriman</th>
					<th>Aksi</th>
				</thead>
				<?php 
				foreach ($rs as $row) {
					echo '<tr>
							<td >'. ++$num .'</td>
							<td class="col-md-2">'. $row['kode_pesanan'] .'</td>
							<td class="col-md-1">'. $row['nama_pelanggan'] .'</td>
							<td class="col-md-1">'. $row['nama_produk'] .'</td>
							<td class="col-md-2">Rp. '. $row['harga_produk'] .'</td>
							<td class="col-md-1">'. $row['kuantitas_produk'] .'</td>
							<td class="col-md-2">Rp. '. $row['total'] .'</td>
							<td class="col-md-1">'. $row['nama_penjual'] .'</td>
							<td class="col-md-1">'. $row['nama_ekspedisi'] .'</td>
							<td class="col-md-2">'. $row['alamat_pengiriman'] .'</td>
							<td class="col-md-3">'. 
								'<a href="update.php?id='.$row['id'].'" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></a>
								<a href="delete.php?id='.$row['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></a>'
							 .'</td>
						</tr>';
				}
				?>
			</table>			
		</div>
		<div class="text-center"><a href="tambah.php" class="btn btn-info">Tambah</a></div>
	</div>

</div>
</body>
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/boostrap.js"></script>
</html>