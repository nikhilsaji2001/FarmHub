<?php


$id=$_GET['id'];

include 'includes/dbconnect.php';
$sql="update ordermain set dstatus='2' where orderid='$id'";
if(mysql_query($sql,$con))
	echo "<script>alert('Order Approved!');location.href='vorder.php';</script>";
     else
     	{"<script>alert('error!');location.href='vorder.php';</script>";
		}

?>