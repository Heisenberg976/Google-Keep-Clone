<?php
    include 'session-check.php';
    include 'database.php';
    include 'navbar.php';
?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
    <body>
    <div class="card" style = "margin-top:20px;margin-left:10px">
  <div class="card-body">

  <form action="add.php" method = "post">
    <label>Tag</label>
   <input type="text" name = "name" class = "form-control" >
   <br>
   <input type="submit" name = "submit" class  = "btn btn-success" style = "width:200px">
   </form>

  
  </div>
</div>
    <br>
    <br>
<div class="row" style = "margin-left:10px">
     
    <?php   
        $sql = "select* from tags where userid=".$_SESSION['id'];
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        while($res = mysqli_fetch_array($result)){
          echo   '<div class = "col-md-3">';   
         echo   '<div class="card">';
             echo  '<div class="card-body">';
             echo  '<h4>'.$res['name'].'</h4>';
            echo  '<br>';
             echo '<a href="edit.php?id='. $res['id'] . '"class="btn btn-primary">Edit</a>';
             echo '<a href="delete.php?id='.$res['id'].'"class = "btn btn-danger" style = "margin-left:9px">Delete</a>';
          echo   '</div>';
         echo  '</div>';
         echo '</div>';
        }
   
        
    ?>

</div>
    </body>   
</html>