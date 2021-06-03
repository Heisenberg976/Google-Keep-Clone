<?php
  include 'database.php';
 $message = '';
  if(isset($_POST['submit'])){
    if($_POST['password'] != $_POST['repeat-password']){
        $message = "entered passwords do not match";
    }
    $pass = md5($_POST['password']);
    $email = $_POST['email'];
    $sql = "insert into users (email,password) values ('$email','$pass')";
    mysqli_query($con,$sql);
    header("Location:login.php");
  }
?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="container">
 <div class="row">
  <div class="offset-md-3 col-md-5"> 

<div class="card" style = "margin-top:50%">
  <div class="card-body">
    <h3 class="card-title">Sign in</h3>
        <form action="register.php" method = "post">
        <label > Email</label>
        <input type="text" class = "form-control" name = "email">
        <label>Password</label>
        <input type="password" class = "form-control"  name = "password">      
        <label>Repeat password</label>
        <input type="password" class = "form-control" name = "repeat-password" >        
        <br>
        <input type="submit" name = "submit" value = "Sign in" class = "btn btn-success">
        </form>
       <?php 
        echo $message;
       ?>
    
  </div>
  </div>
</div>
</div>
</div>

</html>