<?php
$conn=mysqli_connect("localhost","root","Ahmad@lapi74","mydb");
$sid=$_POST['id'];

if($conn){
    $sql="SELECT * FROM IN_OUT_RECORD WHERE  ID_NUMBER='$sid' AND IN_TIME IS NULL AND OUT_TIME IS NOT NULL";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==0){
        $sql="INSERT INTO IN_OUT_RECORD(ID_NUMBER,OUT_TIME) values('$sid',now())";
        if(mysqli_query($conn,$sql)){
            echo json_encode(array(
                'Status'=>true,'icon'=>'success','title'=>'Request Success','text'=>'Have a safe journey',
            ));
        }
        else { 
            echo json_encode(array(
            'Status'=>false,
            'icon'=>'error','title'=>'Request Process Error','text'=>'Student Already Out',
        ));
        }
    }
    else{
        echo json_encode(array(
            'Status'=>false,
            'icon'=>'error','title'=>'Request Process Error','text'=>'Student Already Out',
        ));
    }
}
else{
    echo mysqli_connect_error()."connection failed";
}

?>
