<?php
    include 'database.php';
    if(isset($_POST['submit'])){
        $name  = $_POST['name'];
        $id  = $_POST['id'];
        $body = $_POST['body'];
        $sql = "UPDATE todos set name='$name', body='$body' where id=".$id;
        mysqli_query($con,$sql) or die(mysqli_error($con));
        $tags = $_POST['tags'];
            $sql1 = "delete from todotags where todoid=".$id;
            mysqli_query($con,$sql1);
            for($i = 0; $i<count($tags);$i++){
                $sqll = "insert into todotags (todoid,tagid) values (".$id.",".$tags[$i].")";
                mysqli_query($con,$sqll);
            }
        header("Location:index.php");
    }
?>