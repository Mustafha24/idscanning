<?php
$conn=mysqli_connect("localhost","id20781904_webdev","WebDev@db123","id20781904_ongdata");

$sql="SELECT ID_NUMBER from master_table";

$result=mysqli_query($conn,$sql);

if($result){
    // $records=array();
    while($row=mysqli_fetch_assoc($result)){
        $records[]=$row;
    }
    echo json_encode($records);
    // echo json_encode(mysqli_fetch_all($result),MYSQLI_ASSOC);
}
else{
    echo json_encode(array(
        'Status'=>'Fail'
    ));
}

?>