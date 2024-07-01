<?php
require "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["email"])) {
        echo '<script>alert("Email field is missing. Please provide your email.");</script>';
        
        header("Location: ForgetPassword2.html");
        exit(); 
    }
    
    if (!isset($_POST["password"])) {
        echo '<script>alert("Password field is missing. Please provide your password.");</script>';
        header("Location: ForgetPassword2.html");
        exit(); 
    }

    $email = $_POST["email"];
    $newPassword = $_POST["password"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format. Please enter a valid email address.");</script>';
        require "ForgetPassword2.html";
    } else {
        $sql = "SELECT * FROM sign_up WHERE mail = '$email'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $updateSql = "UPDATE sign_up SET password = '$newPassword' WHERE mail = '$email'";
            if (mysqli_query($con, $updateSql)) {
                echo '<script>alert("Your password has been updated successfully.");</script>';
                require "Login_page.html";
            } else {
                echo '<script>alert("Error updating password.");</script>';
                require "ForgetPassword2.html";
            }
        } else {
            echo '<script>alert("Email not registered.");</script>';
            require "ForgetPassword2.html";
        }
    }

}
mysqli_close($con);

?>
