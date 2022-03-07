<?php

    session_start();
    $con=new mysqli('localhost','root','','suvidha');
    if(!$con){
        echo "not connected";
    }

?>