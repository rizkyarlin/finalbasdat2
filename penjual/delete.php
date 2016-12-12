<?php
	if($_SERVER['REQUEST_METHOD'] === 'GET'){
		require('../database/connect.php');

		$query = "DELETE FROM penjual WHERE id=" . $_GET['id'];

		if ($db->query($query)) {
			header('Location: index.php');
		} else {
			die('gagal menghapus record');
		}
		
	}
?>