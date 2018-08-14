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
	$id_quest		= $_POST["id_quest"];
	$pertanyaan		= $_POST["pertanyaan"];
	$pil1			= $_POST["pil1"];
	$pil2			= $_POST["pil2"];
	$pil3			= $_POST["pil3"];
	$pil4			= $_POST["pil4"];
	$pil5			= $_POST["pil5"];
	$pil6			= $_POST["pil6"];
	$kategori		= $_POST["kategori"];	
	

		// Edit user row from table based on given id
		$result = mysqli_query($dbconnect, "UPDATE `pertanyaan` SET `id_quest` = '$id_quest', `pertanyaan` = '$pertanyaan', `pil1` = '$pil1', `pil2` = '$pil2', `pil3` = '$pil3', `pil4` = '$pil4', `pil5` = '$pil5', `pil6` = '$pil6', `kategori` = '$kategori' WHERE `pertanyaan`.`id_quest` = '$id_quest'");
		

		// After Update redirect to Home, so that latest user list will be displayed.
		header("Location:../../pertanyaan.php");

?>