<?php 
require "connection.php";
$sid=$_POST['id'];

if($conn){

    $sql="SELECT DATE_FORMAT(OUT_TIME, '%d-%m-%y %H:%i:%s') AS 'OUT_TIME',CASE WHEN IN_TIME IS NULL THEN 'Yet to return' else DATE_FORMAT(IN_TIME,'%d-%m-%y %H:%i:%s')END AS 'IN_TIME',DATEDIFF(CASE WHEN IN_TIME IS NULL THEN NOW() ELSE IN_TIME END,OUT_TIME) AS NO_OF_DAYS FROM IN_OUT_RECORD where ID_NUMBER=upper('$sid') order by MONTH(out_time) desc,DAYOFMONTH(OUT_TIME)desc,IN_TIME desc";
    
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    $record="<table class='table table-stripped-columns'>
    <thead class='table-dark text-light'>
    <th>OUT TIME</th>
    <th>IN TIME</th>
    <th>NO OF DAYS</th>
    </thead>
    <tbody>
    ";
    while($row=mysqli_fetch_assoc($result)){
        $record.="<tr class='table-success'>
        <td>".$row['OUT_TIME']."</td>
        <td>".$row['IN_TIME'].'</td>
        <td>'.$row['NO_OF_DAYS'].'</td>
        </tr>';
    }
    $record.="</tbody></table>";
    echo $record;
    }
    else{
        echo "No data";
    }
}
else{
    echo "connection to database failed";
}
?>