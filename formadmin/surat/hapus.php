<?php
session_start();
if(!isset($_SESSION['username_user'])){
die("Anda Belum login");
}
if($_SESSION['level']!="admin"){
    die("Anda bukan Admin");
}
include "../../config/koneksi.php";

// ambil data dari form
$id_surat = htmlspecialchars($_GET['id_surat']);

// delete database
$query = "DELETE FROM surat WHERE id_surat = $id_surat";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.location.href='datasurat.php'</script>";
} else {
  echo "<script>window.alert('Data surat gagal dihapus!'); window.location.href='datasurat.php'</script>";
}