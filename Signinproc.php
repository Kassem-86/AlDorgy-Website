<?php
require "dbcon.php";
$pass=$_POST["password"];
$mail=$_POST["mail"];
$query="select * from sign_up where mail='$mail' and password='$pass' ";
$res= mysqli_query($con,$query);
if(mysqli_num_rows($res)>=1){
    echo'<script>alert(" signed in successfully")</script>';
    require 'C:\wamp64\www\sectiom\project\mainpage - Copy.html';
}
else{
    echo'<script>alert(" incorrect mail or password")</script>';

require 'Login_page.html';
}

mysqli_close($con);

?>
