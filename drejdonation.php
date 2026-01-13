<?php
	include('dhead.php');
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
                <th>Name</th>
                <th>Doctor</th>
                <th>Disease</th>
                <th>Stage</th>
                <th>Amount</th>
                <th>Edit</th>
                <th>Approve</th>
            </tr>
        </thead>

        <?php
         // session_start();
         $uname=$_SESSION['email'];
         $result = mysql_query("SELECT * from donation where doctor='$uname' and status='2'");
        ?>

        <tbody>

        <?php while ($row = mysql_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                <td><?php echo $row['disease']; ?></td>
                <td><?php echo $row['stage']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><a href="dedit.php?id=<?php echo $row['id'];?>"><input type="submit" value="Edit" name="edit" style="background: orange"></td>
                <td><a href="dapprove.php?id=<?php echo $row['id'];?>"><input type="submit" value="Approve" name="approve" style="background: green"></td>
                <!-- <td><a href="dreject.php?id=<?php echo $row['id'];?>"><input type="submit" value="Reject" name="reject" style="background: red"></td> -->
            </tr>
            <?php } ?>

        </tbody>
    </table>