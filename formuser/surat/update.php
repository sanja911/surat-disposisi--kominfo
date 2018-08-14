<?php
session_start();
if(!isset($_SESSION['username_user'])){
die("Anda Belum login");
}
if($_SESSION['level']!="user"){
    die("Anda bukan User");
}
include "../../config/koneksi.php";


// ambil data dari form

$name = $_SESSION['username_user'];
$username_user=htmlspecialchars($_POST['username_user']);
$nip=htmlspecialchars($_POST['nip']);

$nama_user = htmlspecialchars($_POST['nama_user']);
$password_user = htmlspecialchars($_POST['password_user']);


$query = "UPDATE user SET nip='$nip', nama_user = '$nama_user', password_user = '$password_user', username_user='$username_user' WHERE username_user = '$name';";
$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
 echo "<script>window.alert('Ubah data user berhasil'); window.location.href='../../login/logout.php'</script>";
} else {
  echo "<script>window.alert('Username Sudah Tersedia!'); window.location.href='edit.php?id_user=$id_user'</script>";

  }