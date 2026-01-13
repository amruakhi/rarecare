<?php
include 'dbconnect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Sanitize the ID to prevent SQL injection (not fully secure, but basic)
    $id = intval($id); // Convert to integer to sanitize (better: use mysql_real_escape_string or prepared statements)

    // Update query
    $sql = "UPDATE appointment SET status = '1' WHERE id = '$id'";

    // Perform the query
    $result = mysql_query($sql, $conn);

    if ($result) {
        echo "<script>alert('Approved!');
              window.location.href='dappo.php'; // Redirect to another page after approval
              </script>";
    } else {
        echo "<script>alert('Error approving appointment!');
              window.location.href='dappo.php'; // Redirect to another page on error
              </script>";
    }
}

// Close connection
mysql_close($conn);
?>
