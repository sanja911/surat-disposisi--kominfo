<?php
session_start();
if(!isset($_SESSION['username_user'])){
die("Anda Belum login");
}
if($_SESSION['level']!="admin"){
    die("Anda bukan Admin");
}
include "../../config/koneksi.php";
$get_id_surat = $_GET['id_surat'];
// ambil dari database
$query = "SELECT * FROM surat WHERE id_surat = $get_id_surat";
$hasil = mysqli_query($db, $query);
$data_surat = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_surat[] = $row;
}
?>	

<embed src="../../file/<?php echo $data_surat[0]['file']?>" />
<script>window.alert('Download berhasil'); window.location.href='datasurat.php'</script>;
