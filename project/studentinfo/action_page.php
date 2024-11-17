<?php
session_start();
include "connection.php";

if ($conn) {
    // Retrieve the submitted username and password
    $user_role=$_POST['user'];
    $password = sha1($_POST['password']);
    // echo $user_role.'  '.$_POST['password'];
    $sql="select * from `RGUKT_IO_LOGIN` WHERE `ROLE`='$user_role' and  `PASSWORD`='$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1){
        $_SESSION['login_time_stamp']=time();
        $_SESSION['user']=$user_role;
        if ($user_role == 'DIRECTOR') {
            echo json_encode(array('status' => true, 'redirect_url' => 'index.php'));
            exit;
        } else if ($user_role == 'CAMPUS_2' || $user_role == 'CAMPUS_3') {
            echo json_encode(array('status' => true, 'redirect_url' => 'scan_landing_page.php'));
            exit;
        }
    }
    else {
        echo json_encode(array('status'=>false,'message'=>'incorrect password'));
    }
}
else{
    echo json_encode(array('status'=>false,'message'=>'database connection failed'));
}
  
?>
