<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>ข้อมูลโรงพยาบาล</title>

</head>

<body>

    <?php include("header.php")?>

    <?php $query = "SELECT * FROM `hospital`" ; 
  $result = mysqli_query($conn, $query); 
?>

    <?php while($row = mysqli_fetch_array($result)) { ?>

    <div class="main">
        <div class="img">
            <img src="<?php echo "img/".$row["HosPic"]; ?>" alt="">
        </div>
        <div class="content">
            <h1 style="margin: 15px auto;"><?php echo $row["HosName"]; ?></h1>
            <p style="margin: 10px;"><?php echo $row["HosInfo"]; ?></p>
            <h4 style="margin: 10px auto;"><?php echo $row["Hosloca"]; ?></h4>
            <h4 style="margin: 10px auto;"><?php echo $row["HosCont"]; ?></h4>
        </div>
        <a href="<?php echo $row["HosMap"]; ?>" target="_blank">
            <div class="location">
                <h3 style="color: black;">แผนที่</h3>
                <img src="img/icons8-place-marker-40.png" alt="location icon" style="margin: 20px 0px 0px 3px; ">
            </div>
        </a>
    </div>

    <?php }; ?>

</body>

</html>