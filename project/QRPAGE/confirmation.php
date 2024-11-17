<?php
$conn=mysqli_connect("localhost","id20781904_webdev","WebDev@db123","id20781904_ongdata");
$sid=$_POST['id'];


if($conn){

$sql="SELECT ir.ID_NUMBER,SNAME,YEAR,BRANCH,SECTION,GENDER,OUT_TIME,COALESCE(IN_TIME,'yet-to-return') as 'IN_TIME' FROM master_table mt,IN_OUT_RECORD ir where (mt.ID_NUMBER=ir.ID_NUMBER) and (ir.ID_NUMBER='$sid') order by ir.OUT_TIME desc limit 1";
$result=mysqli_query($conn,$sql);
print_r (json_encode(mysqli_fetch_assoc($result)));
}

else{
    echo mysqli_connect_error()."connection failed";
}
?>