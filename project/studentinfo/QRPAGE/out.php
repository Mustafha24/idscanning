<?php
session_start();
include "../connection.php";
if ($conn){
    // isset($_POST['id']) || isset($_POST['reason'])
    if(1==1) {
        $sid = $_POST['id'];
        $reason = $_POST['reason'];
        $user = $_SESSION['user'];
    
        $sql = "SELECT * FROM IN_OUT_RECORD WHERE ID_NUMBER = '$sid' AND IN_TIME IS NULL";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO IN_OUT_RECORD (ID_NUMBER, OUT_TIME, APPROVED_OUT, REASON_OUT) VALUES ('$sid', now(), '$user', '$reason')";
    
                if (mysqli_query($conn, $sql)) {
                    echo json_encode(array(
                        'Status' => true,
                        'icon' => 'success',
                        'title' => 'APPROVED',
                        'text' => 'HAVE A SAFE JOURNEY',
                    ));
                } else {
                    echo json_encode(array(
                        'Status' => false,
                        'icon' => 'error',
                        'title' => 'Request Process Error',
                        'text' => mysqli_error($conn),
                    ));
                }
            } 
        else {
            echo json_encode(array(
                'Status' => false,
                'icon' => 'error',
                'title' => 'DISAPPROVED',
                'text' => 'NO RECENT IN RECORD',
            ));
        }
    }
    else{
         echo json_encode(array(
                'Status' => false,
                'icon' => 'error',
                'title' => 'DETAILS NOT FILLED',
                'text' => 'NO RECENT IN RECORD',
            ));
    }
    
}
else {
    echo json_encode(array(
        'Status' => false,
        'icon' => 'error',
        'title' => 'REQUEST FAILED',
        'text' => 'DATABASE CONNECTION FAILED',
    ));
}
?>
