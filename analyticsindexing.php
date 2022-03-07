<?php include 'connection.php'; ?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['indexed', 'val'],
                <?php 
                $sql = "SELECT indexed,  COUNT(*) as val FROM sdata GROUP BY indexed";
                $fire = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($fire)) {
                   
                   
                    echo "['".$row['indexed']."', ".$row['val']."],";
                }
                ?>
            ]);
            var options = {
                title: 'indexed data'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html>