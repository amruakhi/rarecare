<?php
	include('phead.php');
	include('dbconnect.php');
    // session_start();
    $uname=$_SESSION['email'];
?>


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
    
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #000;
    }
    
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    td {
        color: black; /* Set text color to black */
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
<body>
  <div class="container1">
    <h2>My Bookings</h2>
    <form method="POST">
    <?php
  $result = mysql_query("SELECT a.*, c.name AS hospital_name, d.name AS doctor_name 
FROM appointment a JOIN dreg d ON a.doctor = d.email JOIN customer c ON a.hsptl = c.email
WHERE a.patient = '$uname' ORDER BY a.id DESC LIMIT 6;");

    ?>
        <table>
            <tr><th>Date</th><th>Time</th><th>Hospital</th><th>Doctor</th><th>Status</th></tr>
            <?php while ($row = mysql_fetch_assoc($result)) { ?>    
            <tr><td><?php echo $row['date']; ?></td><td><?php echo $row['time']; ?></td><td><?php echo $row['hospital_name']; ?></td>
                <td><?php echo $row['doctor_name']; ?></td>
            <td><?php $sts=$row['status']; 
                      if($sts==1)
                        echo "Approved";
                      else if($sts==2)
                        echo "Rejected";
                      else
                        echo "Waiting";
                ?></td></tr>
            <?php } ?>
            
      

