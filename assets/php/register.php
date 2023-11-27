<?php
$hostname = 'localhost';
$port = 8000;
$username = 'root';
$password = '';
$databasename = 'register_db';

$mysqli = mysqli_connect($hostname, $username, $password, $databasename, $port);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($mysqli, "INSERT INTO reg (username, email, password) VALUES ('$username', '$email', '$password')");

    if ($result) {
            header("Location: login.html");
            exit();
    } else {
        echo "Something went wrong: " . mysqli_error($mysqli);
    }
}

mysqli_close($mysqli);
?>