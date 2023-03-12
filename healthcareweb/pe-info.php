<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>ข้อมูลประชาชน</title>
</head>


<body>

    <?php include("header.php"); ?>

    <?php $query = "SELECT * FROM population";
    $result = mysqli_query($conn, $query);

    $diquery = "SELECT DiAge, Diseases FROM `diofage`";
    $diresult = mysqli_query($conn, $diquery);

    while ($diresult2 = mysqli_fetch_assoc($diresult)) {
        $Disease[] = array($diresult2);
    }


    ?>

    <?php while ($row = mysqli_fetch_array($result)) { ?>
        <div class="pebox">
            <div class="peleft">
                <h3 style="margin:  30px 0 10px 0;"><?php echo $row["Firstname"]; ?> <?php echo $row["Lastname"]; ?></h3>
                <p style=" margin: 5px 0 0 0;">อายุ <?php echo $row["popAge"]; ?> ปี เพศ <?php echo $row["popGender"]; ?></p>
                <p style="margin: 5px 0 0 0;">น้ำหนัก <?php echo $row["popWeight"]; ?> กก. ส่วนสูง <?php echo $row["popHeight"]; ?> ซม.</p>
                <p style="margin: 5px 0 0 0;">โรคประจำตัว <?php echo $row["popDisease"]; ?></p>
                <?php if ($row["popAge"] <= 10) { ?>
                    <div class="peright" style="transform: translate(120%, -153%);">
                        <h4>โรคที่พบบ่อยในช่วงอายุ 0-10 ปี</h4>
                        <p style=""><?php echo $Disease[0][0]['Diseases']; ?></p>
                    </div>
                <?php } elseif ($row["popAge"] > 10 && $row["popAge"] <= 22) { ?>
                    <div class="peright" style="transform: translate(120%, -67%);">
                        <h4>โรคที่พบบ่อยในช่วงอายุ 10-22 ปี</h4>
                        <p><?php echo $Disease[1][0]['Diseases']; ?></p>
                    </div>
                <?php } elseif ($row["popAge"] > 22 && $row["popAge"] <= 45) { ?>
                    <div class="peright" style="transform: translate(120%, -105%);">
                        <h4>โรคที่พบบ่อยในช่วงอายุ 23-45 ปี</h4>
                        <p><?php echo $Disease[2][0]['Diseases']; ?></p>
                    </div>
                <?php } elseif ($row["popAge"] > 45 && $row["popAge"] <= 60) { ?>
                    <div class="peright" style="transform: translate(120%, -78%);">
                        <h4>โรคที่พบบ่อยในช่วงอายุ 46-60 ปี</h4>
                        <p><?php echo $Disease[3][0]['Diseases']; ?></p>
                    </div>
                <?php } elseif ($row["popAge"] > 60 && $row["popAge"] <= 99) { ?>
                    <div class="peright" style="transform: translate(120%, -93%);">
                        <h4>โรคที่พบบ่อยในช่วงอายุ 60 ปีขึ้นไป</h4>
                        <p><?php echo $Disease[4][0]['Diseases']; ?></p>
                    </div>
                <?php } ?>

            </div>

        </div>
    <?php }; ?>

</body>

</html>