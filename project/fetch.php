<?php
$conn=mysqli_connect("localhost","id20781904_webdev","WebDev@db123","id20781904_ongdata");
if($conn){
    // echo "connection success";
// $count_sql_total="SELECT YEAR,BRANCH,COUNT(*) as 'count' FROM master_table where 1=1 group by BRANCH,YEAR ORDER BY YEAR,BRANCH";
    $sql=" SELECT
  mt.year,
  mt.branch,
  COUNT(DISTINCT mt.id_number) AS total_count,
  SUM(CASE WHEN ir.out_time IS NOT NULL AND ir.in_time IS NULL THEN 1 ELSE 0 END) AS out_count,
  (COUNT(DISTINCT mt.id_number) - SUM(CASE WHEN ir.out_time IS NOT NULL AND ir.in_time IS NULL THEN 1 ELSE 0 END)) AS in_count
FROM
  master_table mt
LEFT JOIN
  IN_OUT_RECORD ir ON mt.id_number = ir.id_number
GROUP BY
  mt.year,
  mt.branch;
";
$counts=mysqli_query($conn,$sql);
if($counts){
   
    echo json_encode(mysqli_fetch_all($counts,MYSQLI_ASSOC));
}
else 
{
    echo json_encode(array(
        'message'=>"couldn't fetch the count",
        'status'=>false
    ));
}
}
else{
    echo mysqli_connect_error()."connection failed";
}
?>