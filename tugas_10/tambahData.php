<?php 

require 'functions.php';
session_start();

if(!isset($_SESSION['login'])){
  header("Location: login.php");
  exit;
}

if(isset($_POST['simpan'])) {
	if(tambahData($_POST) > 0 ) {
		echo "<script> 
				 alert('Data Berhasil Ditambahkan!');
				 document.location.href = 'index.php';
		      </script>";
	}else {
		echo "<script> 
				 alert('Data Gagal Ditambahkan!');
				 document.location.href = 'tambahData.php';
		      </script>";
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data</title>
</head>
<body>
	
     <div class="container">
	 <h1>Form Tambah Produk :</h1>
		 <form action="" method="post" class="form">
			 <ul>
				 <li>
					 <label>
						 Nama Produk : <br>
						 <input type="text" name="namaProduk" autofocus required>
					 </label>
				 </li>
				 <br>
				 <li>
					 <label>
						 Keterangan : <br>
						 <input type="text" name="keterangan" autofocus required>
					 </label>
				 </li>
				 <br>
				 <li>
					 <label>
						 Harga : <br>
						 <input type="text" name="harga" autofocus required>
					 </label>
				 </li>
				 <br>
				 <li>
					 <label>
						 Jumlah : <br>
						 <input type="text" name="jumlah" autofocus required>
					 </label>
				 </li>
			 </ul>
			 <button type="submit" name="simpan" style="margin-left:40px;">Simpan</button>
			 <button type="reset" name="reset">Reset</button>
		 </form>
	 </div>



</body>
</html>