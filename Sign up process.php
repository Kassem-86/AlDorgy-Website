<?php

require "dbcon.php";
$uname=$_POST["username"];
$pass=$_POST["password"];
$repass=$_POST["retype-password"];
$mail=$_POST["mail"];
$Mobile=$_POST["mobile_number"];
if($uname=="" || $pass=="" || $repass=="" || $mail=="" || $Mobile== "")
{
echo'
<script>alert("Please fill in all fields and accept terms of service and privacy policy.")</script>';
require "Sign up.html";

}

elseif($pass!=$repass)
{

    echo'<script>alert("passwords do not match")</script>';
    require "Sign up.html";
}
else{

    $sql = "select * from sign_up WHERE name='$uname'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con)); 
    if(mysqli_num_rows($res)>=1){
        echo'<script>alert("username is already taken")</script>';
        require "Sign up.html";
    }
    else{
    mysqli_query($con,"insert into sign_up (name,password,mail,mobile_number) values ('$uname','$pass','$mail','$Mobile')");
    
    echo'<script>alert("signed up successfully")</script>';
    require "C:\wamp64\www\project\Login_page.html";
    }
    }
    mysqli_close($con);?>
