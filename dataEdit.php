<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>

<body>
    <div class=header>
        <a href="admin_page.php"><img class="logo" src="img/rlogo2.png" alt="logo" style="float: left;"></a>
        <nav>
            <ul class="nav_link">
                <li><a href="dataEdit.php?sql=people" style="font-size: 1rem;">แก้ไขข้อมูลประชากร</a></li>
                <li><a href="dataEdit.php?sql=D-info" style="font-size: 1rem;">แก้ไขข้อมูลการเสียชีวิต</a></li>
                <li><a href="dataEdit.php?sql=VHSs" style="font-size: 1rem;">แก้ไขข้อมูลจำนวน อสม.</a></li>
                <li><a href="dataEdit.php?sql=Hospital" style="font-size: 1rem;">แก้ไขข้อมูลโรงพยาบาล</a></li>
                <li><a href="admin_page.php" style="font-size: 1rem;">Admin Page</a></li>
            </ul>
        </nav>
    </div>

    <?php
    session_start();

    if ($_SESSION['role'] !== 'admin') {
        header("location: admin.php");
    } else {

        include('connect.php');

        if ($_GET["sql"] == "people") { ?>
            <h1 style="text-align: center;">แก้ไขข้อมูลประชากร</h1>
            <?php

            if (isset($_POST["update-btn"])) {
                $query = "UPDATE `population` SET `Firstname` = '{$_POST['Firstname']}', `Lastname` = '{$_POST['Lastname']}', `popAge` ='{$_POST['popAge']}',
                    `popGender` = '{$_POST['popGender']}', `popDisease` = '{$_POST['popDisease']}', `popWeight` = '{$_POST['popWeight']}',
                    `popHeight` = '{$_POST['popHeight']}' WHERE `population`.`popID` = '{$_POST['popID']}'";

                if (mysqli_query($conn, $query)) {
            ?>
                    <div class="alrt-scs"> <?php echo "updated successfully !"; ?></div>
                <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            } elseif (isset($_POST["delete-btn"])) {
                $query = "DELETE FROM population WHERE `population`.`popID` = '{$_POST['popID']}'";
                if (mysqli_query($conn, $query)) {
                ?>
                    <div class="alrt-del"> <?php echo "deleted successfully !"; ?></div>
                <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            } elseif (isset($_POST["add-btn"])) {
                $query = "INSERT INTO `population` (`popID`, `Firstname`, `Lastname`, `popAge`, `popGender`, `popDisease`, `popWeight`, `popHeight`) 
            VALUES (NULL, '{$_POST['Firstname']}', '{$_POST['Lastname']}', '{$_POST['popAge']}', '{$_POST['popGender']}', '{$_POST['popDisease']}', 
            '{$_POST['popWeight']}', '{$_POST['popHeight']}')";
                if (mysqli_query($conn, $query)) {
                ?>
                    <div class="alrt-add"> <?php echo "added successfully !"; ?></div>
            <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            }


            $query = "SELECT * FROM population"
                or die("Error:" . mysqli_connect_error());
            $result = mysqli_query($conn, $query);
            ?>
            <div class="container">
                <form action=" #" method="post" style="margin: 15px 0 ;">
                    <input type="text" placeholder="Firstname" name="Firstname">
                    <input type="text" placeholder="Lastname" name="Lastname">
                    <input type="text" placeholder="Age" name="popAge">
                    <select name="popGender" id="#" style="width: 100px; text-align: center;">
                        <option>ชาย</option>
                        <option>หญิง</option>
                    </select>
                    <!-- <input type="text" placeholder="Gender" name="popGender"> -->
                    <input type="text" placeholder="Congenital disease" name="popDisease">
                    <input type="text" placeholder="Weight" name="popWeight">
                    <input type="text" placeholder="Height" name="popHeight">
                    <button type="submit" id="add-btn" name="add-btn" value="add" style="display: inline; margin: 20px;">Add</button><br>
                </form>
            </div>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <div class="container">
                    <form action="#" method="post">

                        <input type="hidden" name="popID" value=<?php echo $row["popID"]; ?>>
                        <p>ชื่อ <input type=" text" name="Firstname" value=<?php echo $row["Firstname"]; ?> style="width: 120px;"></p>
                        <p>นามสกุล <input type="text" name="Lastname" value=<?php echo $row["Lastname"]; ?> style="width: 120px;"></p>
                        <p>อายุ <input type="text" name="popAge" value=<?php echo $row["popAge"]; ?> style="width: 30px;"> ปี</p>
                        <p>เพศ <select name="popGender" id="#" style="width: 100px; text-align: center; width: 60px;">
                                <?php if ($row["popGender"] == "ชาย") { ?>
                                    <option>ชาย</option>
                                    <option>หญิง</option>
                                <?php } elseif ($row["popGender"] == "หญิง") { ?>
                                    <option>หญิง</option>
                                    <option>ชาย</option>
                                <?php } ?>
                            </select></p>
                        <p>โรคประจำตัว <input type="text" name="popDisease" value=<?php echo $row["popDisease"]; ?> style="width: 180px;"></p>
                        <p>น้ำหนัก <input type="text" name="popWeight" value=<?php echo $row["popWeight"]; ?> style="width: 60px;"> กก.</p>
                        <p>ส่วนสูง <input type="text" name="popHeight" value=<?php echo $row["popHeight"]; ?> style="width: 60px;"> ซม.</p>
                        <button type="submit" id="upd-btn" name="update-btn" value="update" style="display: inline; margin: 0 0 15px 15px;">Update</button>
                        <button type="submit" id="del-btn" name="delete-btn" value="delete" style="display: inline; margin-left: 15px;">Delete</button>

                    </form>
                </div>
            <?php }
        }

        // ------------------------------------------------------------ D-info -------------------------------------------------------------------

        else if ($_GET["sql"] == "D-info") { ?>
            <h1 style="text-align: center;">แก้ไขข้อมูลการเสียชีวิต</h1>
            <?php
            if (isset($_POST["update-btn"])) {
                $query = "UPDATE `d-info` SET `Cause` = '{$_POST['Cause']}', `Values` = '{$_POST['Values']}' WHERE `d-info`.`DeathId` = '{$_POST['DeathId']}'";

                if (mysqli_query($conn, $query)) {
            ?>
                    <div class="alrt-scs"> <?php echo "updated successfully !"; ?></div>
                <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            } elseif (isset($_POST["delete-btn"])) {
                $query = "DELETE FROM `d-info` WHERE `d-info`.`DeathId` = '{$_POST['DeathId']}'";
                if (mysqli_query($conn, $query)) {
                ?>
                    <div class="alrt-del"> <?php echo "deleted successfully !"; ?></div>
                <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            } elseif (isset($_POST["add-btn"])) {
                $query = "INSERT INTO `d-info` (`DeathId`, `Cause`, `Values`) VALUES ('', '{$_POST['Cause']}', '{$_POST['Values']}')";
                if (mysqli_query($conn, $query)) {
                ?>
                    <div class="alrt-add"> <?php echo "added successfully !"; ?></div>
            <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            }

            $query = "SELECT * FROM `d-info`"
                or die("Error:" . mysqli_connect_error());
            $result = mysqli_query($conn, $query);
            ?>
            <div class="container">
                <form action="#" method="post" style="margin: 15px 0 ;">
                    <input type="text" placeholder="Disease" name="Cause">
                    <input type="text" placeholder="Values" name="Values">
                    <button type="submit" id="add-btn" name="add-btn" value="add" style="display: inline; margin: 20px;">Add</button><br>
                </form>
            </div>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <div class="container">
                    <form action="#" method="post">

                        <input type="hidden" name="DeathId" value=<?php echo $row["DeathId"]; ?>>
                        <p>โรค <input type="text" name="Cause" value=<?php echo $row["Cause"]; ?>></p>
                        <p>จำนวน <input type="text" name="Values" value=<?php echo $row["Values"]; ?> style="width: 60px; text-align:center;"> คน</p>
                        <button type="submit" id="upd-btn" name="update-btn" value="update" style="display: inline; margin: 0 0 15px 15px;">Update</button>
                        <button type="submit" id="del-btn" name="delete-btn" value="delete" style="display: inline; margin-left: 15px;">Delete</button>

                    </form>
                </div>
            <?php }
        }

        // ------------------------------------------------------------ VHSs -------------------------------------------------------------------

        else if ($_GET["sql"] == "VHSs") { ?>
            <h1 style="text-align: center;">แก้ไขข้อมูล อสม.</h1>
            <?php
            if (isset($_POST["update-btn"])) {
                $query = "UPDATE `vhss-info` SET `VHSLocation` = '{$_POST['VHSLocation']}', `VHSValues` = '{$_POST['VHSValues']}' WHERE `vhss-info`.`VHSid` = '{$_POST['VHSid']}'";

                if (mysqli_query($conn, $query)) {
            ?>
                    <div class="alrt-scs"> <?php echo "updated successfully !"; ?></div>
                <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            } elseif (isset($_POST["delete-btn"])) {
                $query = "DELETE FROM `vhss-info` WHERE `vhss-info`.`VHSid` = '{$_POST['VHSid']}'";
                if (mysqli_query($conn, $query)) {
                ?>
                    <div class="alrt-del"> <?php echo "deleted successfully !"; ?></div>
                <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            } elseif (isset($_POST["add-btn"])) {
                $query = "INSERT INTO `vhss-info` (`VHSid`, `VHSLocation`, `VHSValues`) VALUES ('', '{$_POST['VHSLocation']}', '{$_POST['VHSValues']}')";
                if (mysqli_query($conn, $query)) {
                ?>
                    <div class="alrt-add"> <?php echo "added successfully !"; ?></div>
            <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            }

            //  <?php 

            $query = "SELECT * FROM `vhss-info`"
                or die("Error:" . mysqli_connect_error());
            $result = mysqli_query($conn, $query);
            ?>
            <div class="container">
                <form action="#" method="post" style="margin: 15px 0 ;">
                    <input type="text" placeholder="หมู่บ้าน" name="VHSLocation">
                    <input type="text" placeholder="จำนวนอสม." name="VHSValues">
                    <button type="submit" id="add-btn" name="add-btn" value="add" style="display: inline; margin: 20px;">Add</button><br>
                </form>
            </div>

            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <div class="container">
                    <form action="#" method="post">

                        <input type="hidden" name="VHSid" value=<?php echo $row["VHSid"]; ?>>
                        <p>หมู่บ้าน <input type="text" name="VHSLocation" value=<?php echo $row["VHSLocation"]; ?>></p>
                        <p>จำนวน <input type="text" name="VHSValues" value=<?php echo $row["VHSValues"]; ?> style="width: 60px; text-align:center;"> คน</p>
                        <button type="submit" id="upd-btn" name="update-btn" value="update" style="display: inline; margin: 0 0 15px 15px;">Update</button>
                        <button type="submit" id="del-btn" name="delete-btn" value="delete" style="display: inline; margin-left: 15px;">Delete</button>

                    </form>
                </div>
            <?php }
        }

        // ------------------------------------------------------------ Hospital -------------------------------------------------------------------

        else if ($_GET["sql"] == "Hospital") { ?>
            <h1 style="text-align: center;">แก้ไขข้อมูลสถานพยาบาล</h1>
            <?php if (!empty($_POST)) {
                $filename = $_POST["HosPic"];
                $tempname = $_POST["HosPic"];
                $folder = "./img/" . $filename;
            }
            if (isset($_POST["update-btn"])) {
                $query = "UPDATE `hospital` SET `HosPic` = '$filename', `HosName` = '{$_POST['HosName']}', `HosInfo` = '{$_POST['HosInfo']}', 
                        `Hosloca` = '{$_POST['Hosloca']}', `HosCont` = '{$_POST['HosCont']}', `HosMap` = '{$_POST['HosMap']}'
                        WHERE `hospital`.`HosID` = '{$_POST['HosID']}'";
                if (mysqli_query($conn, $query)) {
                    move_uploaded_file($tempname, $folder);
            ?>
                    <div class="alrt-scs" style="margin-bottom: 50px;"> <?php echo "updated successfully !"; ?></div>
                <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            } elseif (isset($_POST["delete-btn"])) {
                $query = "DELETE FROM `hospital` WHERE `hospital`.`HosID` = '{$_POST['HosID']}'";
                if (mysqli_query($conn, $query)) {
                ?>
                    <div class="alrt-del" style="margin-bottom: 50px;"> <?php echo "deleted successfully !"; ?></div>
                <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            } elseif (isset($_POST["add-btn"])) {
                $query = "INSERT INTO `hospital` (`HosID`, `HosPic`, `HosName`, `HosInfo`, `Hosloca`, `HosCont`, `HosMap`) 
                        VALUES ('', '$filename', '{$_POST['HosName']}', '{$_POST['HosInfo']}', '{$_POST['Hosloca']}', '{$_POST['HosCont']}', '{$_POST['HosMap']}');";
                if (mysqli_query($conn, $query)) {
                ?>
                    <div class="alrt-add" style="margin-bottom: 50px;"> <?php echo "added successfully !"; ?></div>
            <?php
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            }

            $query = "SELECT * FROM `hospital`"
                or die("Error:" . mysqli_connect_error());
            $result = mysqli_query($conn, $query);
            ?>
            <div class="container">

                <form action="#" method="post" style="margin: 15px 0 ;">
                    <input type="file" class="ptupdate" placeholder="Hospital Picture" name="HosPic">
                    <textarea name="HosName" cols="20" rows="5" placeholder="Hospital Name"></textarea>
                    <textarea name="HosInfo" cols="50" rows="5" placeholder="Information"></textarea>
                    <textarea name=" Hosloca" cols="20" rows="5" placeholder="Location"></textarea>
                    <textarea name="HosCont" cols="20" rows="5" placeholder="Contact"></textarea>
                    <textarea name="HosMap" cols="20" rows="5" placeholder="Google Maps Link"></textarea>
                    <button type="submit" id="add-btn" name="add-btn" value="add" style="display: inline; margin: 20px; transform: translate(-5%, -45%);">Add</button><br>
                </form>
            </div>

            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <div class="container">
                    <form action="#" method="post">
                        <img src="<?php echo "img/" . $row["HosPic"]; ?>" alt="" style="  height: 120px; width: 180px; margin: auto 5px;">
                        <div class=" edtcontent">
                            <input type="hidden" name="filename" value=<?php echo $row["HosPic"]; ?>>
                            <input type="hidden" name="HosID" value=<?php echo $row["HosID"]; ?>>
                            <input type="file" class="ptupdate" name="HosPic" value=<?php echo $row["HosPic"]; ?>>
                            <textarea name="HosName" cols="20" rows="8"><?php echo $row["HosName"]; ?></textarea>
                            <textarea name="HosInfo" cols="30" rows="8"><?php echo $row["HosInfo"]; ?></textarea>
                            <textarea name=" Hosloca" cols="15" rows="8"><?php echo $row["Hosloca"]; ?></textarea>
                            <textarea name="HosCont" cols="15" rows="8"><?php echo $row["HosCont"]; ?></textarea>
                            <textarea name="HosMap" cols="15" rows="8"><?php echo $row["HosMap"]; ?></textarea>
                        </div>
                        <button type="submit" id="upd-btn" name="update-btn" value="update" style="display: inline; margin: 0 0 15px 15px; transform: translate(-5%, -45%);">Update</button>
                        <button type="submit" id="del-btn" name="delete-btn" value="delete" style="display: inline; margin: 20px; transform: translate(-5%, -45%);">Delete</button>
                    </form>
                </div>
    <?php }
        }
    } ?>
</body>

</html>