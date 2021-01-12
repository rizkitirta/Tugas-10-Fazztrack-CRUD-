<?php 
session_start();
if(!isset($_SESSION['login'])){
  header("Location: login.php");
  exit;
}

require 'functions.php';
$produk = query("SELECT * FROM produk");

if(isset($_POST['cari'])) {
  $produk = search($_POST['keyword']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 10 CRUD</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  

   <h1>Daftar Produk</h1>

   <div class="search">
     <form action="" method="post">
       <input type="text" class="keyword" placeholder="Masukan Pencarian.." name="keyword" autofocus autocomplete="off">
       <button type="submit" name="cari" style="color:white; font-weight:bold;">Cari</button>
     </form>
   </div>

   <div class="link">
     <button>
        <a href="tambahData.php">Tambah Produk</a> 
     </button>
     <button class="logout">
        <a href="logout.php">Logout</a>
     </button>
   </div>

   <div class="container">
      <table cellpadding="10" border="2" cellspacing="3">
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Keterangan</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Aksi</th>
        </tr>
        <?php $i=1; 
        foreach($produk as $p): ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $p['nama_produk']; ?></td>
          <td><?= $p['keterangan']; ?></td>
          <td><?= $p['harga']; ?></td>
          <td><?= $p['jumlah']; ?></td>
          <td>
             <button><a href="editData.php?id=<?= $p['id']; ?>" name="edit">Edit</a></button> |
             <button><a href="hapusData.php?id=<?= $p['id']; ?>" onclick="return confirm('Apakah Anda Yakin?');" name="hapus">Hapus</a></button>
          </td>
        </tr>
        <?php endforeach; ?>
      </table> 
   </div>

</body>
</html>