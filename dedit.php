<?php
	include('dhead.php');
	include('dbconnect.php');
    $id=$_GET['id'];
?>


<style>
        .form-container {
            width: 50%;
            margin: auto;
        }

        .form-row {
            margin-bottom: 10px;
        }

        .form-row label {
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right: 10px;
        }

        .form-row input[type="text"],
        .form-row input[type="number"],
        .form-row select,
        .form-row textarea {
            width: calc(100% - 160px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-row input[type="submit"] {
            width: auto;
            padding: 5px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

<h2 style="text-align: center;">Donation Request Form</h2>
    <div class="form-container">
        <?php

        $result = mysql_query("SELECT * from donation where id='$id'");
        while($row = mysql_fetch_array($result))
              {
        ?>
        <form method="POST">
            <div class="form-row">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name'];?>" required>
            </div>

            <div class="form-row">
                <label for="disease">Disease    :</label>
                <input type="text" id="disease" name="disease" value="<?php echo $row['disease'];?>" required>
            </div>

            <div class="form-row">
                <label for="disease">Operation Date  :</label>
                <input type="text" id="disease" name="dated" value="<?php echo $row['dated'];?>" required>
            </div>

            <div class="form-row">
                <label for="stage">Stage:</label>
                <input type="text" id="stage" name="stage" value="<?php echo $row['stage'];?>" required>
            </div>

            <div class="form-row">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" value="<?php echo $row['amount'];?>" required>
            </div>

            <div class="form-row">
                <label></label>
                <input type="submit" name="submit" value="Update Donation">
            </div>
        </form>
        <?php
              }
        ?>
    </div>


    <?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $doctor = $_POST['doctor'];
        $disease = $_POST['disease'];
        $stage = $_POST['stage'];
        $amount = $_POST['amount'];
        $dated = $_POST['dated'];

    
        
        $q="UPDATE donation
        SET name = '$name', disease = '$disease', stage = '$stage', amount = '$amount'
        WHERE id = '$id'; ";
        // echo $q;
        if(mysql_query($q,$conn))
        {
            echo "<script>alert('Donation updated successfully!');
							location.href='dnewdonation.php';
					</script>";
        }
        else{
            echo "<script>alert('Can't update donation!');
							location.href='dnewdonation.php';
					</script>";
        }
    }
?>
