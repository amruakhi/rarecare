
       <?php
include('dhead.php');
include('dbconnect.php');
// session_start();
$uname = $_SESSION['email'];
?>
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
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
      color: black;
    }
    th {
      background-color: #014585;
    }
    form {
      display: inline; /* Ensures forms are displayed inline */
    }
    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 8px 12px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container1">
    <h2>Bookings</h2>
    <table>
      <tr>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
      <?php
      $result = mysql_query("SELECT * FROM appointment,customer WHERE hsptl='$uname' AND 
                  appointment.patient=customer.email AND DATE(date) > CURDATE()");
      if ($result && mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td>
              <?php
              $status = $row['status'];
              if ($status == 1) {
                echo "Approved";
              } else if ($status == 2) {
                echo "Rejected";
              } else {
                echo "Pending";
              }
              ?>
            </td>
            <td>
              <form action="dpatapp.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="submit" value="Approve">
              </form>
            </td>
            <td>
              <form action="dpatrej.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="submit" value="Reject">
              </form>
            </td>
          </tr>
          <?php
        }
      } else {
        echo "<tr><td colspan='5'>No appointments .</td></tr>";
      }
      ?>
    </table>
  </div>
</body>
</html>

            
      

