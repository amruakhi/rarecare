<?php
    include 'uhead.php';
    include 'dbconnect.php';
?>

<body style="background-color: grey;">

<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .containers {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #aeaeae;
            padding: 15px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: transform 0.3s; /* Added a smooth transition on hover */
        }

        .product-card:hover {
            transform: scale(1.05); /* Added a scale effect on hover */
        }

        .product-details {
            flex: 1;
            margin-right: 20px;
        }

        .product-image {
            max-width: 150px;
            max-height: 150px;
            border-radius: 4px;
            object-fit: cover;
        }

        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 999; /* Ensure the lightbox is on top of other elements */
        }
        .lightbox img {
            max-width: 80%;
            max-height: 80%;
            border-radius: 4px;
        }
        .product-buttons {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
    opacity: 0; /* Initially hidden */
    transition: opacity 0.3s;
}
.product-card:hover .product-buttons {
    opacity: 1; /* Visible on hover */
}
.product-buttons button {
    background-color: #4caf50; /* Green color for buttons */
    color: #fff;
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.product-buttons button:hover {
    background-color: #45a049; /* Darker green on hover */
}
    </style>
    <h2 align='center'> </h2>
<div class="containers">
    <?php
// session_start();
//     $email=$_SESSION['email']; 
    // Assuming you have a MySQL connection ($conn) and want to fetch products
    $result = mysql_query("SELECT * FROM donation
    INNER JOIN customer ON customer.email = donation.mail WHERE 
    donation.status = '1' ORDER BY donation.dated DESC LIMIT 1; ");
    while ($row = mysql_fetch_assoc($result)) {
        echo '<div class="product-card" onclick="openLightbox()">';
        echo '<div class="product-details">';
        echo '<h2>' . $row['name'] . '</h2>';
        echo '<h4>' . $row['mail'] . '</h4>';
        echo '<h4>' . $row['address'] . '</h4>';
        echo '<h4> Amount Needed:' . $row['amount'] . '</h4>';
        $tamount= $row['amount'];
            $idd= $row['id'];
        $resulted = mysql_query("SELECT SUM(amount) AS total_amount
        FROM amounts WHERE did = '$idd';");
        while ($rows = mysql_fetch_assoc($resulted)) {
            $amt=$rows['total_amount'];
            if ($amt =='')
                echo '<h4> Amount Got: 0'  . '</h4>';
            else
                echo '<h4> Amount Got:' . $amt . '</h4>';
        }
        $bal=$tamount-$amt;
        echo '<h4> Balance Amount:' . $bal . '</h4>';

        echo '</div>';
        // echo '<img src="' . $row['photo'] . '" alt="Product Image" class="product-image">';
        echo '<h2>' . $row['disease'] . '</h2>';
        echo '<br>';
        echo '<h2> Stage ' . $row['stage'] . '</h2>';
        echo '<div class="product-buttons">';
        echo '<a href="credit-card/dist/index.php?id=' . $row["id"] . '"><h4 style="color:red">ADD AMOUNT</h4></a>';
        echo '&nbsp;&nbsp;';
        // echo '<a href="odelete.php?id=' . $row["id"] . '"><h4 style="color:#50f55c">DELETE</h4></a>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    ?>
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <img id="lightbox-image">
</div>
<script>
    // function openLightbox(imageUrl) {
    //     // document.getElementById('lightbox-image').src = imageUrl;
    //     document.getElementById('lightbox').style.display = 'flex';
    // }

    function closeLightbox() {
        document.getElementById('lightbox').style.display = 'none';
    }
</script>
