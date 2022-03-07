<?php
include 'connection.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['submit'])) {
    $allowed_ext = ['xls', 'csv', 'xlsx'];
    $filename = $_FILES['xl']['name'];
    $checking = explode('.', $filename);
    $fileext = end($checking);

    if (in_array($fileext, $allowed_ext)) {

        $targetpath = $_FILES['xl']['tmp_name'];
         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetpath);
         $data= $spreadsheet->getActiveSheet()->toArray();
         
        //  print_r($data);
        
       
         foreach($data as $row){
            
        $sn=  mysqli_real_escape_string($con,$row[0]);
        $pid= mysqli_real_escape_string($con,$row[1]);
        $author1=mysqli_real_escape_string($con,$row[2]);
        $author2=mysqli_real_escape_string($con,$row[3]);
        $author3=mysqli_real_escape_string($con,$row[4]);
        $author4=mysqli_real_escape_string($con,$row[5]);
        $author5=mysqli_real_escape_string($con,$row[6]);
        $author6=mysqli_real_escape_string($con,$row[7]);
        $author7=mysqli_real_escape_string($con,$row[8]);
        $author8=mysqli_real_escape_string($con,$row[9]);
        $title=mysqli_real_escape_string($con,$row[10]);
        $name=mysqli_real_escape_string($con,$row[11]);
        $month=mysqli_real_escape_string($con,$row[12]);
        $year=mysqli_real_escape_string($con,$row[13]);
        $academic1=mysqli_real_escape_string($con,$row[14]);
        $factor=mysqli_real_escape_string($con,$row[15]);
        $issn=mysqli_real_escape_string($con,$row[16]);
        $doi=mysqli_real_escape_string($con,$row[17]);
        $indexing=mysqli_real_escape_string($con,$row[18]);
        $unpaid=mysqli_real_escape_string($con,$row[19]);
        $ugc=mysqli_real_escape_string($con,$row[20]);
        $hindex=mysqli_real_escape_string($con,$row[21]);
        $number=mysqli_real_escape_string($con,$row[22]);
        $link=mysqli_real_escape_string($con,$row[23]);
        $paperlink=mysqli_real_escape_string($con,$row[24]);
        $department=mysqli_real_escape_string($con,$row[25]);
        $indexed=mysqli_real_escape_string($con,$row[26]);
        $paperfound=mysqli_real_escape_string($con,$row[7]);
        $dept=mysqli_real_escape_string($con,$row[28]);
        $academic2=mysqli_real_escape_string($con,$row[29]);

        $checkdata="select sn from sdata where sn='".$sn."'";
        $query=mysqli_query($con,$checkdata);
        $count=mysqli_num_rows($query);
        if($count>0){

            // update
            $sql1="update sdata set 
                sn='".$sn."',
                pid='".$pid."',
                author1='".$author1."',
                author2='".$author2."',
                author3='".$author3."',
                author4 ='".$author4."',
                author5='".$author5."',
                author6='".$author6."',
                author7='".$author7."',
                author8='".$author8."',
                title='".$title."',
                name='".$name."',
                month='".$month."',
                year='".$year."',
                academic1='".$academic1."',
                factor='".$factor."',
                issn='".$issn."',
                doi='".$doi."',
                indexing='".$indexing."',
                unpaid='".$unpaid."',
                ugc='".$ugc."',
                hindex='".$hindex."',
                number='".$number."',
                link='".$link."',
                paperlink='".$paperlink."',
                department='".$department."',
                indexed='".$indexed."',
                paperfound='".$paperfound."',
                dept='".$dept."',
                academic2='".$academic2."' where sn='".$sn."'";
               $up=mysqli_query($con,$sql1);
               $msg=1;

        }else{
            // insert

             // insert query
             $sql="INSERT into sdata(sn,pid,author1,author2,author3,author4,author5,author6,author7,author8,title,name,month,year,academic1,factor,issn,doi,indexing,unpaid,ugc,hindex,number,link,paperlink,department,indexed,paperfound,dept,academic2) values('".$sn."','".$pid."','".$author1."','".$author2."','".$author3."','".$author4."','".$author5."','".$author6."','".$author7."','".$author8."','".$title."','".$name."','".$month."','".$year."','".$academic1."','".$factor."','".$issn."','".$doi."','".$indexing."','".$unpaid."','".$ugc."','".$hindex."','".$number."','".$link."','".$paperlink."','".$department."','".$indexed."','".$paperfound."','".$dept."','".$academic2."')";

             $res=mysqli_query($con,$sql);
                $msg=1;
            
        }

    }       
        if(isset($msg)){

            $sql4="delete from sdata where sn='".null."' and pid='Paper ID'";
            $fire4=mysqli_query($con,$sql4);
            $sql5="delete from sdata where pid='Paper ID'";
            $fire5=mysqli_query($con,$sql5);

            $_SESSION['success']="successfull uploaded"; 
            header("location:index_user.php");
        }else{
            $_SESSION['error']="not uploaded uploaded"; 
            header("location:index_user.php");

        }
    
    } else {
        $_SESSION['status']="invalid file"; 
        header("location:index_user.php");
        
    }
} 
?>