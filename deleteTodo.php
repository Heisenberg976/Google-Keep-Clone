<?php
    include 'database.php';
    include 'session-check.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from todos where id =".$id;
        $sql1 = "delete from todotags where todoid=".$id;
        mysqli_query($con,$sql1);
        mysqli_query($con,$sql) or die(mysqli_error($con));
        header("Location:index.php");
    }

?>