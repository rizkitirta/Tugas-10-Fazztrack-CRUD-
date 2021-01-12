<?php 
function koneksi() {
	return mysqli_connect('localhost','root','','arkademy');
}

function query($query) {
  $conn = koneksi();
  $result = mysqli_query($conn,$query);

  if(mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while($row = mysqli_fetch_assoc($result)) {
	  $rows[] = $row;
  }
  	return $rows;
}


function tambahData($data) {
  $conn = koneksi();

  $namaProduk = htmlspecialchars($data['namaProduk']);
  $keterangan = htmlspecialchars($data['keterangan']);
  $harga = htmlspecialchars($data['harga']);
  $jumlah = htmlspecialchars($data['jumlah']);

  $query = "INSERT INTO produk 
              VALUES
              (null,'$namaProduk','$keterangan', '$harga', '$jumlah' )";
  
  mysqli_query($conn,$query);
  mysqli_error($conn);  
  return mysqli_affected_rows($conn);
  
}


function editData($data) {
   $conn = koneksi();
  
  $id = $data['id'];
  $namaProduk = htmlspecialchars($data['namaProduk']);
  $keterangan = htmlspecialchars($data['keterangan']);
  $harga = htmlspecialchars($data['harga']);
  $jumlah = htmlspecialchars($data['jumlah']);

  $query = "UPDATE produk SET
           nama_produk = '$namaProduk',
           keterangan = '$keterangan',
           harga = '$harga',
           jumlah = '$jumlah'
           WHERE id = $id ";
  
  mysqli_query($conn,$query);
  mysqli_error($conn);  
  return mysqli_affected_rows($conn);
}

function hapusData($id) {
  	$conn = koneksi();

	mysqli_query($conn,"DELETE FROM produk WHERE id = $id"); 
	mysqli_error($conn);
	return mysqli_affected_rows($conn);
}

function search($keyword) {
  $conn = koneksi();

  $query = "SELECT * FROM produk 
            WHERE nama_produk LIKE '%$keyword%' ";
  $result =  mysqli_query($conn,$query);

  $rows = [];
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function login($data) {
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if(query("SELECT * FROM user WHERE username = '$username' && password = '$password'")) {
		$_SESSION['login'] = true;
		header("Location: index.php");
		exit;
	}else {
		return [
			'error' => true,
			'pesan' => 'password/username salah!'
		];
	}
}



?>