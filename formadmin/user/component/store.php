<?php
session_start();
if(!isset($_SESSION['username_user'])){
die("Anda Belum login");
}
if($_SESSION['level']!="admin"){
    die("Anda bukan Admin");
}
include "../../../config/koneksi.php";
$nip = htmlspecialchars($_POST['nip']);
$nama_user = htmlspecialchars($_POST['nama_user']);
$jabatan = htmlspecialchars($_POST['jabatan']);
$nama_bdg = htmlspecialchars($_POST['nama_bdg']);
$username_user = htmlspecialchars($_POST['username_user']);
$password_user = htmlspecialchars($_POST['password_user']);
$id_user = $_POST['id_user'];



// masukkan ke database

$query = "INSERT INTO user (id_user, nip, nama_user, jabatan, nama_bdg, username_user, password_user) VALUES ('$id_user', $nip, '$nama_user','$jabatan', '$nama_bdg', '$username_user', '$password_user')";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Tambah user berhasil'); window.location.href='../'</script>";
} else {
	echo "<script>window.alert('Tambah user gagal!'); window.location.href='create.php'</script>";
}