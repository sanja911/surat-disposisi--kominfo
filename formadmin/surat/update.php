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

$name = $_SESSION['username_user'];
$tgl_surat = htmlspecialchars($_POST['tgl_surat']);
$nmr_surat = htmlspecialchars($_POST['nmr_surat']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$perihal = htmlspecialchars($_POST['perihal']);
$nama = htmlspecialchars($_POST['nama']);
$nama_bdg = htmlspecialchars($_POST['nama_bdg']);
$id_surat = htmlspecialchars($_POST['id_surat']);

// update database

$query = "UPDATE surat SET tgl_surat = '$tgl_surat', nmr_surat = '$nmr_surat', tanggal = '$tanggal', perihal = '$perihal', nama = '$nama', nama_bdg = '$nama_bdg' WHERE id_surat = '$id_surat';";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Ubah data surat berhasil'); window.location.href='datasurat.php'</script>";
} else {
  //echo "<script>window.alert('Ubah data surat gagal!'); window.location.href='datasurat.php'</script>";
}