<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_SESSION['user']) and $_SESSION['user']=='SECURITY') {
    // Retrieve the submitted username and password
    $scan_mode = $_POST["scan_mode"];
    // Validate the username and password (add your own validation logic here)
    if($scan_mode == "mobile_scan" && $role=='SECURITY') {
            header("Location:QRPAGE/mobile_scan.html");
        } 
     else if($scan_mode == "handhel_scan" && $role=='SECURITY') {
            header("Location:QRPAGE/handheld_scan.html");
        }
    else{
        header("Location:./scan_landing_page.php");
    }
}
?>