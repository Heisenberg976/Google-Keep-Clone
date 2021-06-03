<?php
    include  'session-check.php';
    
    $message = "";
    if(isset($_POST['submit'])){
        $old = $_POST['oldPass'];
        $new = $_POST['newPass'];
        $Rnew = $_POST['repeatNewPass'];
        
      
        $sql = "select* from users where email='".$_SESSION['user']."'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        while($res = mysqli_fetch_array($result)){
             if($res['password'] == md5($old) && $new == $Rnew) {
                 $sql = "update users set password ='".md5($new) ."' where email ='".$_SESSION['user']."'";
                 mysqli_query($con,$sql) or die(mysqli_error($con));
            } 
            else    $message = "fields do not match";
            
        }
    }
?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div style = "margin-top:20px;margin-left:20px; float:left" >
    <input type="text" class = "form-control"placeholder = "Search..." style = "width:300px;float:left">
    <br> <br>
    <div class="list-group" style = "width:300px;float:left">
  <a href="#" class="list-group-item list-group-item-action active">Cras justo odio</a>
  <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
  <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
  <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item list-group-item-action">Vestibulum at eros</a>
    </div>  
</div>
    
<div class="card" style = "padding-left:70px;width:550px;border:none;padding-top:10px">
  <div class="card-body">
    <h3 class="card-title">Change Password</h3>
        <form action="user.php" method = "post">
        <label > Old Password</label>
        <input type="password" class = "form-control" name = "oldPass">
        <label>New Password</label>
        <input type="password" class = "form-control"  name = "newPass">      
        <label>Repeat New Password</label>
        <input type="password" class = "form-control" name = "repeatNewPass" >        
       <b> <?= $message?> </b>
        <br>
        
        <input type="submit" name = "submit" value = "Submit" class = "btn btn-success">
       
        </form>
   
    </div>
  </div>
</body>

</html>