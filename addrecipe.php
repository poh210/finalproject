<?php
     session_start();
     include_once("dbconnect.php");
     $email = $_GET['email'];
     $username = $_GET['username'];

if(isset($_GET['ckname'])){
  $ckname = $_GET['ckname'];
  $ckdesc = $_GET['ckdesc'];
  $cking = $_GET['cking'];
  $cksteps = $_GET['cksteps'];
  $cktime = $_GET['cktime'];

  //if(isset($_COOKIE["timer"])){
    try{
      $sql = "INSERT INTO recipe (ckname, ckdesc, cking, cksteps, cktime, email)
      VALUES ('$ckname','$ckdesc','$cking','$cksteps','$cktime','$email')";
      //use exec() because no results are ruturned
      $conn->exec($sql);
      echo "<script> alert('Insert Successfully');</script>";
      echo "<script> window.location.replace('mainpage.php?email=".$email."&username=".$username."') </script>;";
    } catch(PDOException $e) {
      echo "<script> alert('Insert Error');</script>";
      
    
    }
   }
// }else{
 // echo "<script> alert('Timer expired!!!')</script>";
 // echo "<script> window.location.replace('index.php')</script>";
// }     
?>    
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - My Recipe</title>


<script language="javascript" type="text/javascript">
window.history.forward();
</script>

</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="mainpage.php?email=<?php echo $email.'&username='.$username?>">My Recipe</a> 
          <li class="nav-item">
            <a class="nav-link" href="index.html">Log Out</a>
          </li>
      </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center"> 
      <p><h4 align="center"><?php echo $username;?></h4></p>    
      <h1 class="mt-5" align="center">Add New Recipe</h1>
        <p class="lead"></p>
        <form action="addrecipe.php" align="center" onsubmit = "return confirm('Confirm Add this recipe?');">
            <input type="hidden" id="email" name="email" value="<?php echo $email; ?>" >    
            <input type="hidden" id="username" name="username" value="<?php echo $username;?>">
            <label for="ckname">Cake name:</label><br>
            <input type="text" id="ckname" name="ckname" required><br>
            <label for="ckdesc">Descriptions:</label><br>
            <textarea id="ckdesc" name="ckdesc" rows="5" cols="50" required></textarea><br>
            <label for="cking">Ingredients:</label><br>
            <textarea id="cking" name="cking" rows="5" cols="50" required></textarea><br>
            <label for="cksteps">Steps:</label><br>
            <textarea id="cksteps" name="cksteps" rows="5" cols="50" required></textarea><br>
            <label for="cktime">Overall time cost(minutes):</label><br>
            <input type="text" id="cktime" name="cktime" required><br><br>
            <input type="submit" value="Add" class="button" > 
            <a href="mainpage.php?email=<?php echo $email.'&username='.$username?>">Cancel</a>
        </form>
        <ul class="list-unstyled">
        </ul>
      </div>
    </div>
  </div>

</body>

</html>
