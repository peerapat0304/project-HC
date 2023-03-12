<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css">
    <title>Health Analysis System</title>
</head>

<body style="margin: 0;">
    <?php include("header.php"); ?>


    <div class="contain">
        <div class="" style="padding-top: 100px;">
            <h1 style="text-align: center; margin-top: -50px;">ระบบวิเคราะห์ข้อมูลและแนะนำการส่งเสริม</h1>
            <h1 style="text-align: center; margin-bottom: 40px;">สุขภาพเบื้องต้น</h1>
            <a href="health-check.php"><button>
                    <h2 style="width: 200px; margin: 5px;">วิเคราะห์อาการป่วย</h2>
                </button></a>
            <div class=" function" style="margin-top: 30px;">
                <div class="card">
                    <a href="pe-info.php">
                        <div class="box1">
                            <div class="icon"><img src=" img/people.png" alt="people icon">
                            </div>
                            <h4 style="padding-left: 50px;">ข้อมูลประชากร</h4>
                            <p style="padding-left: 45px; font-size: 1rem;">ข้อมูลประชากรเบื้องต้น</p>
                        </div>
                    </a>
                    <a href="D-info.php">
                        <div class="box2">
                            <div class="icon"><img src=" img/bird.png" alt="bird icon"></div>
                            <h4 style="padding-left: 40px;">ข้อมูลการเสียชีวิต</h4>
                            <p style="padding-left: 23px; font-size: 1rem;">ข้อมูลการเสียชีวิต แยกตามโรค</p>
                        </div>
                    </a>
                    <a href="VHSs.php">
                        <div class="box3">
                            <div class="icon"><img src=" img/vhs.png" alt="VHSs icon"></div>
                            <h4 style="padding-left: 44px;">ข้อมูลจำนวนอสม.</h4>
                            <p style="padding-left: 15px; font-size: 1rem;">ข้อมูลจำนวนอสม.แยกตามหมู่บ้าน</p>
                        </div>
                    </a>
                    <a href="Hos-info.php">
                        <div class="box4">
                            <div class="icon" style="padding-left: 5px"><img src=" img/hos.png" alt="Hos icon" style="margin-bottom: -8px;">
                            </div>
                            <h4 style="padding-left: 34px;">ข้อมูลสถานพยาบาล</h4>
                            <p style="padding-left: 65px; margin: 10px 0 5px 0; font-size: 1rem;">ข้อมูลโรงพยาบาล </p>
                            <p style="padding-left: 35px; margin-top: 5px; font-size: 1rem;">และโรงพยาบาลประจำตำบล</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>