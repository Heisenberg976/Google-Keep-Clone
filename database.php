<?php
    $username = 'root';
    $pass = '';
    $db = 'keep-clone';
    $host = '127.0.0.1';
    $con = mysqli_connect($host,$username,$pass,$db);

    if(!$con){
        die (mysqli_error($con));
    }
