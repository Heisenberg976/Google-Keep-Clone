<?php
    include 'database.php';
    if(isset($_POST['submit'])){
        $name  = $_POST['name'];
        $id  = $_POST['id'];
        $sql = "update tags set name ='".$name."'where id=".$id;
        mysqli_query($con,$sql);
        header("Location:tags.php");
    }
?>