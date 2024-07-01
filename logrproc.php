<?php

require "dbcon.php";
$pass=$_POST["password"];
$mail=$_POST["email"];
$query="select * from Login2 where mail='$mail' and password='$pass' ";
$res= mysqli_query($con,$query);
if(mysqli_num_rows($res)>=1){
    echo'<script>alert(" signed in successfully")</script>';
}
else{
    echo'<script>alert(" incorrect mail or password")</script>';

require 'log.html';

}
?>
