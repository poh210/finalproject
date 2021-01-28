<?php
session_start();
include_once("dbconnect.php");

$username = $_POST['username']; 
$password = sha1($_POST['password']);

try {
    $sql = "SELECT * FROM register WHERE username = '$username' AND password = '$password'";
    $stmt = $conn->prepare($sql );
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $register = $stmt->fetchAll();

    if($count > 0){
        foreach($register as $register){
            $email = $register['email'];
            $username = $register['username'];
        }

        setCookie("timer", "900s", time()+900, "/");

        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;

        echo "<script> alert('Login Successfully')</script>";
        echo "<script> window.location.replace('mainpage.php?email=".$email."&username=".$username."') </script>";
    }else{
        echo "<script> alert('Login Failed, please check your Username and Password')</script>";
        echo "<script> window.location.replace('signin.html')</script>";
    }
 }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }
$conn = null;

?>