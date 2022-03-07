<?php
include('connection.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

</head>

<body>
     <?php if(isset($_SESSION['status'])) {
            echo $_SESSION['status'];
            unset($_SESSION['status']);
        }
        ?>

    <?php if(isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>

    <?php if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
    <div class="container mb-5 text-center" >
    <form method="post" enctype="multipart/form-data" action="upload_user.php" class="table">
        <input  type="file" name="xl">
        
        <input class="btn btn-primary" type="submit" name="submit" value="Upload">
        
        
    </form>
   
</div>

</body>

</html>

<!-- data showing from database -->


<div class='table-responsive'><table  class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>sn</th>
            <th>pid</th>
            <th>author1</th>
            <th>author2</th>

            <th>author3</th>
            <th>author4</th>
            <th>author5</th>
            <th>author6</th>
            <th>author7</th>
            <th>author8</th>
            <th>title</th>
            <th>name</th>
            <th>month</th>
            <th>year</th>
            <th>academic1</th>
            <th>factor</th>
            <th>issn</th>
            <th>doi</th>
            <th>indexing</th>
            <th>unpaid</th>
            <th>ugc</th>
            <th>hindex</th>
            <th>number</th>
            <th>link</th>
            <th>paperlink</th>
            <th>department</th>
            <th>indexed</th>
            <th>paperfound</th>
            <th>debt</th>
            <th>academic2</th>

        </tr>
    </thead>


    <?php

    $sql = "select * from sdata ";

    $fire = mysqli_query($con, $sql);

    $count = mysqli_num_rows($fire);
    if ($count > 2) {
        while ($row = mysqli_fetch_array($fire)) {
            $sn =  mysqli_real_escape_string($con, $row[1]);
            $pid = mysqli_real_escape_string($con, $row[2]);
            $author1 = mysqli_real_escape_string($con, $row[3]);
            $author2 = mysqli_real_escape_string($con, $row[4]);
            $author3 = mysqli_real_escape_string($con, $row[5]);
            $author4 = mysqli_real_escape_string($con, $row[6]);
            $author5 = mysqli_real_escape_string($con, $row[7]);
            $author6 = mysqli_real_escape_string($con, $row[8]);
            $author7 = mysqli_real_escape_string($con, $row[9]);
            $author8 = mysqli_real_escape_string($con, $row[10]);
            $title = mysqli_real_escape_string($con, $row[11]);
            $name = mysqli_real_escape_string($con, $row[12]);
            $month = mysqli_real_escape_string($con, $row[13]);
            $year = mysqli_real_escape_string($con, $row[14]);
            $academic1 = mysqli_real_escape_string($con, $row[15]);
            $factor = mysqli_real_escape_string($con, $row[16]);
            $issn = mysqli_real_escape_string($con, $row[17]);
            $doi = mysqli_real_escape_string($con, $row[18]);
            $indexing = mysqli_real_escape_string($con, $row[19]);
            $unpaid = mysqli_real_escape_string($con, $row[20]);
            $ugc = mysqli_real_escape_string($con, $row[21]);
            $hindex = mysqli_real_escape_string($con, $row[22]);
            $number = mysqli_real_escape_string($con, $row[23]);
            $link = mysqli_real_escape_string($con, $row[24]);
            $paperlink = mysqli_real_escape_string($con, $row[25]);
            $department = mysqli_real_escape_string($con, $row[26]);
            $indexed = mysqli_real_escape_string($con, $row[27]);
            $paperfound = mysqli_real_escape_string($con, $row[28]);
            $dept = mysqli_real_escape_string($con, $row[29]);
            $academic2 = mysqli_real_escape_string($con, $row[30]);

    ?>
            <tbody>
                <tr>
                    <th><?php echo $sn; ?></th>
                    <td><?php echo $pid; ?></td>
                    <td><?php echo $author1; ?></td>
                    <td><?php echo $author2; ?></td>
                    <td><?php echo $author3; ?></td>
                    <td><?php echo $author4; ?></td>
                    <td><?php echo $author5; ?></td>

                    <td><?php echo $author6; ?></td>
                    <td><?php echo $author7; ?></td>
                    <td><?php echo $author8; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $month; ?></td>
                    <td><?php echo $year; ?></td>
                    <td><?php echo $academic1; ?></td>
                    <td><?php echo $factor; ?></td>
                    <td><?php echo $issn; ?></td>
                    <td><?php echo $doi; ?></td>
                    <td><?php echo $indexing; ?></td>
                    <td><?php echo $unpaid; ?></td>
                    <td><?php echo $ugc; ?></td>
                    <td><?php echo $hindex; ?></td>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $link; ?></td>
                    <td><?php echo $paperlink; ?></td>
                    <td><?php echo $department; ?></td>
                    <td><?php echo $indexed; ?></td>
                    <td><?php echo $paperfound; ?></td>
                    <td><?php echo $dept; ?></td>
                    <td><?php echo $academic2; ?></td>

                </tr>

            </tbody>
    <?php


        }
    }

    ?>
</table>
</body>

</html>