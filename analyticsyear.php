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
                ['year', 'val'],
                <?php 
                $sql = "SELECT year,  COUNT(*) as val FROM sdata GROUP BY year";
                $fire = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($fire)) {
                   
                   
                    echo "['".$row['year']."', ".$row['val']."],";
                }
                ?>
            ]);
            var options = {
                title: 'year Activities'
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