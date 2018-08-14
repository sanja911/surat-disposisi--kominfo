<?php
session_start();
if(!isset($_SESSION['username_user'])){
die("Anda Belum login");
}
if($_SESSION['level']!="user"){
    die("Anda bukan User,silahkan daftar");
}
include "../config/koneksi.php";

?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Halaman User</title>

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
				<a href="#">Account <i class="fa fa-angle-down hidden-side"></i></a>
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
				<li class="open"><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
				<li><a href="surat/datasurat.php ?>"><i class="fa fa-desktop"></i>Data Surat</a>
				<li><a href="surat/user.php"><i class="fa fa-users"></i>Users</a></li>
				</li>
			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						<?php 
				$name= $_SESSION['username_user'];		
				$query="select * from user where username_user='$name'";	
				$hasil=mysqli_query($db,$query);
				$bdg=mysqli_fetch_assoc($hasil);
				$query_surat = "SELECT COUNT(*) AS total FROM surat where nama_bdg='$bdg[nama_bdg]'";
				$hasil_surat = mysqli_query($db, $query_surat);
				$jumlah_surat = mysqli_fetch_assoc($hasil_surat);
				$query_tgl = "SELECT COUNT(tanggal) AS jml FROM surat where tanggal=CURDATE() and nama_bdg='$bdg[nama_bdg]'";
				$hasil_tgl = mysqli_query($db, $query_tgl);
				$jumlah_tgl = mysqli_fetch_assoc($hasil_tgl);
			
						?>
						<div class="row">
							<div class="col-sm-6 col-md-4">
								<div class="panel panel-primary">
									<div class="panel-body">
									    <h3>Data Surat</h3>
									    <p>Total ada <?php echo $jumlah_surat['total'];?> surat masuk</p>
									</div>
										<div class="panel-footer">
											<a href="surat/datasurat.php" class="btn btn-primary" role="button">
											    <span class="glyphicon glyphicon-list-alt"></span> Detil »
												</a>
      </div>
    </div>
  </div>
  <div class="row">
							<div class="col-sm-6 col-md-4">
								<div class="panel panel-primary">
									<div class="panel-body">
									    <h3>Data Surat</h3>
									    <p>Total ada <?php echo $jumlah_tgl['jml'];?> surat masuk hari ini</p>
									</div>
										<div class="panel-footer">
											<a href="surat/datasurat.php" class="btn btn-primary" role="button">
											    <span class="glyphicon glyphicon-list-alt"></span> Detil »
												</a>
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
	
	<script>
	var doughnutData = [
	    {
	        value: <?php echo $user ?>,
	        color:"#2ECC71",
	        highlight: "#87D37C",
	        label: "User"
	    },
	    {
	        value: <?php echo $tanya ?>,
	        color: "#46BFBD",
	        highlight: "#5AD3D1",
	        label: "Tanya"
	    },
	    {
	        value: <?php echo $jawaban ?>,
	        color: "#FDB45C",
	        highlight: "#FFC870",
	        label: "Jawaban"
	    }
	]


	window.onload = function(){

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>

</html>