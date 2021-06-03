<?php
    include 'database.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from tags where id=".$id;
        mysqli_query($con,$sql);
        $sql1 = "delete from todotags where tagid=".$id;
        mysqli_query($con,$sql1);
        header("Location:tags.php");
    }

?>