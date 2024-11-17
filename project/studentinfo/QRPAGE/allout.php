<?php
$conn=mysqli_connect("localhost","root","Ahmad@lapi74","mydb");
$y=$_POST['year'];
$days=$_POST['days'];
$sql="SELECT mt.ID_NUMBER,mt.SNAME,mt.BRANCH, DATE_FORMAT(date(ior.OUT_TIME), '%d-%m-%y') OUT_TIME from IN_OUT_RECORD ior,master_table mt where ior.ID_NUMBER=mt.ID_NUMBER and ior.IN_TIME is null and mt.YEAR='$y' and datediff(now(),ior.OUT_TIME)>'$days'";

$result=mysqli_query($conn,$sql);

if($result){
    $records=array();
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