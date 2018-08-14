<?php
session_start();
if(!isset($_SESSION['username_user'])){
die("Anda Belum login");
}
if($_SESSION['level']!="user"){
    die("Anda bukan User,silahkan daftar");
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
	
	<title>Data User</title>

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
			<li><a href="#">Selamat Datang</a></li>
			<li class="ts-account">
				<a href="#"><img src="assets/img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="..	/../login/logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				
				<li class="ts-label">Main</li>
				<li><a href="../"><i class="fa fa-dashboard"></i>Dashboard</a></li>
				<li><a href="datasurat.php"><i class="fa fa-desktop"></i>Data Surat</a>
				<li class="open"><a href="#"><i class="fa fa-users"></i>Users</a></li>
				</li>
			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

<?php
$name=$_SESSION['username_user'];
$query = "SELECT * FROM user WHERE username_user = '$name'";

$hasil = mysqli_query($db, $query);
$data_user = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_user[] = $row;
}
?>	
			<h3>Pengaturan Profil</h3>
					<form role="form" action="update.php" method="post" enctype="multipart/form-data">
						
						<div class="form-group">
						<label>NIP</label>
						<input class="form-control" type="text" placeholder="NIP" name="nip" value="<?php echo $data_user[0]['nip'];?>" >
						</div>
						<div class="form-group">
						<label>Nama Lengkap</label>
						<input class="form-control" type="text" name="nama_user" value="<?php echo $data_user[0]['nama_user'];?>">
						</div>
						<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" value="<?php echo $data_user[0]['username_user'];?>" name="username_user" placeholder="Username" >
						</div>
						<div class="form-group">
						<label>Password</label>
						<input class="form-control" type="text" value="<?php echo $data_user[0]['password_user'];?>" name="password_user" placeholder="Password">
						</div>
						<div class="form-group">
						<label>Jabatan</label>
						<input class="form-control" type="text" name="jabatan" value="<?php echo $data_user[0]['jabatan'];?>" placeholder="jabatan" disabled >
						</div>
						<div class="form-group">
						<label>Bidang </label>
						<input class="form-control" type="text" value="<?php echo $data_user[0]['nama_bdg'];?>" name="nama_bdg" placeholder="Nama Bidang" disabled >
						</div>
						<button type="submit" class="btn btn-primary btn-lg">
  						<i class="glyphicon glyphicon-floppy-save"></i> Simpan
						</button>
				    	</div>
							</form>

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

