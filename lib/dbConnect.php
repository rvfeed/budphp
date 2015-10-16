<?php
/**
 * Created by PhpStorm.
 * User: Raj
 * Date: 9/1/2015
 * Time: 7:02 AM
 */
$mysql_host = "mysql15.000webhost.com";
$mysql_database = "a1021801_budget";
$mysql_user = "a1021801_budget";
$mysql_password = "h!jklmn0";

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}