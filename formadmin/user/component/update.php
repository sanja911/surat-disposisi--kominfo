<?php
session_start();
if(!isset($_SESSION['username_user'])){
die("Anda Belum login");
}
if($_SESSION['level']!="admin"){
    die("Anda bukan Admin");
}
include "../../../config/koneksi.php";


// ambil data dari form

$name = $_SESSION['username_user'];
$username_user=htmlspecialchars($_POST['username_user']);
$nip=htmlspecialchars($_POST['nip']);
$level = htmlspecialchars($_POST['level']);
$nama_user = htmlspecialchars($_POST['nama_user']);
$password_user = htmlspecialchars($_POST['password_user']);
$jabatan =	htmlspecialchars($_POST['jabatan']);
$nama_bdg=	htmlspecialchars($_POST['nama_bdg']);
$query = "UPDATE user SET level='$level', nip='$nip', nama_user = '$nama_user',jabatan='$jabatan',nama_bdg='$nama_bdg', password_user = '$password_user' WHERE username_user = '$username_user';";
$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
 echo "<script>window.alert('Ubah data surat berhasil'); window.location.href='../index.php'</script>";
} else {
  echo "<script>window.alert('Username Sudah Tersedia!'); window.location.href='edit.php?id_user=$id_user'</script>";

  }