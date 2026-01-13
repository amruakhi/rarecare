<?php
	include('phead.php');
	include('dbconnect.php');

?>

<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #000;
        }

        tr:nth-child(even) {
            background-color: #aaa;
        }

        tr:hover {
            background-color: #555;
        }
    </style>

<h2>View Donation Requests</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Hospital</th>
                <th>Disease</th>
                <th>Stage</th>
                <th>Amount Needed</th>
                <th>Amount Got</th>

            </tr>
        </thead>

        <?php
         // session_start();
         $uname=$_SESSION['email'];
         $result = mysql_query("SELECT * from donation,customer where mail='$uname'
         and donation.doctor=customer.email ");
        ?>

        <tbody>

        <?php while ($row = mysql_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['disease']; ?></td>
                <td><?php echo $row['stage']; ?></td>
                <td><?php echo $row['amount']; ?></td>
<?php
                $idd= $row['id'];
                $resulted = mysql_query("SELECT SUM(amount) AS total_amount
        FROM amounts WHERE did = '$idd';");
        while ($rows = mysql_fetch_assoc($resulted)) {
            echo '<td>' . $rows['total_amount'] . '</td>';
        }
        ?>

                </tr>
            <?php } ?>

        </tbody>
    </table>