<?php
require "dbcon.php";

$pass = $_POST["password"];
$mail = $_POST["mail"];

// Query to select the user with the provided email and password
$query = "SELECT * FROM sign_up WHERE mail='$mail' AND password='$pass'";

// Execute the query
$res = mysqli_query($con, $query);


if (mysqli_num_rows($res) >= 1) {
    echo '<script>alert("Signed in successfully")</script>';
    require 'C:\wamp64\www\sectiom\project\mainpage - Copy.html';
} else {
    echo '<script>alert("Incorrect mail or password")</script>';
    require 'Login_page.html';
}

mysqli_close($con);
?>
