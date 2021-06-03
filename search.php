<?php
    include 'database.php';
    include 'session-check.php';
    if(isset($_POST['submit'])){
        $search = $_POST['search'];
       
        // $sqll = "select* from todos where userid=".$_SESSION['id']." AND `name` LIKE '%".$search."%'";
            header("Location:index.php");
                         
    }
?>