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
<h1 class="page-header">Data surat</h1>
<div class="panel panel-default">
  
    <div class="row">
  
  </div>
</div>
<br><form role="form" action="<?=$_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
									<label>Tanggal Surat</label>
									<input class="form-control datepicker" name="tgl_surat" required >
								</div>
								
								<div class="form-group">
									<label>Nomor Surat</label>
									<input class="form-control" placeholder="Nomor Surat" name="nmr_surat" required>
								</div>
								<div class="form-group">
									<label>Tanggal Diterima</label>
									<input class="form-control datepicker" name="tanggal" required>
								</div>
								<div class="form-group">
									<label>Perihal</label>
									<input class="form-control" name="perihal" placeholder="perihal" required >
								</div>
									<div class="form-group">
									<label>Nama Pengirim</label>
									<input class="form-control" name="nama" placeholder="Nama Pengirim" required >
								</div>
								<div class="form-group">
									<label> Diteruskan Kepada </label>
									<select class="form-control" name="nama_bdg" required>
        							<option value="" selected disabled>- pilih bidang -</option>
        							<option value="Sekretariat">Sekretariat</option>
        							<option value="Bidang Pelayanan Informasi dan Komunikasi">Bidang Pelayanan Informasi dan Komunikasi</option> 
        							<option value="Bidang Aplikasi Dan Infrastruktur Informatika">Bidang Aplikasi Dan Infrastruktur Informatika</option>
        							<option value="Bidang Persandian Dan Data Statistik">Bidang Persandian Dan Data Statistik
        							</option>
      								</select>
								</div>
								
									<div class="form-group">
									<label>Keterangan</label>
									<input class="form-control" placeholder="Keterangan" name="keterangan" disabled>
								</div>
								
								<div class="form-group">
									<label>Upload File</label>
									<input type="file" name="file">
									<p class="help-block">Format dokumen (format pdf)</p>
								</div>
								<input type="submit" name="add" class="btn btn-primary" value="simpan">
									<button type="reset" class="btn btn-default">Cancel</button>
								</div>
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

<?php
include "../../config/koneksi.php";
							if (isset($_POST['add'])) {
							$username=$_SESSION['username_user'];
							$tgl_surat = $_POST['tgl_surat'];
							$nmr_surat = $_POST['nmr_surat'];
							$tanggal = $_POST['tanggal'];
							$perihal = $_POST['perihal'];
							$nama = $_POST['nama'];
							$keterangan = $_POST['keterangan'];
							$nama_bdg = $_POST['nama_bdg'];
							$ekstensi_diperbolehkan	= array('pdf','docx');
							$name = $_FILES['file']['name'];
							$x = explode('.', $name);
							$ekstensi = strtolower(end($x));
							$ukuran	= $_FILES['file']['size'];
							$file_tmp = $_FILES['file']['tmp_name'];	
								if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
									if($ukuran < 1044090000){			
									move_uploaded_file($file_tmp, '../../file/'.$name);
				
						$query = "INSERT INTO surat (id_surat,username_user, tgl_surat, nmr_surat, tanggal, perihal, nama,file, keterangan, nama_bdg,created_at, updated_at) VALUES (NULL,'$username', '$tgl_surat', '$nmr_surat', '$tanggal', '$perihal', '$nama','$name', '$keterangan','$nama_bdg',  CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000')";
						$hasil = mysqli_query($db, $query);

							// cek keberhasilan pendambahan data
							if ($hasil == true) {
							echo "<script>window.alert('Tambah surat berhasil'); window.location.href='datasurat.php'</script>";
							} else {
							echo "<script>window.alert('Tambah surat gagal!'); window.location.href='create.php'</script>";
							}
									}
								}
							}
							?>