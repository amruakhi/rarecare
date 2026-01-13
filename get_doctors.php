<?php
include('dbconnect.php');

if(isset($_POST['department']) && isset($_POST['hospital'])) {
  $department = $_POST['department'];
  $hospital = $_POST['hospital'];
  
  $query = "SELECT name, email FROM dreg WHERE spec = '$department' AND hospital = '$hospital'";
  $result = mysql_query($query);
  
  $options = '<option value="">--SELECT DOCTOR--</option>';
  while ($row = mysql_fetch_assoc($result)) {
    $options .= '<option value="' . $row['email'] . '">' . $row['name'] . '</option>';
  }
  
  echo $options;
}
?>
