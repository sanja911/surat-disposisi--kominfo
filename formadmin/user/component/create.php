<?php
session_start();
if(isset($_SESSION['username_user'])){
	$username = $_SESSION['username_user'];
}
include "../../../config/koneksi.php";
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
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="../assets/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="../assets/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="../assets/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="../assets/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="../assets/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="../assets/css/style.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="brand clearfix">
		<a href="index.php" class="logo"><img src="../assets/img/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li><a href="#">Selamat Datang <?php echo $username ?></a></li>
			<li class="ts-account">
				<a href="#"><img src="../assets/img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="../../../login/logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				
				<li class="ts-label">Main</li>
				<li><a href="../../"><i class="fa fa-dashboard"></i>Dashboard</a></li>
				<li><a href="../../surat/datasurat.php"><i class="fa fa-desktop"></i>Data Surat</a>
				<li class="open"><a href="../"><i class="fa fa-users"></i>Users</a></li>
				</li>
			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
<h1 class="page-header">Tambah Data User</h1>
<div class="panel panel-default">
   <div class="row">
      
  
  </div>
</div>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
<h3>A. Data User</h3>
<div class="form-group">
								<label>NIP</label>
									<input class="form-control" placeholder="NIP" name="nip" required >
								</div>
								
								<div class="form-group">
									<label>Nama User</label>
									<input class="form-control" placeholder="Nama User" name="nama_user" required>
								</div>
								<div class="form-group">
									<label>Username </label>
									<input class="form-control" placeholder="Username" name="username_user" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" name="password_user" placeholder="Password" required >
								</div>
									<div class="form-group">
									<label>Jabatan</label>
									<input class="form-control" name="jabatan" placeholder="Jabatan" required >
								</div>
									<div class="form-group">
									<label> Nama Bidang </label>
									<select class="form-control" name="nama_bdg" required>
        							<option value="" selected disabled>- Pilih Bidang -</option>
        							<option value="Sekretariat">Sekretariat</option>
        							<option value="Bidang Pelayanan Informasi dan Komunikasi">Bidang Pelayanan Informasi dan Komunikasi</option> 
        							<option value="Bidang Aplikasi Dan Infrastruktur Informatika">Bidang Aplikasi Dan Infrastruktur Informatika</option>
        							<option value="Bidang Persandian Dan Data Statistik">Bidang Persandian Dan Data Statistik
        							</option>
      								</select>
								</div>
								<div class="form-group">
									<label> Level </label>
									<select class="form-control" name="level" required>
        							<option value="" selected disabled>- Jadikan sebagai -</option>
        							<option value="admin">Admin</option>
        							<option value="user">User</option>
        							</select>
        							</div>								
<button type="submit" name="add" class="btn btn-primary btn-lg">
  <i class="glyphicon glyphicon-floppy-save"></i> Simpan
</button>
</form>
			<?php
			include "../../../config/koneksi.php";
				if (isset($_POST['add'])) {
							$nip = htmlspecialchars($_POST['nip']);
							$nama_user = htmlspecialchars($_POST['nama_user']);
							$jabatan = htmlspecialchars($_POST['jabatan']);
							$nama_bdg = htmlspecialchars($_POST['nama_bdg']);
							$username_user = htmlspecialchars($_POST['username_user']);
							$password_user = htmlspecialchars($_POST['password_user']);
							$level = htmlspecialchars($_POST['level']);
							
					$query = "INSERT INTO user (level, nip, nama_user, jabatan, nama_bdg, username_user, password_user) VALUES ('$level', $nip, '$nama_user','$jabatan', '$nama_bdg', '$username_user', '$password_user')";
					$hasil = mysqli_query($db, $query);
			if ($hasil == true) {
				echo "<script>window.alert('Tambah user berhasil'); window.location.href='../'</script>";
			} else {
				echo "<script>window.alert('Username Sudah Tersedia!'); window.location.href='create.php'</script>";
			}
				}
			?>
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
