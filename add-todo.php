<?php
    include 'database.php';
    include 'session-check.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $body = $_POST['body'];
        $tags = ($_POST['tags']);
       
        $sql = "insert into todos(name,body,userid) values(' ".$name." ',' ".$body." ', ".$_SESSION['id'].")";
        $resultt = mysqli_query($con,$sql); 
        $latest_id = $con->insert_id;
        for($i = 0 ; $i < count($tags);$i++){
           $sqll = "insert into todotags (todoid,tagid) values (".$latest_id.",".$tags[$i].")";
            mysqli_query($con,$sqll);
        }
        // echo $latest_id;
        header("Location:index.php");
    }
?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="container">
 <div class="row">
  <div class="offset-md-3 col-md-5"> 

<div class="card" style = "margin-top:50%">
  <div class="card-body">
    <h3 class="card-title">Create new ToDo</h3>
        <form action="add-todo.php" method = 'post'>
        <label > Title</label>
        <input type="text" class = "form-control" name = "name">
        <label>Body</label>
        <input type="text" class = "form-control" style = "height:200px" name = "body">
        <br>
        <?php
            
            $sql1 = "select * from tags where userid=".$_SESSION['id'];
            $result1 = mysqli_query($con,$sql1);
            while($res1 = mysqli_fetch_array($result1)){
              echo '<label style = "margin-left:5px">';
              echo '<input type="checkbox"  name = "tags[]"  value="'.$res1['id'].'">';
              echo  $res1['name'];
              echo  '</label>';
            }
        ?>
        <br>
        <input type="submit" name = "submit" value = "Save" class = "btn btn-success">
       
        </form>

    
  </div>
  </div>
</div>
</div>
</div>

</html>