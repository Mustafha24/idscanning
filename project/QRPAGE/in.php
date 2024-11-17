<?php
$conn=mysqli_connect("localhost","id20781904_webdev","WebDev@db123","id20781904_ongdata");
$sid=$_POST['id'];

if($conn){
    $sql="SELECT * FROM IN_OUT_RECORD WHERE  ID_NUMBER='$sid' AND OUT_TIME IS NOT NULL AND IN_TIME IS NULL";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1){
        $sql="UPDATE IN_OUT_RECORD SET IN_TIME=now() WHERE ID_NUMBER='$sid' AND (OUT_TIME IS NOT NUlL AND IN_TIME IS NULL)";
        if(mysqli_query($conn,$sql)){
            echo json_encode(array(
                'Status'=>true,'icon'=>'success','title'=>'Request Success','text'=>'Welcome To Campus',
            ));
        }
        else { 
            echo json_encode(array(
            'Status'=>false,'icon'=>'error','title'=>'Request Process Error','text'=>'Student Already In'
        ));
        }
    }
    else{
        echo json_encode(array(
            'Status'=>false,'icon'=>'error','title'=>'Request Process Error','text'=>'Student Already In'
        ));
    }
}
else{
    echo mysqli_connect_error()."connection failed";
}

?>