<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
$sql="UPDATE `appointment` SET status = '2' WHERE id = '$id'";
if(mysql_query($sql,$conn))
	echo "<script>alert(' Rejected!');location.href='dappo.php';</script>";
     else
     	{
			echo "<script>alert('error!');location.href='dappo.php';</script>";
		}
	}
?>