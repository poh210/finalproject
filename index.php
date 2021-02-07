<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - My Recipe</title>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">My Recipe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signin.html">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.html">Register</a>
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
        <h1 class="mt-5" align='center'>Cakes Recipe</h1>
        <p class="lead"align='center'>Delicious cakes recipe shared by people all around you!Join us now!</p>
<?php
  include_once("dbconnect.php");
   
   try {

    $sql = "SELECT * FROM recipe ORDER BY ckname ASC";
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
    </tr>";
   
    //loop for data
    foreach($recipe as $recipe) {
        echo"<tr>";
        echo"<td>".$recipe['ckname']."</td>";
        echo"<td>".$recipe['ckdesc']."</td>";
        echo"<td>".$recipe['cking']."</td>";
        echo"<td>".$recipe['cksteps']."</td>";
        echo"<td>".$recipe['cktime']."</td>";
        echo"</tr>";
      }
    echo"</table>";  

    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

$conn = null;

?>
        <ul class="list-unstyled">
        </ul>
      </div>
    </div>
  </div>

</body>

</html>
