<?php
session_start();
if(isset($_SESSION['username_user'])){
	$name = $_SESSION['username_user'];
}
include "../../../config/koneksi.php";

// ambil data dari form
$id_user = htmlspecialchars($_GET['id_user']);

// cegah hapus data sendiri
if (['id_user'] == $id_user) {
  echo "<script>window.alert('Tidak dapat menghapus data sendiri!'); window.location.href='../user'</script>";
  exit;
}

// delete database
$query = "DELETE FROM user WHERE id_user = '$id_user'";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.location.href='../'</script>";
} else {
  echo "<script>window.alert('Data user gagal dihapus!'); window.location.href='../'</script>";
}