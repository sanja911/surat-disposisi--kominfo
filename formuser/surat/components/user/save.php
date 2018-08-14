<?php
	session_start();
	/**
	 * Jika Tidak login atau sudah login tapi bukan sebagai admin
	 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
	 */
	if ( !isset($_SESSION['user_login']) || 
	    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {

		header('location:./../../../index.html');
		exit();
	}

	// include database connection file
	include("../../../config.php");

	// Get data from Post to edit that user
	$id			= 'NULL';
	$name 		= $_POST["name"];
	$hp 		= $_POST["hp"];
	$alamat		= $_POST["alamat"];
	$email		= $_POST["email"];
	$username	= $_POST["username"];
	$password	= $_POST["password"];
	$level		= $_POST["level"];


	// Edit user row from table based on given id
	$result = mysqli_query($dbconnect, "INSERT INTO `users` (`id_user`, `nama`, `no_hp`, `alamat`, `email`, `username`, `password`, `level_user`) VALUES ('$id', '$name', '$hp', '$alamat', '$email', '$username', md5('$password'), '$level')");
		 
	// After delete redirect to Home, so that latest user list will be displayed.
	header("Location:../../user.php");
?>