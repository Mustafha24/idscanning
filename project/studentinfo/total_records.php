<?php
include "./connection.php";

if($conn){
    $sql=' SELECT
          mt.year,
          COUNT(DISTINCT mt.id_number) AS total_count,
          SUM(CASE WHEN ir.out_time IS NOT NULL AND ir.in_time IS NULL THEN 1 ELSE 0 END) AS out_count,
          (COUNT(DISTINCT mt.id_number) - SUM(CASE WHEN ir.out_time IS NOT NULL AND ir.in_time IS NULL THEN 1 ELSE 0 END)) AS in_count
        FROM
          master_table mt
        LEFT JOIN
          IN_OUT_RECORD ir ON mt.id_number = ir.id_number
        GROUP BY
          mt.year;
        ';
                if($result=mysqli_query($conn,$sql)){
                
                print_r(json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC)));
                
                    
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
            
            echo json_encode(array(
                    'message'=>"database connection failed",
                    'status'=>false
                ));
        }
?>