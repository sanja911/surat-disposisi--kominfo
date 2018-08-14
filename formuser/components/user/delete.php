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

	// Get id from URL to delete that user
	$id = 'NULL';
	$id = $_POST['id'];

	if ($id == 'NULL') {
        header("Location:../../user.php");
    } else {
		// Delete user row from table based on given id
		$result = mysqli_query($dbconnect, "DELETE FROM users WHERE id_user='$id'");
		 
		// After delete redirect to Home, so that latest user list will be displayed.
		header("Location:../../user.php");
	}

?>