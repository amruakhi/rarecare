  <?php

  include('head.php');
?>



<div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Approved Doctors</h5>
                                            <p class="m-b-0">Welcome to <b>One-Health</b></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Approved Doctors</a>
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
        <h3><i class="fa fa-angle-right"></i> Approved Doctors</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
                <thead>      
    
    <!-- <div class="row">
      <div class="col-xl-10">
        
                New Customers
                  <div class="card card-table-border-none">
                    <div class="card-header justify-content-between ">
                      <h2>New Requests</h2>
                      
                    </div>
          
                    <div class="card-body pt-0" data-simplebar style="height: 468px;">
                      <table class="table ">
                        <tbody>
            <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>-->
              <th>Id</th> 
              <th>Name</th><th>e-mail</th><th>Phone no</th><th>Address</th><th>Activity</th></<tr>
            <?php

              include '../dbconnect.php';
              $p=1;
        //$uname=$_SESSION['username']; 
               $result = mysql_query("SELECT * FROM customer,login where 
        customer.loginid=login.lid and login.status='1' and login.user='hospital'");
               echo $result;

              while($row = mysql_fetch_array($result))
              {
?>
                          <tr>

            <!--   <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
               <td> </td> -->
            

              
              <td><?php echo $row['loginid'];?></td>               
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['phno'];?></td>
              
              <td><?php echo $row['address'];?></td>
              <td><a href="a_ureject.php?id=<?php echo $row['email'];?>" ><form><input type='button' value="REJECT" style="background: red;color: white " ></input></form></a></td><td>
              <td>
              
              </td>
                          </tr>
                         <?php
        }
       	
?> 
                        </tbody>
                      </table>
                    </div>
                  </div>

      </div>

      
    </div>


  
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
