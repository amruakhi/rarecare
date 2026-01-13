<?php
	include('phead.php');
	include('dbconnect.php');

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
        <form method="POST">
            <div class="form-row">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <?php
                $result = mysql_query("SELECT * FROM customer,login where 
                customer.email = login.email and login.user='hospital'");
            ?>
            <div class="form-row">
                <label for="doc">Doctor:</label>
                <select name="doctor"> <!-- Added name attribute here -->
                    <option>--SELECT HOSPITAL--</option>
                    <?php while ($row = mysql_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row['email']; ?>"><?php echo $row['name'] ?></option>
                        
                    <?php } ?>
                </select>
            </div>

            <div class="form-row">
                <label for="disease">Disease    :</label>
                <input type="text" id="disease" name="disease" required>
            </div>

            <div class="form-row">
                <label for="disease">Operation Date  :</label>
                <input type="text" id="disease" name="dated" required>
            </div>

            <div class="form-row">
                <label for="stage">Stage:</label>
                <input type="text" id="stage" name="stage" required>
            </div>

            <div class="form-row">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" required>
            </div>

            <div class="form-row">
                <label></label>
                <input type="submit" name="submit" value="Add Donation">
            </div>
        </form>
    </div>

<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $doctor = $_POST['doctor'];
        $disease = $_POST['disease'];
        $stage = $_POST['stage'];
        $amount = $_POST['amount'];
        $dated = $_POST['dated'];
        
        // session_start();
        $uname=$_SESSION['email']; 

        $q="INSERT INTO donation (name, mail, doctor, disease, dated, stage, amount) VALUES ('$name', '$uname', '$doctor', '$disease', '$dated', '$stage', '$amount')";
        // echo $q;
        if(mysql_query($q,$conn))
        {
            echo "<script>alert('Your donation request has been added!');
							location.href='pdonation.php';
					</script>";
        }
        else{
            echo "<script>alert('Can't add donation request!');
							location.href='pdonation.php';
					</script>";
        }
    }
?>