<?php
$conn=mysqli_connect("localhost","id20781904_webdev","WebDev@db123","id20781904_ongdata");
$sid=$_POST['id'];
if($conn){

$sql="SELECT OUT_TIME,COALESCE(IN_TIME,'yet to return') As 'IN_TIME' FROM IN_OUT_RECORD where ID_NUMBER='$sid'order by OUT_TIME desc limit 1";
$result=mysqli_query($conn,$sql);
echo json_encode(mysqli_fetch_assoc($result));
}

else{
    echo mysqli_connect_error()."connection failed";
}
?>