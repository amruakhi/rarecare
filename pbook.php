<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Appointment Booking</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <style>
    .container1 {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    .form-group1 {
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #555;
    }
    input[type="text"], input[type="time"], input[type="submit"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
    .ui-datepicker-header {
      background-color: #007bff;
      color: #fff;
      border-radius: 5px 5px 0 0;
      border: none;
    }
    .ui-datepicker-title {
      font-size: 18px;
    }
    .ui-datepicker-prev, .ui-datepicker-next {
      background-color: #0056b3;
      color: #fff;
      border: none;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      line-height: 30px;
      text-align: center;
      font-size: 16px;
      cursor: pointer;
    }
    .ui-datepicker-prev:hover, .ui-datepicker-next:hover {
      background-color: #004080;
    }
    .ui-datepicker-calendar {
      border-radius: 0 0 5px 5px;
    }
    .ui-state-default {
      background-color: #fff;
      color: #333;
    }
    .ui-state-default:hover {
      background-color: #f0f0f0;
    }
    .ui-datepicker-current-day {
      background-color: #007bff;
      color: #fff;
    }
  </style>
</head>
<?php   
  include 'phead.php';
?>
<body>
  <div class="container1">
    <h2>Doctor Appointment Booking</h2>
    <form method="POST">
      <div class="form-group1">
        <label for="datepicker">Date:</label>
        <input type="text" id="datepicker" name="date" required>
      </div>
      <div class="form-group1">
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>
      </div>
      <div class="form-group1">
        <label for="department">Select Department:</label>
        <select id="department" name="department" onchange="getHospitals()">
          <option value="">--SELECT DEPARTMENT--</option>
          <?php
            include('dbconnect.php');
            
            $query = "SELECT DISTINCT spec FROM dreg";
            $result = mysql_query($query);
            while ($row = mysql_fetch_assoc($result)) {
              echo '<option value="' . $row['spec'] . '">' . $row['spec'] . '</option>';
            }
          ?>
        </select>
      </div>
      <div class="form-group1">
        <label for="hospital">Select Hospital:</label>
        <select id="hospital" name="hospital">
          <option value="">--SELECT HOSPITAL--</option>
        </select>
      </div>
      <div class="form-group1">
        <label for="doctor">Select Doctor:</label>
        <select id="doctor" name="doctor">
          <option value="">--SELECT DOCTOR--</option>
        </select>
      </div>
      <div class="form-group1">
        <input type="submit" name="submit" value="Book Appointment">
      </div>
    </form>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script>
    $(function() {
      $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0,
        maxDate: '+1M',
        showButtonPanel: true
      });
    });

    function getHospitals() {
      var department = $("#department").val();
      $.ajax({
        type: 'POST',
        url: 'get_hospitals.php',
        data: { department: department },
        success: function(response) {
          $("#hospital").html(response);
          $("#doctor").html('<option value="">--SELECT DOCTOR--</option>');
        }
      });
    }

    function getDoctors() {
      var department = $("#department").val();
      var hospital = $("#hospital").val();
      $.ajax({
        type: 'POST',
        url: 'get_doctors.php',
        data: { department: department, hospital: hospital },
        success: function(response) {
          $("#doctor").html(response);
        }
      });
    }

    $(document).on('change', '#hospital', function() {
      getDoctors();
    });
  </script>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
  $dat = $_POST['date'];
  $tim = $_POST['time'];
  $doc = $_POST['doctor'];
  $dept = $_POST['department'];
  $hsptl = $_POST['hospital'];

  // session_start();
  $uname = $_SESSION['email'];
  $q = "INSERT INTO appointment (patient, date, time, dept, hsptl, doctor, status) 
      VALUES ('$uname', '$dat', '$tim', '$dept', '$hsptl', '$doc', '0')";
  //echo $q;
  if(mysql_query($q)) {
    echo "<script>alert('Appointment Booked!');
    
    </script>";
  } else {
    echo "<script>alert('Error occurred!');
    
    </script>";
  }
}
?>
