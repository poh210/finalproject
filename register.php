<?php
include_once("dbconnect.php");

//get data
$username = $_POST['username'];
$email = $_POST['email'];
$password = sha1($_POST['password']);

try{
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO register (username, email, password)
    VALUES ('$username','$email','$password')";
    //use exec() because no results are ruturned
    $conn->exec($sql);
    echo "<script> window.alert('Registration complete!');</script>";
    echo "<script> window.location.replace('signin.html')</script>";
  } catch(PDOException $e) {
  
    //echo $sql . "<br>" . $e->getMessage(); //This is to know where is the error
    echo "<script> window.alert('Registration Failed! Please check your details before submit!.');</script>";
    echo "<script> window.location.replace('index.php') </script>;";
}
  
$conn = null;

?>