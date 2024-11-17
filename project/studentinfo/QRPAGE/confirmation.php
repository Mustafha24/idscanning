<?php
include "../connection.php";

$sid=$_POST['id'];
if($conn){

    $sql="SELECT ir.ID_NUMBER,SNAME,YEAR,BRANCH,SECTION,GENDER,OUT_TIME,COALESCE(IN_TIME,'yet-to-return') as 'IN_TIME' FROM master_table mt,IN_OUT_RECORD ir where (mt.ID_NUMBER=ir.ID_NUMBER) and (ir.ID_NUMBER='$sid') order by ir.OUT_TIME desc limit 1";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1){
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        $result['status']=true;
        echo json_encode($result);
    }
    else{
        echo json_encode(array('status'=>false));
    }
}

else{
     echo json_encode(array('status'=>false,'message'=>mysqli_connect_error()));
}
?>