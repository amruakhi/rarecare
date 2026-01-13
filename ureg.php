<?php
	include('head.php');
	include('dbconnect.php');

?>

<html lang="en">
<head>

    <div> <!-- id="hero" class="hero overlay" -->
        <div> <!-- class="hero-content" -->
            <div> <!--  class="hero-text" -->
                

            <br><br>

<center>
	<b><u><h1 style="color: black">USER REGISTRATION</h1></u></b><br><br>
<form method="POST">
	<table>
		<tr>
			<td>Name</td><td><input type="text" name="fname" class="form-control" style="margin-bottom: 8px;margin-left: 8px" required></td>
		</tr>
		<tr>
			<td>Address</td><td><input type="text" name="address" class="form-control"  style="margin-bottom: 8px;margin-left: 8px" required></td>
		</tr>
		<!-- <tr>
			<td>User Type</td><td>
				<select name="user" id="user" class="form-control"  style="margin-bottom: 8px;margin-left: 8px">
				<option value="user">USER</option>
				<option value="tutor">TUTOR</option>
			</select>
			</td>
		</tr> -->
		<tr>
			<td>Phone</td><td><input type="text" name="phno" class="form-control"  style="margin-bottom: 8px;margin-left: 8px" pattern="(?=.*[0-9]).{10}" title="10 digit phone number" required></td>
		</tr>
		<tr>
			<td>Email</td><td><input type="email" name="email" class="form-control"  style="margin-bottom: 8px;margin-left: 8px" required></td>
		</tr>
		<tr>
			<td>Password </td><td><input type="text" name="password" class="form-control" style="margin-bottom: 8px;margin-left: 8px" 
					pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
					title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"<required></required></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" name="submit" value="submit" class="btn btn-success" style="padding: 10px 25px"></td>
		</tr>

	</table>
	
</form>
</center>
</div>
</div>
</div>

<main id="main" class="site-main">

        <section class="site-section section-features">
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-7 hidden-xs">
                        <img src="user/assets/img/ipad-pro.png" alt="">
                    </div>
                </div>
            </div>
        </section>


<?php

if(isset($_POST['submit'])){
	$name=$_POST['fname'];
	$address=$_POST['address'];
	//$user=$_POST['user'];
	$phno=$_POST['phno'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	$q="INSERT into login(email,password,status,user) values('$email','$password','1','user')";
	// echo $q;
	if(mysql_query($q,$conn))
	{
		$id=0;
			$q1="select lid from login where email='$email' AND password='$password'";
			//echo $q1;
			$m=mysql_query($q1,$conn);
			while ($r=mysql_fetch_array($m)) {
				$id=$r['lid'];
			}
			$q2="INSERT INTO customer(name, email, address, phno, loginid) values('$name','$email','$address','$phno','$id')";
				$n=mysql_query($q2,$conn);
				if($m&&$n){
					echo "<script>alert('Your account has been created!');
							location.href='login.php';
					</script>";
				}
	}



}

?>


