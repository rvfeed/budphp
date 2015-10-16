<?php
error_reporting(0);
include("../lib/dbConnect.php");
$delete = false;
extract($_POST);

$dateInput = explode('/',$date);
if(count($dateInput)>1)
    $date = $dateInput[2].'-'.$dateInput[0].'-'.$dateInput[1];
else{
    $datehif = explode('-',$date);
    if(count($datehif) == 1){
        $date = date("Y-m-d");
    }
}

// Create connection
if($delete) {
    $sql = "UPDATE  `budget` SET  `status` =  '0' WHERE  `budget`.`id` = $id";

}else if($update == "yes"){
    if($misc != ""){
        $miscData = ", `misc` =  '".$misc."'";
    }
    $sql = "UPDATE  `budget` SET  `name` =  '".$name."',`type` =  '".$type."',`item` =  '".$item."',`price` =  '".$price."',`date` =  '".$date."' $miscData WHERE  `budget`.`id` = $id;";
}else{
    $sql = "INSERT INTO `budget` (`name`, `type`, `item`, `price`, `date`, `misc`) VALUES ( '".$name."', '".$type."', '".$item."', '".$price."', '".$date."', '".$misc."')";
}


if ($conn->query($sql) === TRUE) {
    echo "ok";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>