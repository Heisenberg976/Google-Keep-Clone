<?php
    include 'database.php';
    session_start();
    $message = '';
    if(isset($_POST['submit'])){
        $name = $_POST['email'];
        $password = $_POST['password'];
        if($name == '' && $password == ''){
            $message = "";
        }
        $sql = "select* from users";
        $result = mysqli_query($con,$sql);
        while($res = mysqli_fetch_array($result)){
             if( $res['email'] == $name && $res['password'] == md5($password)) {
                $_SESSION['user'] = $name;
                $_SESSION['id'] = $res['id'];
                header("Location:index.php");
            }
            else    $message = "incorrect password or username";
            
        }
           

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
        <form action="login.php" method = 'post'>
        <label > Email</label>
        <input type="text" class = "form-control" name = "email">
        <label>Password</label>
        <input type="password" class = "form-control" name = "password">
        <a href="register.php">Create new account</a>
        <br> <br>
        
        <input type="submit" name = "submit" value = "Sign in" class = "btn btn-success">
        </form>
        <?= $message?>
    
  </div>
  </div>
</div>
</div>
</div>

</html>