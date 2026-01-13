<?php


$id=$_GET['id'];

include 'dbconnect.php';
$sql="UPDATE `donation` SET status = '1' WHERE id = '$id'";
if(mysql_query($sql,$conn))
	echo "<script>alert(' Approved!');location.href='dnewdonation.php';</script>";
     else
     	{
			echo "<script>alert('error!');location.href='dnewdonation.php';</script>";
		}

?>