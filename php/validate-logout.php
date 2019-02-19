<?php 
	session_start();
	if (isset($_SESSION['currentuser'])) {
		unset($_SESSION['currentuser']);
	}
	session_destroy();
	header("Location:../index.php");
 ?>