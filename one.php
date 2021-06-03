<?php
  include 'database.php';
  include  'navbar.php';
  include 'session-check.php';
  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "select* from todos where id=".$id;
      $result = mysqli_query($con,$sql);
      $res = mysqli_fetch_array($result);  
  }
  else header('Location:tags.php')

?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="container">

 <div class="row">
  <div class="offset-md-3 col-md-5"> 
<div class="card" style = "margin-top:50%">
  <div class="card-body">
    <h3 class="card-title">Todo</h3>
        <form action="editTodo.php" method = 'post'>
        <label > Title</label>
        <input type="text" class = "form-control" name = "name" value = '<?= $res['name']?>' >
        <label>Body</label>
        <input type="text" class = "form-control" style = "height:200px" value = '<?=$res['body']?>'  name = "body">
        <br>
         <?php 
            $sql11 = "select* from tags where userid=1";
            $result11 = mysqli_query($con,$sql11);

            
              
            while($res11 = mysqli_fetch_array($result11)){
              echo '<label style = "margin-left:5px;font-size:20px">';
              echo  '<input type="checkbox" name = "tags[]" value = "'.$res11['id'].'" style = "margin-right:5px">';
              echo $res11['name'];
              echo '</label>';
             
            }
          
          
         ?>
        <br> <br>
        <input type="hidden" value = '<?=$res['id']?>' name = "id">
        <input type="submit" name = "submit" value = "Save" class = "btn btn-success">
        <a href="deleteTodo.php?id=<?=$res['id']?>"  class = "btn btn-danger">Delete</a>
        </form>
    
  </div>
  </div>
</div>
</div>
</div>

</html>