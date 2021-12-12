<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM gym WHERE gym_id = '".$_GET['gym_del']."'");
header("location:allgyms.php");

?>
