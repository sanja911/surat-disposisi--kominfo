<?php
session_start();
if(!isset($_SESSION['username_user'])){
die("Anda Belum login");
}
if($_SESSION['level']!="admin"){
    die("Anda bukan Admin");
}
include "../../config/koneksi.php";

?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Data Surat</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="assets/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="assets/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="assets/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="assets/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="brand clearfix">
		<a href="index.php" class="logo"><img src="assets/img/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li><a href="#">Selamat Datang <?php echo $_SESSION['username_user'] ?></a></li>
			<li class="ts-account">
				<a href="#"><img src="assets/img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="../login/logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				
				<li class="ts-label">Main</li>
				<li><a href="../"><i class="fa fa-dashboard"></i>Dashboard</a></li>
				<li class="open"><a href="datasurat.php"><i class="fa fa-desktop"></i>Data Surat</a>
				<li><a href="#"><i class="fa fa-users"></i>Users</a></li>
				</li>
			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Data Surat</h2>
						<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      
  </div>
</div>
<form action="update.php" method="post">
<h3>A. Data Surat Masuk</h3>
<table class="table table-striped table-middle">
  <?php
$get_id_surat = $_GET['id_surat'];

// ambil dari database
$query = "SELECT * FROM surat WHERE id_surat = $get_id_surat";


$hasil = mysqli_query($db, $query);
$data_surat = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_surat[] = $row;
}
?>	
<tr>
    <th width="20%">ID Surat</th>
    <td width="1%">:</td>
    <td><input type="text" class="form-control" name="id_surat" value="<?php echo $data_surat[0]['id_surat'] ?>"></td>
  </tr>
  <tr>
    <th width="20%">Tanggal Surat</th>
    <td width="1%">:</td>
    <td><input type="text" class="form-control datepicker" name="tgl_surat" value="<?php echo $data_surat[0]['tgl_surat'] ?>"></td>
  </tr>
  <tr>
    <th>Nomor Surat</th>
    <td>:</td>
    <td><input type="text" class="form-control" name="nmr_surat" value="<?php echo $data_surat[0]['nmr_surat'] ?>" required></td>
  </tr>
  <tr>
    <th>Tanggal </th>
    <td>:</td>
    <td><input type="text" class="form-control datepicker" name="tanggal" value="<?php echo $data_surat[0]['tanggal'] ?>"></td>
  </tr>
  <tr>
    <th>Perihal</th>
    <td>:</td>
    <td><input type="textarea" class="form-control" name="perihal" value="<?php echo $data_surat[0]['perihal'] ?>" required></td>
  </tr>
  <tr>
    <th>Nama Pengirim</th>
    <td>:</td>
    <td><input type="textarea" class="form-control" name="nama" value="<?php echo $data_surat[0]['nama'] ?>" required></td>
  </tr>
  <tr>
    <th width="20%">Diteruskan Kepada</th>
    <td width="1%">:</td>
    <td><select class="form-control selectpicker" name="nama_bdg" required>
        <option value="" selected disabled>- Pilih Bidang -</option>
        <option value="Sekretariat">Sekretariat</option>
        <option value="Bidang Pelayanan Informasi dan Komunikasi">Bidang Pelayanan Informasi dan Komunikasi</option> 
        <option value="Bidang Aplikasi Dan Infrastruktur Informatika">Bidang Aplikasi Dan Infrastruktur Informatika</option>
        <option value="Bidang Persandian Dan Data Statistik">Bidang Persandian Dan Data Statistik
        </option>
      </select></td>
  
                 
</table>

<button type="submit" class="btn btn-primary btn-lg">
  <i class="glyphicon glyphicon-floppy-save"></i> Simpan
</button>
<input type="hidden" name="id_surat" value="<?php echo $data_surat[0]['id_surat'] ?>">
</form>
        </div> <!-- ./col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main -->
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- Datatable -->
    <script src="../../assets/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="../../assets/js/dataTables.bootstrap.min.js" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable();
    });
    </script>

    <!-- Date Range Picker -->
    <script type="text/javascript" src="../../assets/js/moment.min.js"></script>
    <script type="text/javascript" src="../../assets/js/daterangepicker.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'YYYY-MM-DD',
              monthNames: [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember"
             ],
              "daysOfWeek": [
                "Mg",
                "Sn",
                "Sl",
                "Rb",
                "Km",
                "Jm",
                "Sb"
              ]
            }
        });
    });
    </script>

    <!-- Bootstrap Select -->
    <script src="../../assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
    $('.selectlive').selectpicker({
      liveSearch: true,
      size: 6
    });
    $('.selectpicker').selectpicker();
    </script>

    <!-- Lightbox -->
    <script src="../../assets/lib/lightbox/js/lightbox.min.js"></script>
  </body>
</html>
