<?php 

require 'functions.php';
session_start();

if(!isset($_SESSION['login'])){
  header("Location: login.php");
  exit;
}

$id = $_GET['id'];

if(!isset($_GET['id']) ) {
	header("Location: index.php");
  exit;
}


   if (hapusData($id) > 0 ) {
		echo "<script> 
				 alert('Data Berhasil Dihapus!!');
				 document.location.href = 'index.php';
		      </script>";
	}else {
		echo "<script> 
				 alert('Data Gagal Dihapus!!');
				 document.location.href = 'index.php';
		      </script>";
	}


?>