<?php
	require_once('database/connect.php');
	require_once('database/initdb.php');
	
	try {
		$initdb = new initdb($db);
	} catch (Exception $e) {
		die('Error pada pembuatan tabel' . $e);
	}
?>


<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
</head>
<body>
	<div class="container bg-info">	
		<div class="row">
			<div class="col-md-2">
				<?php include('include/sidebar.php'); ?>
			</div>
			<div class="col-md-10">
				<h1 class="text-center bg-primary">Muh. Rizky Eka Arlin - D42114005</h1>
				<div class="jumbotron">
					<h3>
						<ul>
							<li>Saat Halaman ini terbuka, 5 tabel otomatis dibuat.</li>
							<li>Untuk CRUD dapat didemokan di bagian Pelanggan. Tab lain (kecuali Pesanan), cuma view saja. Bagian pelanggan sudah mencakup search dan 3 macam fetch</li>
							<li>Untuk melihat relasi antar tabel, dapat dilihat di tabel pesanan, dilakukan INNER JOIN beberapa kali.</li>

						</ul>
					</h3>
					<?php echo $initdb->message; ?>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="/basdat2/final/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/basdat2/final/assets/js/boostrap.js"></script>
</html>