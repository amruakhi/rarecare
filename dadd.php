<?php
	include('dhead.php');
	include('dbconnect.php');

?>

<br><br>
<center>
	<b><u><h1 style="color: black"> ADD DOCTOR</h1></u></b><br>
<form  enctype="multipart/form-data" method="post">
	<table>
		<tr>
        <td style="color: white;">Name</td><td><input type="text" name="fname" class="form-control" style="margin-bottom: 8px;margin-left: 8px" required></td>
		</tr>
		<tr>
			<td style="color: white;">Address</td><td><input type="text" name="address" class="form-control"  style="margin-bottom: 8px;margin-left: 8px" required></td>
		</tr>
		
		<tr>
			<td style="color: white;">Email</td><td><input type="email" name="email" class="form-control"  style="margin-bottom: 8px;margin-left: 8px" required></td>
		</tr>
		<tr>
			<td style="color: white;">Specialisation</td><td><input type="text" name="spec" class="form-control"  style="margin-bottom: 8px;margin-left: 8px" required></td>
		</tr>
        <!-- <tr>
			<td style="color: white;">Image</td><td><input type="file" name="photo" class="form-control"  style="margin-bottom: 8px;margin-left: 8px" required></td>
		</tr> -->
		
		
		<tr>
			<td></td><td><input type="submit" name="submit" value="submit" class="btn btn-success" style="padding: 10px 25px"></td>
		</tr>

	</table>
	
</form>
</center>
</div>
</div>
</div>
</div>
</div>
</section>


<?php

// session_start();
$uname = $_SESSION['email'];

if(isset($_POST['submit'])){

	$name=$_POST['fname'];
    $address=$_POST['address'];
	$spec=$_POST['spec'];
	//$exp=$_POST['exp'];
	//$phno=$_POST['phno'];
	$email=$_POST['email'];
	// $password=$_POST['password'];

	$q="INSERT INTO dreg(hospital,name, email, address, spec) values('$uname', '$name','$email','$address','$spec')";
	// echo $q;
	if(mysql_query($q,$conn))
	{
		
					echo "<script>alert('Doctor Added Succesfully!');
							location.href='dadd.php';
					</script>";
	}
}


?>


