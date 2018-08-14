<?php
include "/session.php";
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
			<li><a href="#">Selamat Datang <?php echo $_SESSION['username_user'] ?></a></li>
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
				<li><a href="../../surat/datasurat.php"><i class="fa fa-desktop"></i>Data User</a>
				<li class="open"><a href="../"><i class="fa fa-users"></i>Users</a></li>
				</li>
			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
<h1 class="page-header">Data surat</h1>
<div class="panel panel-default">
    <div class="row">
      
      <div class="col-md-2">
        <a href="create.php" class="btn btn-primary">
          <i class="glyphicon glyphicon-file"></i> Tambah
        </a>
      </div>
      
      
  </div>
</div>
<?php
$get_user = $_GET['username_user'];
include('../../../config/koneksi.php');

// ambil dari database
$query = "SELECT * FROM user where username_user='$get_user'";

$hasil = mysqli_query($db, $query);

$data_user = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_user[] = $row;
}

?>

<h3>A. Data User : <?php echo $data_user[0]['nama_user'] ?> </h3>
<table class="table table-striped table-middle">
  <tr>
    <th width="20%">NIP</th>
    <td width="1%">:</td>
    <td><?php echo $data_user[0]['nip'] ?></td>
  </tr>
  <tr>
    <th>Nama</th>
    <td>:</td>
    <td><?php echo $data_user[0]['nama_user'] ?></td>
  </tr>
  <tr>
    <th>Level</th>
    <td>:</td>
    <td><?php echo $get_user ?></td>
  </tr>
  <tr>
    <th>Jabatan</th>
    <td>:</td>
    <td><?php echo $data_user[0]['jabatan'] ?></td>
  </tr>
  <tr>
    <th>Bidang</th>
    <td>:</td>
    <td><?php echo $data_user[0]['nama_bdg'] ?></td>
  </tr>
  <tr>
    <th>Username</th>
    <td>:</td>
    <td><?php echo $data_user[0]['username_user'] ?></td>
  </tr>
  <tr>
    <th>Password</th>
    <td>:</td>
    <td><?php echo $data_user[0]['password_user'] ?></td>
  </tr>

</table>