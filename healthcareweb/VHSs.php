<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>ข้อมมูลอสม.</title>

    <?php require_once 'connect.php'?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['โรค', 'จำนวน'],


            <?php $query = "SELECT * FROM `vhss-info`";  
            $result = mysqli_query($conn, $query); 
        ?>

            <?php
            while($chart = mysqli_fetch_assoc($result)){
                echo "['".$chart['VHSLocation']."',".$chart['VHSValues']."],";
            }
        ?>


        ]);

        var options = {
            title: 'ข้อมูลอสม.ตำบลรอบเวียง แยกตามหมู่บ้าน'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
    </script>
</head>

<body style="margin: 0; background-image: linear-gradient(315deg, #b9cce7 0%, #f5f7f7 100%);">
    <?php include("header.php"); ?>

    <div class="" style="width: 800px; height: 640px; margin: 15px auto; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
        border-radius: 30px; overflow: hidden; display: flex;">
        <div class="content" style="margin-left: 0px;">
            <div id="piechart" style="width: 900px; height: 650px;"></div>
        </div>
    </div>
</body>

</html>