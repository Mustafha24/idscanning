<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted username and password
    $role=$_POST['role'];
    $username = $_POST["user"];
    $password = $_POST["password"];
    // Validate the username and password (add your own validation logic here)
    if ($username == "123@rguktongole" && $password == "password" && $role=='DIRECTOR') {
        session_start();
         $_SESSION["login_time_stamp"] = time(); 
        $_SESSION['user']="director_rguktong";
        // Successful login
        header("Location:./newindex.php");
    } 
    else if($password == "password" && $role=='SECURITY') {
        $_SESSION["login_time_stamp"] = time(); 
        session_start();
        $_SESSION['email']=$username;
        // Successful login
        header("Location:./scan_landing_page.php");
    } 
    else {
        // Invalid login
        echo "Invalid email or password.";
    }
}
