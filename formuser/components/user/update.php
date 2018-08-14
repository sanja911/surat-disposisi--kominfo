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
	$id 		= $_POST['id'];
	$name 		= $_POST["name"];
	$hp 		= $_POST["hp"];
	$alamat		= $_POST["alamat"];
	$email		= $_POST["email"];
	$username	= $_POST["username"];
	$password	= $_POST["password"];
	$level		= $_POST["level"];

	if ($id == 'NULL') {
        header("Location:../../user.php");
    } else {
		
		if ($password == '') {
			
			// Edit user row from table based on given id
			$result = mysqli_query($dbconnect, "UPDATE `users` SET `nama` = '$name', `no_hp` = '$hp', `alamat` = '$alamat', `email` = '$email', `username` = '$username', `level_user` = '$level' WHERE `users`.`id_user` = '$id'");

		} else {
			
			// Edit user row from table based on given id
			$result = mysqli_query($dbconnect, "UPDATE `users` SET `nama` = '$name', `no_hp` = '$hp', `alamat` = '$alamat', `email` = '$email', `username` = '$username', `password` = md5('$password'), `level_user` = '$level' WHERE `users`.`id_user` = '$id'");
		}
		// After delete redirect to Home, so that latest user list will be displayed.
		header("Location:../../user.php");
	}
?>