<?php
     session_start();
     include_once("dbconnect.php");
     $email = $_GET['email'];
     $username = $_GET['username'];

     //delete operation
if(isset($_GET['operation'])){
  $ckname = $_GET['ckname'];
  try{
    $sql = "DELETE FROM recipe WHERE email='$email' AND ckname ='$ckname'";
    //use exec() because no results are ruturned
    $conn->exec($sql);
    echo "<script> alert('Delete Successfully');</script>";
    
  } catch(PDOException $e) {
    echo "<script> alert('Delete Error');</script>";
    
  
  }

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
        </li>
          <li class="nav-item">
            <a class="nav-link" href="addrecipe.php?email=<?php echo $email.'&username='.$username?>">Add Recipe</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="index.php">Log Out</a>
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

   <p align='center'><h4>Welcome <?php echo $username ?>.<br></h4></p>
   <h1 class='mt-5'>My Cakes Recipe List</h1> 
   <?php
   
   if(isset($_COOKIE["timer"])){

   try {

    $sql = "SELECT * FROM recipe WHERE email = '$email' ORDER BY ckname ASC";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $recipe = $stmt->fetchAll(); 

    echo "<table border='2' width=100%>
    <tr>
       <th>Cake Name</th>
       <th>Descriptions</th>
       <th>Ingredients</th>
       <th>Steps</th>
       <th>Overall time cost(minutes)</th>
       <th>Operation</th>
    </tr>";
   
    //loop for data
    foreach($recipe as $recipe) {
        echo"<tr>";
        echo"<td>".$recipe['ckname']."</td>";
        echo"<td>".$recipe['ckdesc']."</td>";
        echo"<td>".$recipe['cking']."</td>";
        echo"<td>".$recipe['cksteps']."</td>";
        echo"<td>".$recipe['cktime']."</td>";
        "<td>".$recpie['id']."</td>";
        echo"<td><a href='mainpage.php?email=".$email."&username=".$username."&ckname=".$recipe['ckname']."&operation=del' onclick= 'return confirm(\"Confirm Delete?\");'>Delete</a><br><br>
        <a href='update.php?email=".$email."&username=".$username."&ckname=".$recipe['ckname']."&ckdesc=".$recipe['ckdesc']."&cking=".$recipe['cking']."&cksteps=".$recipe['cksteps']."&cktime=".$recipe['cktime']."&id=".$recipe['id']."'>Update</a></td>";
        echo"</tr>";
      }
    echo"</table>";  

    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
  }else{
    echo "<script> alert('Timer expired!!!')</script>";
    echo "<script> window.location.replace('index.php')</script>";
  }  

$conn = null;

?>

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