<?php
     session_start();
     include_once("dbconnect.php");
     $email = $_GET['email'];
     $username = $_GET['username'];
     $ckname = $_GET['ckname'];
     $ckdesc = $_GET['ckdesc'];
     $cking = $_GET['cking'];
     $cksteps = $_GET['cksteps'];
     $cktime = $_GET['cktime'];
     $id = $_GET['id'];
   
if(isset($_COOKIE["timer"])){

if(isset($_GET['operation'])){

    try{
      $sqlupdate ="UPDATE recipe SET ckname='$ckname', ckdesc='$ckdesc', cking='$cking', cksteps='$cksteps', cktime='$cktime' WHERE email='$email' AND id='$id'";
      //use exec() because no results are ruturned
      $conn->exec($sqlupdate);
      echo "<script> alert('Updated Successfully');</script>";
      echo "<script> window.location.replace('mainpage.php?email=".$email."&username=".$username."') </script>;";
    } catch(PDOException $e) {
      echo "<script> alert('Updated Failed');</script>";
      
    
    }
  }
}else{
    echo "<script> alert('Timer expired!!!')</script>";
    echo "<script> window.location.replace('index.php')</script>";
}    

?>    
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - My Recipe</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
window.history.forward();
</script>

</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="mainpage.php?email=<?php echo $email.'&username='.$username?>">My Recipe</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">  
          <li class="nav-item">
            <a class="nav-link" href="index.html">Log Out</a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center"> 
      <p><h4 align="center"><?php echo $username;?></h4></p>    
      <h1 class="mt-5">Edit Recipe</h1>
        <p class="lead"></p>
        <form action="update.php" align="center" onsubmit = "return confirm('Are you sure?');">
            <input type="hidden" id="email" name="email" value="<?php echo $email; ?>" >    
            <input type="hidden" id="username" name="username" value="<?php echo $username;?>">
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"><br> 
            <input type="hidden" id="operation" name="operation" value="update"><br>
            <label for="ckname">Cake name:</label><br>
            <input type="text" id="ckname" name="ckname" value="<?php echo $ckname; ?>" required><br>
            <label for="ckdesc">Descriptions:</label><br>
            <textarea id="ckdesc" name="ckdesc" rows="5" cols="50" required><?php echo $ckdesc; ?></textarea><br>
            <label for="cking">Ingredients:</label><br>
            <textarea id="cking" name="cking" rows="5" cols="50" required><?php echo $cking; ?></textarea><br>
            <label for="cksteps">Steps:</label><br>
            <textarea id="cksteps" name="cksteps" rows="5" cols="50" required><?php echo $cksteps; ?></textarea><br>
            <label for="cktime">Overall time cost(minutes):</label><br>
            <input type="text" id="cktime" name="cktime" value="<?php echo $cktime; ?>" required><br><br>
            <input type="submit" value="Confirm" class="button" > 
            <a href="mainpage.php?email=<?php echo $email.'&username='.$username?>">Cancel</a>
        </form>
        <ul class="list-unstyled">
        </ul>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>