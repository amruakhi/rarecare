<?php
	//include('head.php');
	include('dbconnect.php');
	include('head.php');


?>


    <div> <!-- id="hero" class="hero overlay" -->
        <div> <!-- class="hero-content" -->
            <div> <!--  class="hero-text" -->
             <br>   

<center><br>
	<b><h1 style="color: black">Login</h1></b><br>
	<form method="POST">
		<table>
			<tr>
				<td style="margin-right: 30px">Email :</td><td><input type="email" name="email" class="form-control" style="margin-bottom: 20px; margin-left: 20px" required></td>
			</tr>
			<tr>
				<td style="margin-right: 30px">Password :</td><td><input type="password" name="password" class="form-control" style="margin-bottom: 20px; margin-left: 20px" required></td>

			</tr>
			<tr>
				<td></td><td><input type="submit" name="submit" class="btn btn-success" style="padding: 10px 20px"></td>
			</tr>
		</table>
	</form>
</center>



                <!-- <p>Your clients on the internet. Learn how to receive them.</p> -->
                <!-- <a href="#" class="btn btn-border">Learn more</a> -->
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

        <section class="site-section section-features">
            <div class="container">
                <div class="row">
                   
                   <!--  <div class="col-sm-7 hidden-xs">
                        <img src="user/assets/img/ipad-pro.png" alt="">
                    </div> -->
                </div>
            </div>
        </section>
<?php
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$user=0;
	$id=0;

	$q="SELECT * from login WHERE email='$email' and password='$password' ";
	 //echo $q;
	 //break;
	 $m=mysql_query($q,$conn);
	if($m)
	{
	
		while($r=mysql_fetch_array($m)){
				$id=$r['lid'];
				$user=$r['user'];
				$status=$r['status'];
				 if($status==1)
	       {
	        $flag=1;
	  	    session_start();
	        //$type=$r['type'];
	        $_SESSION['email'] = $email;


	  	    $_SESSION['user'] = $user;
	  	    $_SESSION['lkey'] = $id;
	  	   // $_SESSION[$id];
	      }
			

			}
	
			
				
			
			// echo $user;
		if( $user=='user' && $status=='1' ){
				echo "<script>
					location.href='uhome.php';
				</script> ";
		//echo "<script>location.href='index.php';</script> ";
			}
		else if( $user=='hospital' && $status=='1' ){
				echo "<script>
					location.href='dhome.php';
				</script> ";
			}
		else if( $user=='patient' && $status=='1' ){
				echo "<script>
					location.href='phome.php';
				</script> ";
			}
		else if( $status=='3'){
				echo "<script>
				location.href='admin/index.php';
				</script>";
			}
	

		else{
				echo "<script> alert('user not registered ');
				location.href='login.php';
				</script>";
}
}
}

?>

