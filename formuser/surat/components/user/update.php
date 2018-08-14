<?php
session_start();
if(isset($_SESSION['username_user'])){
	$name = $_SESSION['username_user'];
}
include "../config/koneksi.php";


// ambil data dari form
$nama_user = htmlspecialchars($_POST['nama_user']);
$password_user = htmlspecialchars($_POST['password_user']);
$jabatan =	htmlspecialchars($_POST['jabatan']);

$query = "UPDATE user SET nama_user = '$nama_user', password_user = '$password_user', jabatan = '$jabatan' WHERE username_user = '$name';";
$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Ubah data surat berhasil,solahkan login kembali'); window.location.href='../../../../login/logout.php'</script>";
} else {
  echo "<script>window.alert('Ubah data surat gagal!'); window.location.href='../../user.php'</script>";
//
  }