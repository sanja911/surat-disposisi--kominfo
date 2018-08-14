<?php
session_start();
if(!isset($_SESSION['username_user'])){
die("Anda Belum login");
}
if($_SESSION['level']!="user"){
    die("Anda bukan User");
}
include "../../config/koneksi.php";

$get_id_surat = $_GET['id_surat'];

$query = "UPDATE surat SET keterangan = 'Sudah dibaca' where id_surat='$get_id_surat'";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Konfirmasi Terkirim'); window.location.href='datasurat.php'</script>";
} else {
  echo "<script>window.alert('Konfirmasi Gagal!'); window.location.href='datasurat.php'</script>";
}