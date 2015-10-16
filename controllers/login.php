<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Raj
 * Date: 9/3/2015
 * Time: 11:51 AM
 */
//error_reporting(0);
extract($_POST);
include("../lib/dbConnect.php");
$username = strip_tags($username);
$password = md5($password);
$sql = "select * from bd_user WHERE username = '".$username."' and password = '".$password."'";
$result = $conn->query($sql);
//echo $sql;
$row = mysqli_fetch_assoc($result);
$conn->close();
if(count($row) > 0){
   $_SESSION["login"] = "ok";
    $_SESSION["uname"] = ucwords($row["username"]);
    header("Location:../home.php");
    exit;
}
else{
    $_SESSION["error"] = "Invalid Login credentials";
    header("Location:../index.php");
    exit;
}

