<?php
    include  'database.php';
    include 'session-check.php';
    if(isset($_POST['submit'])){
         $name  = $_POST['name'];
         $sql = "insert into tags (name,userid)  VALUES('".$name."','".$_SESSION['id']."')";
         mysqli_query($con,$sql) or die(mysqli_error($con));
        header("Location:tags.php");
    }
?>