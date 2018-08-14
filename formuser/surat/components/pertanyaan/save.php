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
	
	include("../../../config.php");

	$pil1 = !empty($pil1)?"'$pil1'":"NULL";
	$pil2 = !empty($pil2)?"'$pil2'":"NULL";
	$pil3 = !empty($pil3)?"'$pil3'":"NULL";
	$pil4 = !empty($pil4)?"'$pil4'":"NULL";
	$pil5 = !empty($pil5)?"'$pil5'":"NULL";
	$pil6 = !empty($pil6)?"'$pil6'":"NULL";
	// Get data from Post to edit that user
	$pertanyaan		= $_POST["pertanyaan"];
	$pil1			= $_POST["pil1"];
	$pil2			= $_POST["pil2"];
	$pil3			= $_POST["pil3"];
	$pil4			= $_POST["pil4"];
	$pil5			= $_POST["pil5"];
	$pil6			= $_POST["pil6"];
	$kategori		= $_POST["kategori"];

		$result = mysqli_query($dbconnect, "INSERT INTO `pertanyaan` (`id_quest`, `pertanyaan`, `pil1`, `pil2`, `pil3`, `pil4`, `pil5`, `pil6`, `kategori`) VALUES (NULL, '$pertanyaan', '$pil1', '$pil2', '$pil3', '$pil4', '$pil5', '$pil6', '$kategori')");
		
		// After Update redirect to Home, so that latest user list will be displayed.
		header("Location:../../pertanyaan.php");
?>