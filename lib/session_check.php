<?php
/**
 * Created by PhpStorm.
 * User: Raj
 * Date: 9/3/2015
 * Time: 12:10 PM
 */
session_start();
if($_SESSION["login"] != "ok"){
    header("Location:index.php");
    exit;
}
?>