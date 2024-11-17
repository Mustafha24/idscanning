<?php
session_start();
include '../connection.php';
$sid = $_POST['id'];
$user = $_SESSION['user'];

if ($conn) {
    $sql = "SELECT * FROM IN_OUT_RECORD WHERE ID_NUMBER = '$sid' AND OUT_TIME IS NOT NULL AND IN_TIME IS NULL";
    $result = mysqli_query($conn, $sql);
    $recordCount = mysqli_num_rows($result);

    if ($recordCount !== 0) {
        $sql = "UPDATE IN_OUT_RECORD
                SET IN_TIME = NOW(), APPROVED_IN = '$user'
                WHERE ID_NUMBER = '$sid' AND OUT_TIME IS NOT NULL AND IN_TIME IS NULL";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array(
                'Status' => true,
                'icon' => 'success',
                'title' => 'Request Success',
                'text' => 'Welcome to Campus'
            ));
        } else {
            echo json_encode(array(
                'Status' => false,
                'icon' => 'error',
                'title' => 'Request Process Error',
                'text' => 'Could not update the in record'
            ));
        }
    } else {
        echo json_encode(array(
            'Status' => false,
            'icon' => 'error',
            'title' => 'NO RECENT OUT',
            'text' => 'There is no recent out records'
        ));
    }
} else {
    echo json_encode(array(
        'Status' => false,
        'icon' => 'error',
        'title' => 'Database connection failed',
        'text' => mysqli_connect_error()
    ));
}

?>
