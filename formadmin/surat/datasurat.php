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
					<li><a href="../../login/logout.php">Logout</a></li>
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
				<li><a href="../user/"><i class="fa fa-users"></i>Users</a></li>
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
      
      <div class="col-md-2">
        <a href="create.php" class="btn btn-primary">
          <i class="glyphicon glyphicon-file"></i> Tambah
        </a>
      </div>
      <div class="col-md-2">
        <a href="cetak-index.php" target="_blank" class="btn btn-primary">
          <i class="glyphicon glyphicon-print"></i> Cetak
        </a>
      </div>
    </div>
  </div>
</div>
<br>		
<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
						<?php
							include "components/tabel/tbl_surat.php";
						?>
</table>

      </div>
    </div>
  </div>
											

	<!-- Loading Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap-select.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/js/Chart.min.js"></script>
	<script src="assets/js/fileinput.js"></script>
	<script src="assets/js/main.js"></script>
	
	
</body>

</html>