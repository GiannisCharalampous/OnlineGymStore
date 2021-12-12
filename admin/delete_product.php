<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM gym_equipment WHERE t_id = '".$_GET['product_del']."'");
header("location:all_products.php");

?>
