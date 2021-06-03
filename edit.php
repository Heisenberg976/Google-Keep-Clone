<?php
    include 'database.php';
    include  'navbar.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select* from tags where id=".$id;
        $result = mysqli_query($con,$sql) or die(mysqli_error());
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
    <h3 class="card-title">Tag</h3>
        <form action="update.php" method = 'post'>
        <label > Name</label>
        <input type="text" class = "form-control" name = "name" value  = "<?=$res['name']?>">
        <input type="hidden" class = "form-control"  name = "id" value  = "<?=$res['id']?>">
        <br> <br>
        <input type="submit" name = "submit" value = "Save" class = "btn btn-success">
        </form>

    
  </div>
  </div>
</div>
</div>
</div>
</body>


</html>