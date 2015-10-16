<?php
error_reporting(0);
include("../lib/dbConnect.php");
/**
 * Created by PhpStorm.
 * User: Raj
 * Date: 9/1/2015
 * Time: 7:01 AM
 */
if($_GET["id"]){
    $cond = " AND id = ".$_GET["id"];
}elseif($_GET["p"] == "w"){
    $cond = " AND YEARWEEK(  `date` , 1 ) = YEARWEEK( CURDATE( ) , 1 ) ";
}elseif($_GET["p"] == "m"){
    $cond = " AND MONTH(  `date` ) = MONTH( CURDATE( ) ) ";
}elseif($_GET["p"] == "y"){
    $cond = " AND YEAR(  `date` ) = YEAR( CURDATE( )  ) ";
}elseif($_GET["p"] == "t"){
    $cond = " AND DAY( `date` ) = DAY( CURDATE( )  ) ";
}else{
    $cond = "";
}
$sql = "select * from budget WHERE status = 1 $cond order by date desc limit 0, 20";
$sql_total = "select sum(price) as total from budget WHERE status = 1 $cond order by date desc";
$result = $conn->query($sql);
$result_total = $conn->query($sql_total);
$arr = array();
if($result){
$z = 0;
    $arr []= array();
    $rows_total = $rows = mysqli_fetch_assoc($result_total);
    while($rows = mysqli_fetch_assoc($result)){
      $arr[$z] = $rows;
        $z++;
    };
    $arr[$z++] = $rows_total;
}
if($_GET["id"])
    print_r(json_encode(array("records" => $arr[0], "total"=>$rows_total["total"])));
else
    print_r(json_encode(array("records" => $arr, "total"=>$rows_total["total"])));
$conn->close();
exit;