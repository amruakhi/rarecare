<?php
include('dbconnect.php');
if(isset($_POST['department'])) {
  $department = $_POST['department'];

  $query1 = "SELECT DISTINCT customer.name, dreg.spec, dreg.hospital 
FROM dreg 
INNER JOIN customer 
ON dreg.hospital = customer.email 
WHERE dreg.spec = '$department';
";

 
  $result = mysql_query($query1); 
  $options = '<option value="">--SELECT HOSPITAL--</option>';
  while ($row = mysql_fetch_assoc($result)) {
    $options .= '<option value="' . $row['hospital'] . '">' . $row['name'] . ''  . '</option>';
  }
  echo $options;
}
?>