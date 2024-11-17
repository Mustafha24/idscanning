<?php 
$conn=mysqli_connect('localhost','id20781904_webdev','WebDev@db123','id20781904_ongdata');
$sid=$_POST['id'];



$sql="SELECT DATE_FORMAT(OUT_TIME, '%d-%m-%y') AS 'OUT_TIME',CASE WHEN IN_TIME IS NULL THEN 'Yet to return' else DATE_FORMAT(IN_TIME, '%d-%m-%y')END AS 'IN_TIME',DATEDIFF(CASE WHEN IN_TIME IS NULL THEN NOW() ELSE IN_TIME END,OUT_TIME) AS NO_OF_DAYS FROM IN_OUT_RECORD where ID_NUMBER=UPPER('$sid') order by out_time desc";
// $sql="SELECT SNO,OUT_TIME,IN_TIME from IN_OUT_RECORD where ID_NUMBER='$sid' order by OUT_TIME DESC";

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
?>