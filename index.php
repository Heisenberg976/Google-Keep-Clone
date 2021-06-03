<?php
    include  'database.php';
    include 'navbar.php';
    include 'session-check.php';
    
?>

<html>
<head> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    
      <div style = "margin-top:20px;margin-left:20px; float:left" >
      <form action="index.php" method = "post">
    <input type="text" class = "form-control"placeholder = "Search..." name = "search" style = "width:150px;float:left">
    <input type="submit" class = "btn btn-success" value = "Search" name = 'submit'> 
    </form>
    <br>
    <div class="list-group" style = "width:300px;float:left">
    <?php
    $sqll = "select* from tags where userid=".$_SESSION['id'];
    echo '<a href="index.php" class="list-group-item list-group-item-action" style ="color:green;">All</a>';

                $resultt = mysqli_query($con,$sqll) ;
                while($ress = mysqli_fetch_array($resultt)){
                  $sqll2 = "select* from todotags where tagid=".$ress['id']. " group by (tagid)";
                  $resultt2 = mysqli_query($con,$sqll2) ;
                    while($ress2 = mysqli_fetch_array($resultt2)){
                  echo '<a href="index.php?filter='.$ress['id'].'&todoid='.$ress2['tagid'].'" class="list-group-item list-group-item-action" style ="color:green;">'.$ress['name'].'</a>';
                }
              }
  ?>
    </div>  



    </div>
    <div class="row">
    <a href="add-todo.php" class = "btn btn-success" style = "margin-top:20px;height:38px;border-radius:10%;position:absolute;margin-left:3%">Add</a>
      <?php
            if(isset($_GET['todoid']))  $sql = "select* from todos where userid=".$_SESSION['id']." and id=".$_GET['todoid']; 
            else if(isset($_POST['search'])) $sql = "select* from todos where userid=".$_SESSION['id']." and name like '%".$_POST['search']."%'";   
            else $sql = "select* from todos where userid=".$_SESSION['id'];
           
            $result = mysqli_query($con,$sql);
            
            while($res = mysqli_fetch_array($result)){
                echo   '<div  class = "col-md-2"style="margin-top:70px;margin-left:42px;height:142px;">';  
                echo   '<div  class="card" style = "cursor:pointer;border: 2px green outset;z index = 0" >';
                
                echo  '<div class="card-body" style  = "z index = 0">';
                echo  '<h4><a href="one.php?id='.$res['id'].'" style = "text-decoration:none;">'.$res['name'].'</a> </h4>'; 
                echo   '<p class="card-text">'.$res['body'].'</p>';
                 $sql1 = "select* from todotags where todoid=".$res['id'];
                $result1 = mysqli_query($con,$sql1);
                while($res1 = mysqli_fetch_array($result1)){
                 
                  $sql2 = "select* from tags where id=".$res1['tagid'];
                $result2 = mysqli_query($con,$sql2);
                while($res2 = mysqli_fetch_array($result2)){
                  echo '<span class="badge badge-success" style = "margin-right:5px;margin-bottom:5px">'.$res2['name'].'</span>';
                  // echo '<a class = "btn btn-success"; style = "color:white;position:relative">'.$res2['name'].'</a>';
                  
                }

                }
                
                echo  '<br>';
                echo   '</div>';
                echo  '</div>';
                echo '</div>';
                
            }
     ?> 
    
  
    
    </div>
  
</body>
</html>