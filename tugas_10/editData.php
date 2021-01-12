<?php 

require 'functions.php';
session_start();

if(!isset($_SESSION['login'])){
  header("Location: login.php");
  exit;
}

if(!isset($_GET['id']) ) {
	header("Location: index.php");
  exit;
}

$id = $_GET['id'];
$p = query("SELECT * FROM produk WHERE id = $id ");

if(isset($_POST['simpan'])) {
	if(editData($_POST) > 0 ) {
		echo "<script> 
				 alert('Data Berhasil Diubah!');
				 document.location.href = 'index.php';
		      </script>";
	}else {
		echo "<script> 
				 alert('Data Gagal Diubah!');
				 document.location.href = 'editData.php';
		      </script>";
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data</title>
</head>
<body>
	
     <div class="container">
		 <h1>Form Edit Produk</h1>
		 <form action="" method="post">
			 <input type="hidden" name="id" value="<?= $p['id']; ?>">
			 <ul>
				 <li>
					 <label>
						 Nama Produk : <br>
						 <input type="text" name="namaProduk" autofocus required value="<?= $p['nama_produk']; ?>">
					 </label>
				 </li>
				 <br>
				 <li>
					 <label>
						 Keterangan : <br>
						 <input type="text" name="keterangan" autofocus required value="<?= $p['keterangan']; ?>">
					 </label>
				 </li>
				 <br>
				 <li>
					 <label>
						 Harga : <br>
						 <input type="text" name="harga" autofocus required value="<?= $p['harga']; ?>">
					 </label>
				 </li>
				 <br>
				 <li>
					 <label>
						 Jumlah : <br>
						 <input type="text" name="jumlah" autofocus required value="<?= $p['jumlah']; ?>">
					 </label>
				 </li>
			 </ul>
			 <button type="submit" name="simpan" style="margin-left:40px;">Simpan</button>
			 <button type="reset" name="reset">Reset</button>
		 </form>
	 </div>



</body>
</html>