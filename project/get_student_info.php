<?php
$conn=mysqli_connect("localhost","id20781904_webdev","WebDev@db123","id20781904_ongdata");
$sid=$_POST['id'];

// $pattern="/[Oo]{1}+(([1]{1}+[789]{1})|([2]{1}+[0]{1}))+(([0]{1}+[0-9]{2})|([1]{1}+[1]{1}+[0-9]{2}))/";
$pattern=   "/([sS]{1}+([19]{2}))|[Oo]{1}+(([1]{1}+[89]{1})|([2]{1}+[0]{1}))+(([0]{1}+[1-9]{3})|([01]{1}+[01]{1}+[0-9]{2}))/";

if($conn){
    
if(preg_match($pattern,$sid)==1){
    // echo "connection success";
$sql="SELECT *  FROM master_table where ID_NUMBER=UPPER('$sid')";
$result=mysqli_query($conn,$sql);
echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
}
else 
{
    echo json_encode(array(
        'Status'=>"couldn't fetch the count"
    ));
}
}
else{
    echo mysqli_connect_error()."connection failed";
}
?>