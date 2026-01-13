
<?php
      include('head.php');
      include('../dbconnect.php');
    ?>


<div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">My Profile</h5>
                                            <p class="m-b-0">Welcome to <b>One-Health</b></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">My Profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
							<div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">



 <section id="main-content">
      <section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
                <thead>
                  <tr>



<div class="row">
	<!-- <div class="col-lg-6"> -->
	
       <form action="" method="POST">
		<!-- <div class="card card-default"> --><br><br>
			<div class="card-header card-header-border-bottom">
				<h2>Update Username / Password</h2>
			</div>

           <?php

              //include 'dbconnect.php';
              $p=1;
			  //$uname=$_GET['id'];
			  //$uname=$_SESSION['username']; 
              $result = mysql_query("SELECT * FROM login where user='admin'");

              while($row = mysql_fetch_array($result))
              {
              ?>
     
			<div class="col-sm-12">
				<label class="text-dark font-weight-medium" for="">User Name</label>
				<div class="input-group mb-2">

					<input type="email" class="form-control" id="hname" name="email" value="<?php echo $row['email'];?>" 
					required>
				</div><br>
			</div>
			
			<div class="col-sm-12">
				<label class="text-dark font-weight-medium" for="">Password</label>
				<div class="input-group mb-2">

					<input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password'];?>" 
					pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
					title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required
					>
				</div>
			</div>
			
		
			<div class="col-sm-12">
				<label class="text-dark font-weight-medium" for=""></label>
				<div class="input-group mb-2">
			<button class="btn btn-primary waves-effect waves-light" name="submit"  type="submit">Update</button>
		
		</div><br><br><br><br><br><br><br>
	<!-- </div> -->

			<?php
			  }
?>
		</div>
	</div></form>
<?php
							  //include 'includes/dbconnect.php';
							 if(isset($_POST['submit']))
							 {
								 
								
								  


								 $sql="update login set email='$_POST[email]',password='$_POST[password]' where user='admin'";
								 //echo"$sql";
								 $result=mysql_query($sql,$conn);
								if($result)
								{
									echo "<script>alert('Password updated!');location.href='a_profile.php';</script>";
								}
							 	else
								{
									echo "<script>alert('Not updated!');location.href='a_profile.php';</script>";
								}
							 }	
								
						 
							
						?>

	
</div>


	

		

		

		





      </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
    
    
    <!-- Footer -->
   

    </div> <!-- End Page Wrapper -->
  </div> <!-- End Wrapper -->


  <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>

    <script type="text/javascript" src="assets/js/script.js "></script>
</body>

</html>
