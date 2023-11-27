<?php
$hostname = 'localhost';
$port = 8000;
$username = 'root';
$password = '';
$databasename = 'register_db';

$mysqli = mysqli_connect($hostname, $username, $password, $databasename, $port);
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
  $username=($_POST['username']);
  $password=($_POST['password']);

  if(empty($username)){
    header("Location:login.html?error=Username is Required");
    exit();
  }else if(empty($password)){
    header("Location:login.html?error=password is Required");
    exit();
  }else{
    $sql = "SELECT * FROM reg WHERE username='$username' AND password='$password' ";
    $result=mysqli_query($mysqli,$sql);

    if(mysqli_num_rows($result)){
      $row=mysqli_fetch_assoc($result);
      if($row['username']===$username && $row['password']===$password){
        $_SESSION['username']=$row['username'];
        $_SESSION['id']=$row['id'];
        header("Location:profile.html");
        exit();
      }
    }
    else{
      header("Location:login.html?error=Please fill both username and password");
      exit();
    }
  }
}
?>