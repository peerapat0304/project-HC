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
     <?php
        include("header.php");

        if (isset($_POST['analyze'])) {

            $temp = $_POST['temp'];
            $vom = $_POST['vom'];
            $tired = $_POST['tired'];
            $aches = $_POST['aches'];
            $headaches = $_POST['headaches'];
            $eyes = implode(",", $_POST['eyes']);
            $abdomi = $_POST['abdomi'];
            $diarr = $_POST['diarr'];
            $rash = implode(",", $_POST['rash']);
            $other = implode(",", $_POST['other']);

            include('connect.php');
            $symp = array($temp, $vom, $tired, $aches, $headaches, $eyes, $abdomi, $diarr, $rash, $other);
            $symptoms = explode(",", implode(",", $symp));

            $sympc = count($symp);

            for ($s = 0; $s < $sympc; $s++) {

                if (($symp[$s] == "ปกติ")
                    || ($symp[$s] == "ไม่คลื่นไส้")
                    || ($symp[$s] == "ไม่อ่อนเพลีย")
                    || ($symp[$s] == "ไม่ปวดเมื่อยร่างกาย")
                    || ($symp[$s] == "ไม่ปวดหัว")
                    || ($symp[$s] == "ตาปกติ")
                    || ($symp[$s] == "ไม่ปวดท้องบิด")
                    || ($symp[$s] == "ไม่มีอาการท้องเสีย")
                    || ($symp[$s] == "ไม่มีผื่น")
                    || ($symp[$s] == "ไม่มีอาการอื่น")
                ) {
                    unset($symp[$s]);
                }
            }

            $query = "SELECT symptom FROM desease";
            $result = mysqli_query($conn, $query);


            while ($result2 = mysqli_fetch_assoc($result)) {

                $sympDB[] = array($result2);
            }

            for ($i = 0; $i <= 10; $i++) {
                $sympArr = explode(",", implode(",", $sympDB[$i][0]));
                $check = array_intersect($sympArr, $symptoms);
                $count = count($check);
            }

            $sortsymp = implode(",", $symp);
            $realsymp = explode(",", $sortsymp);

            $check = count($realsymp);

            for ($c = 0; $c < $check; $c++) {
                $alldesease = "SELECT desease FROM desease WHERE desease.symptom LIKE '%$realsymp[$c]%'";
                $name = mysqli_query($conn, $alldesease);
                while ($allname = mysqli_fetch_assoc($name)) {
                    $dename[] = array($allname);
                }
            }

            $denamec = count($dename);

            $diarrhea = "0";
            $FvOU = "0";
            $pneumonia = "0";
            $foodpoi = "0";
            $conjunct = "0";
            $influenza = "0";
            $chickenpox = "0";
            $HFMD = "0";
            $dengue = "0";
            $STD = "0";
            $scrubtyphus = "0";

            for ($n = 0; $n < $denamec; $n++) {
                if ($dename[$n][0]['desease'] == "ท้องร่วง") {
                    $diarrhea +=  1;
                } elseif ($dename[$n][0]['desease'] == 'ไข้ไม่ทราบสาเหตุ') {
                    $FvOU += 1;
                } elseif ($dename[$n][0]['desease'] == 'ปอดบวม') {
                    $pneumonia += 1;
                } elseif ($dename[$n][0]['desease'] == 'อาหารเป็นพิษ') {
                    $foodpoi +=  1;
                } elseif ($dename[$n][0]['desease'] == 'ตาแดง') {
                    $conjunct +=  1;
                } elseif ($dename[$n][0]['desease'] == 'ไข้หวัดใหญ่') {
                    $influenza += 1;
                } elseif ($dename[$n][0]['desease'] == 'สุกใส หรือ อีสุกอีใส') {
                    $chickenpox +=  1;
                } elseif ($dename[$n][0]['desease'] == 'มือ เท้า ปาก') {
                    $HFMD +=  1;
                } elseif ($dename[$n][0]['desease'] == 'ไข้เลือดออก') {
                    $dengue +=  1;
                } elseif ($dename[$n][0]['desease'] == 'ติดต่อทางเพศสัมพันธ์ (กามโรค)') {
                    $STD +=  1;
                } elseif ($dename[$n][0]['desease'] == 'ไข้รากสาดใหญ่ (สครับไทฟัส)') {
                    $scrubtyphus +=  1;
                }
            }


            $nameNcount = array(
                array('ท้องร่วง', $diarrhea),
                array('ไข้ไม่ทราบสาเหตุ', $FvOU),
                array('ปอดบวม', $pneumonia),
                array('อาหารเป็นพิษ', $foodpoi),
                array('ตาแดง', $conjunct),
                array('ไข้หวัดใหญ่', $influenza),
                array('สุกใส หรือ อีสุกอีใส', $chickenpox),
                array('มือ เท้า ปาก', $HFMD),
                array('ไข้เลือดออก', $dengue),
                array('ติดต่อทางเพศสัมพันธ์ (กามโรค)', $STD),
                array('ไข้รากสาดใหญ่ (สครับไทฟัส)', $scrubtyphus),
            );

            for ($t = 0; $t < 11; $t++) {
                $percent = round(($nameNcount[$t][1] * 100) / $n, 2);
                $cal[] = [$nameNcount[$t][0], $percent];
            }


            // Define the comparison function

            function cmp($a, $b)
            {
                if ($a['1'] == $b['1']) {
                    return 0;
                }
                return ($a['1'] < $b['1']) ? -1 : 1;
            }


            // Sort the array by the second value of each element
            uasort($cal, 'cmp');
        }
        ?>
     <div class="a-container">
         <div class="A-box">
             <h2 style="padding: 20px 0 0 30px;"> ผลการวิเคราะห์สุขภาพ Health Analysis results</h2>
             <p style="padding-left: 50px;"> โดยเรียงลำดับของโอกาสการเป็นโรคต่าง ๆ จากมากไปน้อย<br>พร้อมคำแนะนำการดูแลสุขภาพเบื้องต้น </p>
             <?php for ($l = 1; $l <= 11; $l++) {
                    $pop = array_pop($cal); ?>
                 <div class="result">
                     <p style="padding-bottom: 6px;"><?php echo $l ?>. มีโอกาศเป็นโรค<?php print_r($pop[0]); ?> &emsp;<b><?php print_r($pop[1]); ?>%</b>
                         <a href="advice.php?adv=<?php print_r($pop[0]); ?>" style="color:blue; display:inline; ">คำแนะนำ</a>
                     </p>
                 </div>
             <?php  } ?>
         </div>
     </div>

 </body>

 </html>