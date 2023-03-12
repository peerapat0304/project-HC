<?php
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("location: index.php");
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
        <title>Admin Page</title>
    </head>

    <body style="margin: 0; background-image: linear-gradient(315deg, #b9cce7 0%, #f5f7f7 100%);">

        <div class=header>
            <a href="admin_page.php"><img class="logo" src="img/rlogo2.png" alt="logo" style="float: left;"></a>
            <nav>
                <ul class="nav_link">
                    <li><a href="dataEdit.php?sql=people" style="font-size: 1rem;">แก้ไขข้อมูลประชากร</a></li>
                    <li><a href="dataEdit.php?sql=D-info" style="font-size: 1rem;">แก้ไขข้อมูลการเสียชีวิต</a></li>
                    <li><a href="dataEdit.php?sql=VHSs" style="font-size: 1rem;">แก้ไขข้อมูลจำนวน อสม.</a></li>
                    <li><a href="dataEdit.php?sql=Hospital" style="font-size: 1rem;">แก้ไขข้อมูลโรงพยาบาล</a></li>
                </ul>
            </nav>
        </div>

        <div class="contain" style="margin-top: 150px; padding-bottom:250px">
            <div class=" function" style="margin-top: -100xp">
                <div class=" card">
                    <a href="dataEdit.php?sql=people">
                        <div class="box1">
                            <div class="icon"><img src=" img/people.png" alt="people icon">
                            </div>
                            <h4 style="padding-left: 30px;">แก้ไขข้อมูลประชากร</h4>
                        </div>
                    </a>
                    <a href="dataEdit.php?sql=D-info">
                        <div class="box2">
                            <div class="icon"><img src=" img/bird.png" alt="bird icon"></div>
                            <h4 style="padding-left: 15px;">แก้ไขข้อมูลการเสียชีวิต</h4>
                        </div>
                    </a>
                    <a href="dataEdit.php?sql=VHSs">
                        <div class="box3">
                            <div class="icon"><img src=" img/vhs.png" alt="VHSs icon"></div>
                            <h4 style="padding-left: 16px;">แก้ไขข้อมูลจำนวนอสม.</h4>
                        </div>
                    </a>
                    <a href="dataEdit.php?sql=Hospital">
                        <div class="box4">
                            <div class="icon" style="padding-left: 5px"><img src=" img/hos.png" alt="Hos icon" style="margin-bottom: -8px;">
                            </div>
                            <h4 style="padding-left:    4px;">แก้ไขข้อมูลสถานพยาบาล</h4>
                        </div>
                    </a>
                    <form action="logout.php" method="POST"><input type="submit" id="logout" name="logout-button" value="logout" onclick="location.href='logout.php';" style="display: inline; margin-left: 15px;"></input>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php } ?>