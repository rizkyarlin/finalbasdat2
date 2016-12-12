<?php
	require('../database/connect.php');	

	$query = "SELECT * FROM pelanggan";					
	
	if(isset($_GET['keyword']) || $_GET['keyword']!==NULL){
		$keyword = preg_replace("#[^0-9a-z]i#","", $_GET['keyword']);
		$query = "SELECT * FROM pelanggan WHERE nama LIKE '%$keyword%' OR kode_pelanggan LIKE '%$keyword%'";
	}
	
	$rs = $db->query($query);
	$rs->fetch_assoc();
	$num = 0;
?>
<html>
<head>
	<title>Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

</head>
<body>
<div class="container bg-info">
	<div class="row">
		<div class="col-md-2">
			<?php include('../include/sidebar.php'); ?>
		</div>
		<div class="col-md-10">
		<h1 class="text-center bg-primary">Pelanggan</h1>
		<form class="form search col-md-5 pull-right" method="get">
			<div id="custom-search-input">
		        <div class="input-group">
		            <input type="text" name="keyword" class="form-control input-lg" placeholder="Masukkan Keyword" />
		            <span class="input-group-btn">
		            	<button class="btn btn-info btn-lg" type="submit">
		          			<i class="glyphicon glyphicon-search"></i>
		                </button>
		            </span>
		        </div>
		    </div>
		</form>
			<table class="table well">
				<thead>
					<th>#</th>
					<th>Kode Pelanggan</th>
					<th>Nama</th>
					<th>Umur</th>
					<th>Nomor HP</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</thead>
				<?php 
				foreach ($rs as $row) {
					echo '<tr>
							<td >'. ++$num .'</td>
							<td class="col-md-2">'. $row['kode_pelanggan'] .'</td>
							<td class="col-md-2">'. $row['nama'] .'</td>
							<td class="col-md-1">'. $row['umur'] .'</td>
							<td class="col-md-2">'. $row['hp'] .'</td>
							<td class="col-md-3">'. $row['alamat'] .'</td>
							<td class="col-md-2">'. 
								'<div class="btn-group"> 
									<a href="update.php?id='.$row['id'].'" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></a>
									<a href="delete.php?id='.$row['id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></a>
								</div>'
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