<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>คำแนะนำสุขภาพ</title>

</head>

<body>

    <?php session_start();
    include("header.php");
    $des = $_GET['adv'];

    $query = "SELECT * FROM `desease` WHERE desease = '$des' ";
    $result = mysqli_query($conn, $query);


    ?>

    <?php while ($row = mysqli_fetch_array($result)) { ?>

        <div class="a-main">
            <div class="adv-content">
                <a href="javascript:history.back()"><img src="img/back.png" alt="" style="width: 30px; margin-top: 12px;"></a>
                <h2 style="margin: 5px auto;">วิธีดูแลสุขภาพเบื้องต้น โรค<?php echo $row["desease"]; ?></h2>
                <p style="margin: 10px; font-size: 1.1rem; line-height: 1.6;"><?php echo $row["advice"]; ?></p>
            </div>
        </div>
    <?php }; ?>

</body>

</html>