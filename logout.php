<?php
	session_start();
	session_destroy();
	// echo "<script>alert('Logout Success!');</script>";
	//header('location:login.php');
	echo "<script>location.href='index.php'</script>";

?>