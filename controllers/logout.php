<?php
/**
 * Created by PhpStorm.
 * User: Raj
 * Date: 9/3/2015
 * Time: 12:17 PM
 */
session_start();
$_SESSION["login"] = "";
session_destroy();
header("Location:../index.php");
exit;